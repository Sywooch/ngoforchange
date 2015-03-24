<?php
	$this->title = Yii::t('app', 'Medicines');
?>
<a
	class="text-center btn btn-lg btn-info btn-block"
	href="?r=medicines/store"
	role="button">
		<?= Yii::t('app', 'Medicines Store') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=medicines/all"
	role="button">
		<?= Yii::t('app', 'Medicines') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=medicines/moves"
	role="button">
		<?= Yii::t('app', 'Medicines Movements') ?>
</a>
