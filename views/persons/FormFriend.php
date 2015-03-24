<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonDataFriend */
/* @var $form ActiveForm */

if($isCreate)
    $this->title = Yii::t('app', 'Register a friend');
else
    $this->title = Yii::t('app', 'Edit the friend');

?>
<div class="FormFriend">

    <?php $form = ActiveForm::begin(); ?>

        <h1><?= Yii::t('app', 'Register a friend') ?></h1>

        <input type="hidden" id="model_name" name="model_name" value="PersonDataFriend" required="required" />
        <input type="hidden" id="person_id" name="person_id" value="<?= $person_id ?>" />
        <input type="hidden" id="step" name="step" value="<?= $step ?>" />
        
        
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
        <?= $form->field($model, 'registered_since') ?>
        <?= $form->field($model, 'comments') ?>
    
        <div class="form-group text-right">
            <a href="?r=persons/all" class="btn btn-danger"><?= Yii::t('app', 'Cancel') ?></a>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormFriend -->
