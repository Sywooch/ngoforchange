<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Person;
use app\models\PersonDataVolunteer;

class VolunteersController extends ApiController
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
    			->where(['person_type.model_name' => 'PersonDataVolunteer'])
    			->joinWith(['volunteer'])
    			->asArray()
    			->all();
    	}
    	else {
    		$persons = Person::find()
    			->joinWith(['types'])
    			->where(['person_type.model_name' => 'PersonDataVolunteer'])
    			->andWhere(['person.id' => $id])
    			->joinWith(['volunteer'])
    			->asArray()
    			->all();
    	}

        foreach ($persons as $key => $person) {
            if($person['volunteer'] == null) {
                $persons[$key]['volunteer'] = (new PersonDataVolunteer())->attributes;
                $persons[$key]['volunteer']['person_id'] = $person['id'];
            }
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $persons
    	];
    }
}
