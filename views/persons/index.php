<?php
	$this->title = Yii::t('app', 'Members');
?>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=persons/all"
	role="button">
		<?= Yii::t('app','All Members') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=persons/contacts"
	role="button">
		<?= Yii::t('app','All Contacts') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=persons/patients"
	role="button">
		<?= Yii::t('app','Patients') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=persons/volunteers"
	role="button">
		<?= Yii::t('app','Volunteers') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=persons/friends"
	role="button">
		<?= Yii::t('app','Friends') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=persons/officials"
	role="button">
		<?= Yii::t('app','Officials') ?>
</a>