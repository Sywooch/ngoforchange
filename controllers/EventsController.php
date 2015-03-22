<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Medicine;

class EventsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionElections()
    {
        return $this->render('elections');
    }

    public function actionPromotions()
    {
        return $this->render('promotions');
    }
}
