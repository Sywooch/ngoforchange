<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form ActiveForm */

$this->registerJsFile(
	'js/persons/formperson.js',
	[
		'position' => yii\web\View::POS_END,
		'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
	]);
?>
<div class="FormPerson">
	<h1><?= ($isCreate) ? 'Create a Person' : 'Edit the Person' ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    	<input type="hidden" id="modelName" name="modelName" value="Person" />
    	<input type="hidden" id="modelName" name="person_id" value="" />

		<?= (!$isCreate) ? $form->field($model, 'id')->textInput(['tabIndex'=>'1','id' => 'id']) : ''  ?>
		<?= $form->field($model, 'first_name')->textInput(['tabIndex'=>'2','id'=>'first_name']) ?>
		<?= $form->field($model, 'last_name')->textInput(['tabIndex'=>'3','id'=>'last_name']) ?>
    	
    	<div class="form-group field-person-types">
			<label class="control-label" for="types">Register as</label>
			<select id="required" multiple="multiple" data-placeholder="pick types ...">
	            <option>Patient</option>
	            <option>Friend</option>
	            <option>Official</option>
	            <option>Volunteer</option>
	        </select>
		</div>
    	
        
        <div class="form-group text-right">
        	<a href="?r=persons/all" class="btn btn-danger">Cancel</a>
        	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormPerson -->
