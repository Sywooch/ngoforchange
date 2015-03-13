<?php

namespace app\module\api\controllers;

use app\components\ApiController;

class PersonsController extends ApiController
{
    public function actionIndex()
    {
        return [ 
        	self::RSP_STATUS_CODE => 404,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => ''
    	];
    }
}
