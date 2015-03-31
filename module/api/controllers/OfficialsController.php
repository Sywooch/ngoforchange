<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Person;
use app\models\PersonDataOfficial;

class OfficialsController extends ApiController
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
    			->where(['person_type.model_name' => 'PersonDataOfficial'])
    			->joinWith(['official'])
    			->asArray()
    			->all();
    	}
    	else {
    		$persons = Person::find()
    			->joinWith(['types'])
    			->where(['person_type.model_name' => 'PersonDataOfficial'])
    			->andWhere(['person.id' => $id])
    			->joinWith(['official'])
    			->asArray()
    			->all();
    	}

        foreach ($persons as $key => $person) {
            if($person['official'] == null) {
                $persons[$key]['official'] = (new PersonDataOfficial())->attributes;
                $persons[$key]['official']['person_id'] = $person['id'];
            }
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $persons
    	];
    }
}
