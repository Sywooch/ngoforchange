<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\components\Normalizer;

/* @var $this yii\web\View */
/* @var $model app\models\PersonContact */
/* @var $form ActiveForm */

$this->title = $isCreate ? Yii::t('app', 'Register contacts') : Yii::t('app', 'Edit contacts');
$this->registerJsFile(
    'js/persons/formcontacts.js',
    [
        'position' => yii\web\View::POS_END,
        'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
    ]);
?>
<script type="text/javascript">
var labels = {
    "grid_button_create": "<?php echo Yii::t('app', 'Create'); ?>",
    "grid_button_edit": "<?php echo Yii::t('app', 'Edit'); ?>",
    "grid_button_destroy": "<?php echo Yii::t('app', 'Delete'); ?>",

    "grid_column_id": "<?php echo Yii::t('app', 'ID'); ?>",
    "grid_column_type": "<?php echo Yii::t('app', 'Category'); ?>",
    "grid_column_data": "<?php echo Yii::t('app', 'Contact'); ?>",
    "grid_column_person": "<?php echo Yii::t('app', 'Person'); ?>",
    
    "grid_column_idnumber": "<?php echo Yii::t('app', 'ID Number'); ?>",
    "grid_column_fathername": "<?php echo Yii::t('app', 'Father Name'); ?>",
    "grid_column_address": "<?php echo Yii::t('app', 'Address'); ?>",
    "grid_column_post": "<?php echo Yii::t('app', 'Post Code'); ?>",
    "grid_column_city": "<?php echo Yii::t('app', 'City'); ?>",
    
    "grid_confirm_delete": "<?php echo Yii::t('app', 'Are you sure that you want to delete this record?'); ?>"
};

var links = {
    "person_read": "?r=api/persons/index",
    "person_update": "?r=persons/edit&form=formperson&person_id=",
    "person_destroy": "?r=api/persons/destroy",
    "person_preview": "?r=persons/view&person_id="
};
</script>
<div class="FormContacts">

    <?php $form = ActiveForm::begin(); ?>
    	
        <h1><?= $this->title ?></h1>

    	<input type="hidden" id="model_name" name="model_name" value="PersonContact" required="required" />
    	<input type="hidden" id="person_id" name="person_id" value="<?= $person_id ?>" />
		<input type="hidden" id="step" name="step" value="<?= $step ?>" />
        
        <div class="form-group">
            <div id="conatct-form-list" class="conatct-form-list"></div>
        </div>

        <div class="form-group text-right">
        	<a href="?r=persons/all" class="btn btn-danger"><?= Yii::t('app', 'Cancel') ?></a>
        	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default', 'disabled' => 'disabled']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create and Continue'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- FormContacts -->
