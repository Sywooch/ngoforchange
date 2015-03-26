<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\ListSex;
use app\models\ListGraduation;
use app\models\ListMaritalStatus;

use app\components\Normalizer;

/* @var $this yii\web\View */
/* @var $model app\models\PersonDataPatient */
/* @var $form ActiveForm */

$this->title = $isCreate ? Yii::t('app', 'Register a patient') : Yii::t('app', 'Edit the patient');
$this->registerJsFile(
    'js/persons/formpatient.js',
    [
        'position' => yii\web\View::POS_END,
        'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
    ]);

$list_sex = Normalizer::executeKeyName(ListSex::find()->asArray()->all());
$list_graduation = Normalizer::executeKeyName(ListGraduation::find()->asArray()->all());
$list_marital_status = Normalizer::executeKeyName(ListMaritalStatus::find()->asArray()->all());
?>
<script type="text/javascript">
var labels = {
    "photo_select": "<?= Yii::t('app', 'Select a photo') ?>",
    "disability_select": "<?= Yii::t('app', 'Select the proof for disability') ?>",
    "application_select": "<?= Yii::t('app', 'Select the filled application form') ?>"
};
</script>
<div class="FormPatient">

    <?php $form = ActiveForm::begin(); ?>

        <h1><?= $this->title ?></h1>

        <input type="hidden" id="model_name" name="model_name" value="PersonDataPatient" required="required" />
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
        <?= $form->field($model, 'photo')->fileInput() ?>
        <?= $form->field($model, 'mother_name') ?>
        <?= $form->field($model, 'sex')->dropDownList($list_sex) ?>
        <?= $form->field($model, 'birthday') ?>
        <?= $form->field($model, 'marital_status')->dropDownList($list_marital_status) ?>
        <?= $form->field($model, 'children') ?>
        <?= $form->field($model, 'profession') ?>
        <?= $form->field($model, 'graduation')->dropDownList($list_graduation) ?>
        <?= $form->field($model, 'occupation') ?>
        <?= $form->field($model, 'disability') ?>
        <?= $form->field($model, 'disability_subsidy') ?>
        <?= $form->field($model, 'disability_proof')->fileInput() ?>
        <?= $form->field($model, 'application_form')->fileInput() ?>
        <?= $form->field($model, 'doctor') ?>
        <?= $form->field($model, 'health_insurance') ?>
        <?= $form->field($model, 'private_correspondence')->checkBox() ?>
        <?= $form->field($model, 'email_subscribe')->checkBox() ?>
        <?= $form->field($model, 'registered_since') ?>
        <?= $form->field($model, 'last_contact') ?>
        <?= $form->field($model, 'comments')->textarea() ?>
        
        <div class="form-group text-right">
            <a href="?r=persons/all" class="btn btn-danger">Cancel</a>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormPatient -->
