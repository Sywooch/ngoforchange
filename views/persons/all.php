<?php
	$this->title = 'All people';
	$this->registerJsFile(
		'js/persons/all.js',
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
	"grid_column_types": "<?php echo Yii::t('app', 'Registered as'); ?>",
	"grid_column_ssrn": "<?php echo Yii::t('app', 'SSRN'); ?>",
	"grid_column_idnumber": "<?php echo Yii::t('app', 'ID Number'); ?>",
	"grid_column_fathername": "<?php echo Yii::t('app', 'Father Name'); ?>",
	"grid_column_address": "<?php echo Yii::t('app', 'Address'); ?>",
	"grid_column_post": "<?php echo Yii::t('app', 'Post Code'); ?>",
	"grid_column_city": "<?php echo Yii::t('app', 'City'); ?>",
	
	"grid_confirm_delete": "<?php echo Yii::t('app', 'Are you sure that you want to delete this record?'); ?>"
};

var links = {
	"person_read": "?r=api/persons/index",
	"person_update": "?r=api/persons/update",
	"person_destroy": "?r=api/persons/destroy",
	"person_preview": "?r=persons/view&person_id="
};
</script>

<h3>All people</h3>
<p>
	<a id="" href="?r=persons/create" class="btn btn-success">
		<?php echo Yii::t('app', 'Register a person'); ?>
	</a>
</p>
<div id="mainGrid">
</div>
