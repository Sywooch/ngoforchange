<?php
	$this->title = Yii::t('app', 'Medicines');
	$this->registerJsFile(
		'js/medicines/all.js',
		[
			'position' => yii\web\View::POS_END,
			'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
		]);
?>
<script type="text/javascript">
var labels = {
	"newbutton": "<?php echo Yii::t('app', 'New medicine'); ?>",
	"edit": "<?php echo Yii::t('app', 'Edit'); ?>",
	"destroy": "<?php echo Yii::t('app', 'Delete'); ?>",

	"grid_column_name": "<?php echo Yii::t('app', 'Medicine Name'); ?>",
	"grid_column_unit": "<?php echo Yii::t('app', 'Unit'); ?>",
	"grid_column_details": "<?php echo Yii::t('app', 'Details'); ?>",

	"grid_confirm_delete": "<?php echo Yii::t('app', 'Are you sure that you want to delete this record?'); ?>"
};

var links = {
	"grid_create": "?r=api/medicines/create",
	"grid_read": "?r=api/medicines",
	"grid_update": "?r=api/medicines/update",
	"grid_destroy": "?r=api/medicines/destroy",
};
</script>

<h3><?= Yii::t('app', 'Medicines') ?></h3>
<div id="mainGrid">
</div>
