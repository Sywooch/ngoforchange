<?php
	$this->title = Yii::t('app', 'All contacts');
	$this->registerJsFile(
		'js/persons/contacts.js',
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
	"contact_create": "?r=api/contacts/create",
	"contact_read": "?r=api/contacts/index",
	"contact_update": "?r=api/contacts/update",
	"contact_destroy": "?r=api/contacts/destroy"
};

var contactTypeIcons = <?php echo json_encode(Yii::$app->params['contactTypeIcons']) ?>;
</script>

<h3>All contacts</h3>
<div id="mainGrid">
</div>