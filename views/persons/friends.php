<?php
	$this->title = Yii::t('app', 'Friends');
	$this->registerJsFile(
		'js/persons/friends.js',
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
	"grid_column_trn": "<?php echo Yii::t('app', 'Tax Registation Number'); ?>",
	"grid_column_regsince": "<?php echo Yii::t('app', 'Registered Since'); ?>",
	"grid_column_comments": "<?php echo Yii::t('app', 'Comments'); ?>",
};

var links = {
	"person_read": "?r=api/friends/index",
	"person_update": "?r=persons/edit&form=formfriend&person_id=",
	"person_preview": "?r=persons/view&person_id="
};
</script>

<h3><?= Yii::t('app', 'Friends') ?></h3>
<p>
	<a id="" href="?r=persons/create" class="btn btn-success">
		<?php echo Yii::t('app', 'Register a person'); ?>
	</a>
</p>
<div id="mainGrid">
</div>
