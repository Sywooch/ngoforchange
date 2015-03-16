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
    	$person_id = isset($post->person_id) ? $post->person_id : '';
    	$person = [];
    	$model = [];

    	// processing submitted data
    	if(isset($post->modelName)) {
    		// get person by ID
    		$person = Person::find()
    			->with(['types'])
    			->where(['id' => $person_id])
    			->asArray()
    			->one();

    		if($this->hasTypeByModel($person['types'], $post->modelName)) {
    			// data is for registered type
    			$classReflect = new \ReflectionClass('app\models\\'.$post->modelName);
    			$model = $classReflect->newInstanceArgs();

    			if ($model->load($post)) {
			        if ($model->validate()) {
			            // form inputs are valid, do something here
			            return;
			        }
			    }
    		}
    	}

	    $formName = '';
	
		// showing form
	    

		/*
		if( has NOT id from post)
			show personform
		else {
			for (types) {
				request db for model by id
				if(there is data) {
					continue;
				} else {
					show Form
					return;
				}
			}
			if (everymodel is fine)
				show Thank you
		}
*/

		// data integrity check
	    

	    return $this->render($formName, [
	        'model' => $model,
	        'types' => $types,
	        'isCreate' => true
	    ]);	
    }

    private function hasTypeByModel($types, $model_name)
    {
    	if($model_name == '')
    		throw new Exception("Model in post data can't be empty.");

    	if($model_name == 'Person')
    		return true;

    	if(count($types) <= 0)
    		return false;

    	foreach($types as $i => $type) {
    		if($type['model_name'] == $model_name)
    			return true;
    	}
    	return false;
    }
}
