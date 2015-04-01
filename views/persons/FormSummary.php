<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonSummary */
/* @var $form ActiveForm */

$this->title = Yii::t('app', 'Thank you');
?>
<div class="FormSummary">

    <?php $form = ActiveForm::begin(); ?>
        <h1><?= Yii::t('app', 'Thank you') ?></h1>
        <p>
            <?= Yii::t('app', 'Member registered successfully') ?>.
        </p>
        <p>
            <?php
                if(isset($model['person_id'])) {
                    echo
                        Yii::t('app', 'Person\'s ID is').
                        ' <b>'.$model['person_id'].'</b>.<br />';
                }
                if(isset($model['first_name']) && isset($model['last_name'])) {
                    echo
                        Yii::t('app', 'Name').
                        ': <b>'.$model['first_name'].
                        ' '.$model['last_name']."</b>.<br />";
                }
                if(isset($model['count_assigns'])) {
                    echo
                        Yii::t('app', 'Person has').
                        ' <b>'. $model['count_assigns'] .'</b> '.
                        Yii::t('app', 'assignments').
                        '.<br />';
                }
                if(isset($model['count_contacts'])) {
                    echo
                        Yii::t('app', 'Overall added contacts are').
                        ' <b>'. $model['count_contacts'] .'</b>.<br />';
                }
            ?>
        </p>
    
        <div class="form-group text-right">
            <a href="?r=persons/all" class="btn btn-success">
                <?= Yii::t('app', 'Finish') ?>
            </a>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormSummary -->
