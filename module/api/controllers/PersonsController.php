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
                ->where('is_deleted IS NULL OR is_deleted = 0')
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

        public function actionDestroy()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            if($value->id == null || $value->id == '')
                continue;

            $person = Person::findOne($value->id);
            $person->last_name = $value->last_name;
            $person->father_name = $value->father_name;
            $person->first_name = $value->first_name; 
            $person->title_name = $value->title_name;
            $person->formatted_name = $value->formatted_name;
            $person->ssrn = $value->ssrn;
            $person->id_number = $value->id_number;
            $person->address = $value->address;
            $person->post_code = $value->post_code;
            $person->city = $value->city;
            $person->is_deleted = $value->is_deleted;
            $person->deletion_reason = $value->deletion_reason;

            if($person->delete() > 0)
                array_push($response, $person->attributes);
        }

        return [ 
            self::RSP_STATUS_CODE => 200,
            self::RSP_HAS_ERROR => false,
            self::RSP_DATA => $response
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
