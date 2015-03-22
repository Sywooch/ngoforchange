<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Contacts;

class ContactsController extends ApiController
{
    public function actionIndex()
    {
    	// Contacts List
    	$id = '';
    	if(isset($_GET['id']) && $_GET['id'] != "")
    		$id = $_GET['id'];

    	$persons = [];

    	if($id == '') {
    		$persons = Contacts::find()
    			->with(['person'])
    			->asArray()
    			->all();
    	}
    	else {
    		$persons = Contacts::find()
    			->where(['id' => $id])
    			->with(['person'])
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
