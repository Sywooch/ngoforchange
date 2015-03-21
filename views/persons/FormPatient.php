<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonDataPatient */
/* @var $form ActiveForm */
?>
<div class="FormPatient">

    <?php $form = ActiveForm::begin(); ?>

        <h1>Register a Patient</h1>

        <input type="text" id="model_name" name="model_name" value="PersonDataPatient" required="required" />
        <input type="text" id="person_id" name="person_id" value="<?= $person_id ?>" />
        <input type="text" id="step" name="step" value="<?= $step ?>" />
        
        
        <div class="form-group">
            <label class="control-label" for="person-name">Name</label>
            <input type="text" id="person-name" class="form-control" name="person_name" value="<?php
                    echo $person['first_name'];
                    echo ' ';
                    echo $person['last_name'];
                ?>" disabled="disabled">
        </div>
        <?= $form->field($model, 'person_id')->textInput([
                    'readonly' => 'readonly',
                    'tabIndex' => '3',
                    'value' => $person_id
                ]) ?>
        <?= $form->field($model, 'ssrn') ?>
        <?= $form->field($model, 'mother_name') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'disability') ?>
        <?= $form->field($model, 'children') ?>
        <?= $form->field($model, 'private_correspondence') ?>
        <?= $form->field($model, 'photo') ?>
        <?= $form->field($model, 'disability_proof') ?>
        <?= $form->field($model, 'application_form') ?>
        <?= $form->field($model, 'medication') ?>
        <?= $form->field($model, 'comments') ?>
        <?= $form->field($model, 'last_contact') ?>
        <?= $form->field($model, 'create_time') ?>
        <?= $form->field($model, 'update_time') ?>
        <?= $form->field($model, 'post_code') ?>
        <?= $form->field($model, 'sex') ?>
        <?= $form->field($model, 'marital_status') ?>
        <?= $form->field($model, 'graduation') ?>
        <?= $form->field($model, 'occupation') ?>
    
        <div class="form-group text-right">
            <a href="?r=persons/all" class="btn btn-danger">Cancel</a>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormPatient -->
