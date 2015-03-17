<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Person;
use app\models\PersonType;

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
    	$person = [];
    	
    	// defaults are ...
    	$formName = 'FormPerson';
    	$modelName = 'Person';
		$model = new Person();

		// keeps the data if post data passed validation, and whether it is valid or not
		$post_is_valid = null;

    	// processing submitted data
    	if(isset($post['modelName'])) {
    		// get person by ID
    		$person = Person::find()
    			->with(['types'])
    			->where(['id' => $person_id])
    			->asArray()
    			->one();

    		if($this->hasTypeByModel($person['types'], $post['modelName'])) {
    			// data is for registered type
    			$classReflect = new \ReflectionClass('app\models\\'.$post['modelName']);
    			$modelName = $post['modelName'];
    			$model = $classReflect->newInstanceArgs();

    			if ($model->load($post) && $model->validate()) {
		        	// form inputs are valid, do something here
		        	$post_is_valid = true;
		            // saving
		            echo 'isValid -- saving <br />';
			    } else {
	        		$post_is_valid = false;
	        		echo 'is not Valid <br />';
		        }
    		}
    	}

		// choosing form
    	if($post_is_valid === false) {
    		// we get the same form to show errors
    		$formName = $this->getFormByModel($types, $modelName);
    	} else if($post_is_valid === true) {
    		// receive next form
    		$formName = $this->getNextForm($person);
    	}
	    
	    echo $formName;
		// showing form
	    /*return $this->render($formName, [
	        'model' => $model,
	        'types' => $types,
	        'isCreate' => true
	    ]);	*/
    }

    private function getNextForm($person)
    {
    	if(!isset($person->id))
    		return 'FormPerson';
    	
    }

    private function getFormByModel($types, $model_name)
    {
    	if($model_name == '')
    		throw new Exception("Model name can't be empty", 1);
    		
    	if($model_name == 'Person')
    		return 'FormPerson';

    	foreach ($types as $key => $type) {
    		if($type['model_name'] == $model_name) {
    			if(!$type['form_name'])
    				throw new Exception("There is no available form name for this model", 1);
    			return $type['form_name'];
    		}
    	}

    	throw new Exception("Unknown model name is passed", 1);
    }

    private function hasTypeByModel($person_types, $model_name)
    {
    	if($model_name == '')
    		throw new Exception("Model name can't be empty.");

    	if($model_name == 'Person')
    		return true;

    	if(count($person_types) <= 0)
    		return false;

    	foreach($person_types as $i => $type) {
    		if($type['model_name'] == $model_name)
    			return true;
    	}
    	return false;
    }
}
