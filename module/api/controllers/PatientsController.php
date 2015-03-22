<?php

namespace app\module\api\controllers;

use app\components\ApiController;
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
    		$patients = PersonDataPatient::find()
    			->joinWith(['person', 'disabled'])
    			->where(['tbl_disabled.id' => '1'])
    			->asArray()
    			->all();
    	}
    	else {
    		$patients = PersonDataPatient::find()
    			->where(['id' => $id])
    			->with(['types'])
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
