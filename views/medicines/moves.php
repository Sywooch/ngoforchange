<?php
	$this->title = Yii::t('app', 'Medicines Movements');
	$this->registerJsFile(
		'js/medicines/moves.js',
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

	"grid_column_id": "<?php echo Yii::t('app', 'ID'); ?>",
    "grid_column_action": "<?php echo Yii::t('app', 'Action'); ?>",
    "grid_column_actdate": "<?php echo Yii::t('app', 'Action Date'); ?>",
    "grid_column_count": "<?php echo Yii::t('app', 'Count'); ?>",
    "grid_column_expdate": "<?php echo Yii::t('app', 'Expiration Date'); ?>",
    "grid_column_movreason": "<?php echo Yii::t('app', 'Reason'); ?>",
    "grid_column_fname": "<?php echo Yii::t('app', 'First Name'); ?>",
    "grid_column_lname": "<?php echo Yii::t('app', 'Last Name'); ?>",

	"grid_confirm_delete": "<?php echo Yii::t('app', 'Are you sure that you want to delete this record?'); ?>"
};

var links = {
	"grid_create": "?r=api/medicines/move",
	"grid_read": "?r=api/medicines/moves"
};
</script>

<h3><?= Yii::t('app', 'Medicines - Movements') ?></h3>
<div id="mainGrid">
</div>