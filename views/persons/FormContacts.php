<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */
/* @var $form ActiveForm */
?>
<div class="FormContacts">

    <?php $form = ActiveForm::begin(); ?>
    	<h1>Fill in contacts</h1>
    	<input type="text" id="model_name" name="model_name" value="PersonContact" required="required" />
    	<input type="text" id="person_id" name="person_id" value="<?= $person_id ?>" />
		<input type="text" id="step" name="step" value="<?= $step ?>" />
        
        <div class="form-group text-right">
        	<a href="?r=persons/all" class="btn btn-danger">Cancel</a>
        	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormContacts -->
