<?php
	$this->title = Yii::t('app', 'Officials');
	$this->registerJsFile(
		'js/persons/officials.js',
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
	"grid_column_institution": "<?php echo Yii::t('app', 'Institution Name'); ?>",
	"grid_column_capacity": "<?php echo Yii::t('app', 'Capacity'); ?>",
};

var links = {
	"person_read": "?r=api/officials/index",
	"person_update": "?r=persons/edit&form=formofficial&person_id=",
	"person_preview": "?r=persons/view&person_id="
};
</script>

<h3><?= Yii::t('app', 'Officials') ?></h3>
<p>
	<a id="" href="?r=persons/create" class="btn btn-success">
		<?php echo Yii::t('app', 'Register a person'); ?>
	</a>
</p>
<div id="mainGrid">
</div>
