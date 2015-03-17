<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonDataPatient */
/* @var $form ActiveForm */
?>
<div class="FormVolunteer">

    <?php $form = ActiveForm::begin(); ?>

    	Thank you
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormVolunteer -->
