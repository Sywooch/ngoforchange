<?php
/* @var $this yii\web\View */
$this->title .= Yii::t('app', 'Welcome EENOSIMS');
?>
<div class="site-index">

<?php if(Yii::$app->user->isGuest) : ?>
<!-- Just a Guest -->
    <div class="jumbotron">
        <h1><?= Yii::t('app', 'Welcome!') ?></h1>
        <p class="lead"><?= Yii::t('app', 'Dear visitor please login in order to continue.') ?></p>
        <p><a class="btn btn-lg btn-success" href="?r=site/login"><?= Yii::t('app', 'Login') ?></a></p>
    </div>
<?php endif; ?>


<?php if(!Yii::$app->user->isGuest) : ?>
<!-- Definitely you are NOT guest -->
    <div class="jumbotron">
        <h2><?= Yii::t('app', 'Welcome') ?> <?php echo Yii::$app->user->identity->username; ?>!</h2>
        <div class="row ">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Yii::t('app', 'Members') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=persons/all"><?= Yii::t('app', 'All members') ?></a></div>
                        <div><a href="?r=persons/contacts"><?= Yii::t('app', 'All contacts') ?></a></div>
                        <div><a href="?r=persons/patients"><?= Yii::t('app', 'Patients') ?></a></div>
                        <div><a href="?r=persons/volunteers"><?= Yii::t('app', 'Volunteers') ?></a></div>
                        <div><a href="?r=persons/friends"><?= Yii::t('app', 'Friends') ?></a></div>
                        <div><a href="?r=persons/officials"><?= Yii::t('app', 'Officials') ?></a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Yii::t('app', 'Medicines') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=medicines/all"><?= Yii::t('app', 'All medicines') ?></a></div>
                        <div><a href="?r=medicines/moves"><?= Yii::t('app', 'Medicines movements') ?></a></div>
                        <div><a href="?r=medicines/store"><?= Yii::t('app', 'Medicines store') ?></a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Yii::t('app', 'Events') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=events/elections"><?= Yii::t('app', 'Elections') ?></a></div>
                        <div><a href="?r=events/promotions"><?= Yii::t('app', 'All events') ?></a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Yii::t('app', 'Invoices') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=invoices/cashs"><?= Yii::t('app', 'Cash receipts') ?></a></div>
                        <div><a href="?r=invoices/pays"><?= Yii::t('app', 'Payment receipts') ?></a></div>
                        <div><a href="?r=invoices/goods"><?= Yii::t('app', 'Good receipts') ?></a></div>
                        <div><a href="?r=invoices/balance"><?= Yii::t('app', 'Current Balance') ?></a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="row">
        </div>
    </div>
<?php endif; ?>
</div>
