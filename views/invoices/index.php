<?php
	$this->title = Yii::t('app', 'Invoices');
?>
<a
	class="text-center btn btn-lg btn-info btn-block"
	href="?r=invoices/balance"
	role="button">
		<?= Yii::t('app', 'Current balance') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=invoices/cashs"
	role="button">
		<?= Yii::t('app', 'Cash receipts') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=invoices/pays"
	role="button">
		<?= Yii::t('app', 'Payment receipts') ?>
</a>
<a
	class="text-center btn btn-lg btn-default btn-block"
	href="?r=invoices/goods"
	role="button">
		<?= Yii::t('app', 'Good receipts') ?>
</a>