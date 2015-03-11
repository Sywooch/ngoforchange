<?php
	$this->title = "Medicines Movements";
	$this->registerJsFile(
		'js/medicines/list.js',
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
	"grid_create": "?r=api/medcreate",
	"grid_read": "?r=api/medicines",
	"grid_update": "?r=api/medupdate",
	"grid_destroy": "?r=api/meddestroy",
};
</script>

<h3>Medicines - Transactions</h3>
<div id="mainGrid">
</div>