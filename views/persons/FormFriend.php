<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\ListSex;
use app\models\ListGraduation;
use app\models\ListMaritalStatus;

use app\components\Normalizer;

/* @var $this yii\web\View */
/* @var $model app\models\PersonDataFriend */
/* @var $form ActiveForm */

$this->title = $isCreate ? Yii::t('app', 'Register a friend') : Yii::t('app', 'Edit the friend');
$this->registerJsFile(
    'js/persons/formfriend.js',
    [
        'position' => yii\web\View::POS_END,
        'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
    ]);

$list_sex = Normalizer::executeKeyName(ListSex::find()->asArray()->all());
$list_graduation = Normalizer::executeKeyName(ListGraduation::find()->asArray()->all());
$list_marital_status = Normalizer::executeKeyName(ListMaritalStatus::find()->asArray()->all());
?>
<div class="FormFriend">

    <?php $form = ActiveForm::begin(); ?>

        <h1><?= $this->title ?></h1>

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
        <?= $form->field($model, 'tax_registration_number') ?>
        <?= $form->field($model, 'registered_since') ?>
        <?= $form->field($model, 'comments')->textarea() ?>
    
        <div class="form-group text-right">
            <a href="?r=persons/all" class="btn btn-danger"><?= Yii::t('app', 'Cancel') ?></a>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormFriend -->

<script src="js/jquery.min.js"></script> 
        <script>
            $(document).ready(function() {
                $("#persondatafriend-registered_since").kendoDatePicker({
                    format: "dd/MM/yyyy"
                });
            });
        </script>

        <style>
        .k-datepicker {
            height : 30px;
        }
        </style>