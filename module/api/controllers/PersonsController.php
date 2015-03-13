<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Person;

class PersonsController extends ApiController
{
    public function actionIndex()
    {
    	// Person List
    	$id = '';
    	if(isset($_GET['id']) && $_GET['id'] != "")
    		$id = $_GET['id'];

    	$persons = [];

    	if($id == '') {
    		$persons = Person::find()
    			->with(['types'])
    			->asArray()
    			->all();
    	}
    	else {
    		$persons = Person::find()
    			->where(['id' => $id])
    			->with(['types'])
    			->asArray()
    			->all();
    	}

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $persons
    	];
    }

    public function actionA()
    {
    	return [
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => ''
    	];
    }
}
