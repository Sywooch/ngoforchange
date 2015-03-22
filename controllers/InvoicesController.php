<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Medicine;

class InvoicesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCashs()
    {
        return $this->render('cashs');
    }

    public function actionPays()
    {
        return $this->render('pays');
    }

    public function actionGoods()
    {
        return $this->render('goods');
    }

    public function actionBalance()
    {
        return $this->render('balance');
    }
}
