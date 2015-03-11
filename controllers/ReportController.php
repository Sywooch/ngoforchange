<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Medicine;

class ReportController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
