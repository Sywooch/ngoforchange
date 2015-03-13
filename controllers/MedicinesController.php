<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Medicine;

class MedicinesController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

    public function actionAll()
    {
        return $this->render('all');
    }

    public function actionStore()
    {
    	return $this->render('store');
    }

    public function actionMoves()
    {
        return $this->render('moves');
    }
}
