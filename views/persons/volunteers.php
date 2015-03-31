<?php
	$this->title = Yii::t('app', 'Volunteers');
	$this->registerJsFile(
		'js/persons/volunteers.js',
		[
			'position' => yii\web\View::POS_END,
			'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
		]);
?>
<script type="text/javascript">
var labels = {
	"grid_button_edit": "<?php echo Yii::t('app', 'Edit'); ?>",
	"grid_button_preview": "<?php echo Yii::t('app', 'Preview'); ?>",

	"grid_column_id": "<?php echo Yii::t('app', 'ID'); ?>",
	"grid_column_fname": "<?php echo Yii::t('app', 'First Name'); ?>",
	"grid_column_lname": "<?php echo Yii::t('app', 'Last Name'); ?>",
	"grid_column_birthday": "<?php echo Yii::t('app', 'Birthday'); ?>",
	"grid_column_may_provide": "<?php echo Yii::t('app', 'May Provide'); ?>",
	"grid_column_profession": "<?php echo Yii::t('app', 'Profession'); ?>",
	"grid_column_graduation": "<?php echo Yii::t('app', 'Graduation'); ?>",
	"grid_column_occupation": "<?php echo Yii::t('app', 'Occupation'); ?>",
	"grid_column_resume": "<?php echo Yii::t('app', 'Resume'); ?>",
	"grid_column_marital_status": "<?php echo Yii::t('app', 'Marital Status'); ?>",
	"grid_column_regsince": "<?php echo Yii::t('app', 'Registered Since'); ?>",
};

var links = {
	"person_read": "?r=api/volunteers/index",
	"person_update": "?r=persons/edit&form=formvolunteer&person_id=",
	"person_preview": "?r=persons/view&person_id="
};
</script>

<h3><?= Yii::t('app', 'Volunteers') ?></h3>
<p>
	<a id="" href="?r=persons/create" class="btn btn-success">
		<?php echo Yii::t('app', 'Register a person'); ?>
	</a>
</p>
<div id="mainGrid">
</div>
