<?php
	$this->title = Yii::t('app', 'Patients');
	$this->registerJsFile(
		'js/persons/patients.js',
		[
			'position' => yii\web\View::POS_END,
			'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
		]);
?>
<script type="text/javascript">
var labels = {
	"grid_button_edit": "<?php echo Yii::t('app', 'Edit'); ?>",
	"grid_button_destroy": "<?php echo Yii::t('app', 'Delete'); ?>",
	"grid_button_preview": "<?php echo Yii::t('app', 'Preview'); ?>",

	"grid_column_id": "<?php echo Yii::t('app', 'ID'); ?>",
	"grid_column_fname": "<?php echo Yii::t('app', 'First Name'); ?>",
	"grid_column_lname": "<?php echo Yii::t('app', 'Last Name'); ?>",
	"grid_column_photo": "<?php echo Yii::t('app', 'Photo'); ?>",
	"grid_column_mother": "<?php echo Yii::t('app', 'Mother Name'); ?>",
	"grid_column_age": "<?php echo Yii::t('app', 'Age'); ?>",
	"grid_column_birthday": "<?php echo Yii::t('app', 'Birthday'); ?>",
	"grid_column_marital": "<?php echo Yii::t('app', 'Marital Status'); ?>",
	"grid_column_children": "<?php echo Yii::t('app', 'Children'); ?>",
	"grid_column_profession": "<?php echo Yii::t('app', 'Profession'); ?>",
	"grid_column_graduation": "<?php echo Yii::t('app', 'Graduation'); ?>",
	"grid_column_occupation": "<?php echo Yii::t('app', 'Occupation'); ?>",
	"grid_column_disability": "<?php echo Yii::t('app', 'Disability'); ?>",
	"grid_column_subsidy": "<?php echo Yii::t('app', 'Disability Subsidy'); ?>",
	"grid_column_proof": "<?php echo Yii::t('app', 'Disability Proof'); ?>",
	"grid_column_appform": "<?php echo Yii::t('app', 'Application Form'); ?>",
	"grid_column_medication": "<?php echo Yii::t('app', 'Medication'); ?>",
	"grid_column_doctor": "<?php echo Yii::t('app', 'Doctor'); ?>",
	"grid_column_private": "<?php echo Yii::t('app', 'Private Correspondence'); ?>",
	"grid_column_regage": "<?php echo Yii::t('app', 'Registered'); ?>",
	"grid_column_regsince": "<?php echo Yii::t('app', 'Registered Since'); ?>",
	"grid_column_lastcontact": "<?php echo Yii::t('app', 'Last Contact'); ?>",
	"grid_column_comments": "<?php echo Yii::t('app', 'Comments'); ?>",
	"grid_column_sex": "<?php echo Yii::t('app', 'Sex'); ?>",
	
	"grid_confirm_delete": "<?php echo Yii::t('app', 'Are you sure that you want to delete this record?'); ?>",
	"grid_message_na": "<?php echo Yii::t('app', 'N/A'); ?>",
	"grid_message_yes": "<?php echo Yii::t('app', 'Yes'); ?>",
	"grid_message_no": "<?php echo Yii::t('app', 'No'); ?>",
};

var links = {
	"person_read": "?r=api/patients/index",
	"person_update": "?r=persons/edit&form=formpatient&person_id=",
	"person_preview": "?r=persons/view&person_id="
};
</script>

<h3><?= Yii::t('app', 'Patients') ?></h3>
<p>
	<a id="" href="?r=persons/create" class="btn btn-success">
		<?php echo Yii::t('app', 'Register a person'); ?>
	</a>
</p>
<div id="mainGrid">
</div>
