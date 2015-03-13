<?php

namespace app\module\api\controllers;

use app\components\ApiController;
use app\models\Medicines;
use app\models\MedicinesMoves;

class MedicinesController extends ApiController
{
	// List medicine or all medicines
    public function actionIndex()
    {
        // Medcine List
    	$id = '';
    	if(isset($_GET['id']) && $_GET['id'] != "")
    		$id = $_GET['id'];

    	$medicines = [];

    	if($id == '')
    		$medicines = Medicines::find()->all();
    	else
    		$medicines = Medicines::findAll($id);

    	return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $medicines
    	];
    }

    // Create a medicine
    public function actionCreate()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            $med = new Medicines();
            $med->setAttributes([
                'name' => $value->name,
                'unit_type' => $value->unit_type,
                'details' => $value->details
                ]);

            $med->save();
            array_push($response, $med->attributes);
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $response
    	];
    }

    // Update a medicine
    public function actionUpdate()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            if($value->id == null || $value->id == '')
                continue;

            $med = Medicines::findOne($value->id);
            $med->name = $value->name;
            $med->unit_type = $value->unit_type;
            $med->details = $value->details;

            $med->update();
            array_push($response, $med->attributes);
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $response
    	];
    }

    // Destroy a medicine
    public function actionDestroy()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            if($value->id == null || $value->id == '')
                continue;

            $med = Medicines::findOne($value->id);
            $med->name = $value->name;
            $med->unit_type = $value->unit_type;
            $med->details = $value->details;

            if($med->delete() > 0)
                array_push($response, $med->attributes);
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $response
    	];
    }

    // List one or all medicine movements
    public function actionMoves()
    {
        // Medicine Movements list by medicine_id
        $medicine_id = '';
        if(isset($_GET['medicine_id']) && $_GET['medicine_id'] != '')
            $medicine_id = $_GET['medicine_id'];

        $id = '';
        if(isset($_GET['id']) && $_GET['id'] != '')
        	$id = $_GET['id'];

        $result = [];

        if($id != '') {
        	// movement by ID
        	$result = MedicinesMoves::find()->with(['person', 'medicines'])->where(['id' => $id])->asArray()->one();
        } else if($medicine_id != '') {
        	// movements by Medicine ID
            $exp_date = '';
            if(isset($_GET['expiration_date']) && $_GET['expiration_date'] != '') {
                $exp_date = $_GET['expiration_date'];

                $result = MedicinesMoves::find()
                    ->with(['person'])
                    ->where(['medicines_id' => $medicine_id, 'expiration_date' => $exp_date])
                    ->asArray()
                    ->all();
            }
        } else {
        	// all movements
        	$result = MedicinesMoves::find()->with(['person', 'medicines'])->asArray()->all();
        }

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $result
    	];
    }

    public function actionStore()
    {
        // Medicine Stock
        $stock = MedicinesMoves::find()
        	->select(['*', 'SUM(count) AS count_stock'])
        	->with(['medicines'])
        	->where('expiration_date > DATE(NOW())')
        	->groupBy(['medicines_id', 'expiration_date'])
        	->asArray()
        	->all();

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $stock
    	];
    }

    public function actionNotifs()
    {
        $alerts = array();
        $warns = array();

        // Expired Items
        $alerts = MedicinesMoves::find()
        	->select(['*', 'SUM(count) AS count'])
        	->with(['medicines'])
        	->where('count > 0 AND expiration_date <= DATE(NOW())')
    		->groupBy(['medicines_id', 'expiration_date'])
    		->asArray()
    		->all();

        // Near to Expire
		$warns = MedicinesMoves::find()
			->with(['medicines'])
			->where('count > 0 AND expiration_date > DATE(NOW()) AND expiration_date <= (DATE(NOW()) + INTERVAL 1 MONTH)')
			->groupBy(['medicines_id', 'expiration_date'])
			->asArray()
			->all();
        
        $response = [
            'alerts' => $alerts,
            'warns' => $warns
        ];

        return [ 
        	self::RSP_STATUS_CODE => 200,
        	self::RSP_HAS_ERROR => false,
        	self::RSP_DATA => $response
    	];
    }
}
