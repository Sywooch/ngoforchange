<?php
	$this->title = 'Medicines';
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
};

var links = {
	"grid_read": "?r=api/medicines",

	"grid_create": "?r=api/medcreate",
};
</script>

<h3>Medicines</h3>
<div id="mainGrid">
</div>
