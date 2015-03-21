<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonSummary */
/* @var $form ActiveForm */
?>
<div class="FormSummary">

    <?php $form = ActiveForm::begin(); ?>
        <h1>Thank you</h1>
        <p>
            Person registered successfully.
        </p>
        <p>
            <?php
                if(isset($model['person_id']))
                    echo "Person's ID is <b>".$model['person_id']."</b>.<br />";
                if(isset($model['first_name']) && isset($model['last_name']))
                    echo "Name: <b>".$model['first_name']." ".$model['last_name']."</b>.<br />";
                if(isset($model['count_assigns']))
                    echo 'Person has <b>'. $model['count_assigns'] .'</b> assignments.<br />';
                if(isset($model['count_contacts']))
                    echo 'Overall added contacts are <b>'. $model['count_contacts'] .'</b>.<br />';
            ?>
        </p>
    
        <div class="form-group text-right">
            <a href="?r=persons/all" class="btn btn-success">Finish</a>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormSummary -->
