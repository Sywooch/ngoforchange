<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Person;
use app\models\PersonDataFriend;

class FriendsController extends ApiController
{
     public function actionIndex()
    {
    	// Patients List
    	$id = '';
    	if(isset($_GET['id']) && $_GET['id'] != "")
    		$id = $_GET['id'];

    	$persons = [];

    	if($id == '') {
    		$persons = Person::find()
    			->joinWith(['types'])
    			->where(['person_type.model_name' => 'PersonDataFriend'])
    			->joinWith(['friend'])
    			->asArray()
    			->all();
    	}
    	else {
    		$persons = Person::find()
    			->joinWith(['types'])
    			->where(['person_type.model_name' => 'PersonDataFriend'])
    			->andWhere(['person.id' => $id])
    			->joinWith(['friend'])
    			->asArray()
    			->all();
    	}

        foreach ($persons as $key => $person) {
            if($person['friend'] == null) {
                $persons[$key]['friend'] = (new PersonDataFriend())->attributes;
                $persons[$key]['friend']['person_id'] = $person['id'];
            }
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $persons
    	];
    }
}
