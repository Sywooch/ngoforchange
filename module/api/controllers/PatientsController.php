<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Person;
use app\models\PersonDataPatient;

class PatientsController extends ApiController
{
     public function actionIndex()
    {
    	// Patients List
    	$id = '';
    	if(isset($_GET['id']) && $_GET['id'] != "")
    		$id = $_GET['id'];

    	$patients = [];

    	if($id == '') {
    		$patients = Person::find()
    			->joinWith(['types'])
    			->where(['person_type.model_name' => 'PersonDataPatient'])
    			->joinWith(['patient'])
    			->asArray()
    			->all();
    	}
    	else {
    		$patients = Person::find()
    			->joinWith(['types'])
    			->where(['person_type.model_name' => 'PersonDataPatient'])
    			->andWhere(['person.id' => $id])
    			->joinWith(['patient'])
    			->asArray()
    			->all();
    	}

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $patients
    	];
    }
}
