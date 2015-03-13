<?php
	$this->title = 'Medicines';
	$this->registerJsFile(
		'js/medicines/store.js',
		[
			'position' => yii\web\View::POS_END,
			'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
		]);
?>
<script type="text/javascript">
var labels = {
    "grid_button_new": "<?php echo Yii::t('app', 'Make a move'); ?>",
    "grid_column_id": "<?php echo Yii::t('app', 'Med. ID'); ?>",
    "grid_column_name": "<?php echo Yii::t('app', 'Medicine Name'); ?>",
    "grid_column_unit": "<?php echo Yii::t('app', 'Unit'); ?>",
    "grid_column_details": "<?php echo Yii::t('app', 'Details'); ?>",
    "grid_column_expdate": "<?php echo Yii::t('app', 'Expiration Date'); ?>",
    "grid_column_count": "<?php echo Yii::t('app', 'Stock Count'); ?>",

    "grid_details_id": "<?php echo Yii::t('app', 'ID'); ?>",
    "grid_details_action": "<?php echo Yii::t('app', 'Action'); ?>",
    "grid_details_actdate": "<?php echo Yii::t('app', 'Action Date'); ?>",
    "grid_details_count": "<?php echo Yii::t('app', 'Count'); ?>",
    "grid_details_movreason": "<?php echo Yii::t('app', 'Reason'); ?>",
    "grid_details_fname": "<?php echo Yii::t('app', 'First Name'); ?>",
    "grid_details_lname": "<?php echo Yii::t('app', 'Last Name'); ?>",

    "notifs_message": "<?php echo Yii::t('app', 'Please pay attention to following medicines'); ?>",
    "notifs_message_expiration": "<?php echo Yii::t('app', 'expiration'); ?>",
};

var links = {
    "grid_read": "?r=api/medicines/store",
    "grid_details_read": "?r=api/medicines/moves",
    "notifs_read": "?r=api/medicines/notifs",
};
</script>

<h3>Medicine Store</h3>
<div id="alertExpire" class="alert alert-danger hide" role="alert">
    <b>Expired:</b> <span class="msg"></span>
</div>
<div id="warnExpire" class="alert alert-warning hide" role="alert">
	<b>About to Expire:</b> <span class="msg"></span>
</div>

<div id="mainGrid">
</div>

<script type="text/x-kendo-template" id="detailTemplate">
    <div class='medicine_moves'></div>
</script>