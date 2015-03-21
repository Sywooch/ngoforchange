<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Person;
use app\models\PersonType;
use app\models\PersonDataPatient;

class PersonsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAll()
    {
		return $this->render('all');	
    }

    public function actionCreate()
    {
    	$post = Yii::$app->request->post();
    	$get = Yii::$app->request->get();
    	$types = PersonType::find()->asArray()->all();
        
        $person_id = isset($post['person_id']) ? $post['person_id'] : '';
        $step = isset($post['step']) ? $post['step'] : 0;
        $step_back = max($step - 1, 0);
        $step_next = $step + 1;

		// keeps the data if post data passed validation, and whether it is valid or not
		$validation_success = null;

        // building steps
        $steps = [
            [
                'id' => '',
                'name' => 'Person',
                'data_table' => 'person',
                'model_name' => 'Person',
                'form_name' => 'FormPerson',
            ], /*[
                'id' => '',
                'name' => 'Contact',
                'data_table' => 'person_contact',
                'model_name' => 'ContactsList',
                'form_name' => 'FormContacts',
            ]*/
        ];
        $steps_last = [
                'id' => '',
                'name' => 'Summary',
                'data_table' => 'vw_person_summary',
                'model_name' => 'PersonSummary',
                'form_name' => 'FormSummary'
            ];

    	// processing submitted data
		if($this->personDataCheck($post)) {
			// data is for registered type
            $post_model_name = $post['model_name'];

			$classReflect = new \ReflectionClass('app\models\\'. $post_model_name);
			$model = $classReflect->newInstanceArgs();

			if ($model->load($post) && $model->validate()) {
                echo 'model loaded succesfully <---------';
	        	// form inputs are valid, do something here
	        	$validation_success = true;
	            
                // saving
	            $model->save();
                $person_id = isset($model->id) ? $model->id : $model->person_id;

		    } else {
        		$validation_success = false;
	        }
		}

        // get person information
        $person = $this->getPersonInfo($person_id);

        // merge current steps with additional person types
        if($person) {
            $steps = array_merge($steps, $person['types']);
        }

        // add last step
        array_push($steps, $steps_last);

		// if validation was ok, we can go to next step
    	if($validation_success === true) {
    	   $step = $step_next;
    	}

        $step_data = $steps[$step];

        $classReflect = new \ReflectionClass('app\models\\'. $step_data['model_name']);
        $model = $classReflect->newInstanceArgs();

        //
        if($validation_success === false) {
            $model->load($post);
        } else if($validation_success === true) {
            $find = $classReflect->getMethod('find')->invoke(null);
            $model_existing = $find->where("person_id = '$person_id'")->asArray()->one();
            if($model_existing)
                $model = $model_existing;
        }
	    
		// showing form
	    return $this->render($step_data['form_name'], [
	        'isCreate' => true,
            'step' => $step,
            'person_id' => $person_id,
            'person' => $person,
            'model' => $model,
	        'types' => $this->normalizeTypes($types),
	        'post' => $post
	    ]);
    }

    public function actionView($person_id)
    {
        $person = Person::find()
            ->where(['id' => $person_id])
            ->with(['types'])
            ->one();

        if($person == null) {
            throw new NotFoundHttpException('Object you are requested not found.');
        }

        $person_data = [];

        if(isset($person->types)) {
            foreach ($person->types as $key => $type) {
                $classReflect = new \ReflectionClass('app\models\\'. $type->model_name);
                $find = $classReflect->getMethod('find')->invoke(null);

                array_push($person_data, [
                        'id' => $type->id,
                        'name' => $type->name,
                        'model' => $find->where(['person_id' => $person_id])->one()
                    ]);
            }
        }

        return $this->render('view', [
                'person' => $person,
                'person_data' => $person_data
            ]);
    }

    // retireving person information from database
    private function getPersonInfo($person_id)
    {
        return Person::find()
            ->with(['types'])
            ->where(['id' => $person_id])
            ->asArray()
            ->one();
    }

    // procedure to check data posted to creator
    private function personDataCheck($post)
    {
        // id can be empty in case of Person, but person_id can't
        if(!isset($post['id']) && !isset($post['person_id']))
            return false;

        if(isset($post['person_id']) && $post['person_id'] == '')
            return false;

        if(!isset($post['model_name']))
            return false;

        $person_id = isset($post['id']) ? $post['id'] : $post['person_id'];
        $model_name = $post['model_name'];

        if($model_name == '')
            throw new Exception("Model name can't be empty.");

        if($model_name == 'Person' || $model_name == 'PersonContact')
            return true;

        $person = $this->getPersonInfo($person_id);

        if(!isset($person['types']))
            return false;

        if(count($person['types']) <= 0)
            return false;

        foreach($person['types'] as $i => $type) {
            if($type['model_name'] == $model_name)
                return true;
        }
        return false;
    }

    private function normalizeTypes($types)
    {
    	$normalized = [];
    	foreach ($types as $key => $value) {
    		$normalized[$value['id']] = $value['name'];
    	}
    	return $normalized;
    }    
}
