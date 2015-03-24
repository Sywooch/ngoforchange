<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form ActiveForm */

$this->title = $isCreate ? Yii::t('app', 'Register a member') : Yii::t('app', 'Edit the member');
$this->registerJsFile(
	'js/persons/formperson.js',
	[
		'position' => yii\web\View::POS_END,
		'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
	]);
?>
<script type="text/javascript">
	window.personTypesSelected = [
		<?php  ?>
	];
</script>
<div class="FormPerson">
	<h1><?= $this->title ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    	<input type="hidden" id="model_name" name="model_name" value="Person" required="required" />
    	<input type="hidden" id="id" name="id" value="<?= $person_id ?>" />
    	<input type="hidden" id="step" name="step" value="<?= $step ?>" />

		<?=
			(!$isCreate) ? 
				$form->field($model, 'id')
					->textInput([
						'id' => 'id',
						'tabIndex' => '1', 
				]) : ''
		?>
		<?=
			$form->field($model, 'first_name')
				->textInput([
					'id' => 'first_name',
					'tabIndex' => '2',
				])
		?>
		<?=
			$form->field($model, 'last_name')
				->textInput([
					'id' => 'last_name',
					'tabIndex' => '3',
				])
		?>
		<?=
			$form->field($model, 'father_name')
				->textInput([
					'id' => 'father_name',
					'tabIndex' => '4',
				])
		?>
		<?=
			$form->field($model, 'ssrn')
				->textInput([
					'id' => 'ssrn',
					'tabIndex' => '3',
				])
		?>
		<?=
			$form->field($model, 'id_number')
				->textInput([
					'id' => 'id_number',
					'tabIndex' => '3',
				])
		?>
		<?=
			$form->field($model, 'address')
				->textInput([
					'id' => 'address',
					'tabIndex' => '3',
				])
		?>
		<?=
			$form->field($model, 'post_code')
				->textInput([
					'id' => 'post_code',
					'tabIndex' => '3',
				])
		?>
		<?=
			$form->field($model, 'city')
				->textInput([
					'id' => 'city',
					'tabIndex' => '3',
				])
		?>
    	<?=
    		$form->field($model, 'selectedTypes')
    			->listBox($types, [
					'id' => 'selectedTypes',
					'tabIndex' => '4',
				    'multiple' => true,
				    'data-placeholder' => Yii::t('app', 'pick types ...')
				])
		?>  	
        
        <div class="form-group text-right">
        	<a href="?r=persons/all" class="btn btn-danger">Cancel</a>
        	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormPerson -->
