<?php
/* @var $this yii\web\View */
$this->title .= 'Welcome EENOSIMS';
?>
<div class="site-index">

<?php if(Yii::$app->user->isGuest) : ?>
<!-- Just a Guest -->
    <div class="jumbotron">
        <h1>Welcome!</h1>
        <p class="lead">Dear visitor please login in order to continue.</p>
        <p><a class="btn btn-lg btn-success" href="?r=site/login">Login</a></p>
    </div>
<?php endif; ?>


<?php if(!Yii::$app->user->isGuest) : ?>
<!-- Definitely you are NOT guest -->
    <div class="jumbotron">
        <h2>Welcome <?php echo Yii::$app->user->identity->username; ?>!</h2>
        <div class="row ">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">People</h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=persons/all">All persons</a></div>
                        <div><a href="?r=persons/contacts">All contacts</a></div>
                        <div><a href="?r=persons/patients">Patients</a></div>
                        <div><a href="?r=persons/volunteers">Volunteers</a></div>
                        <div><a href="?r=persons/friends">Friends</a></div>
                        <div><a href="?r=persons/officials">Officials</a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Medicines</h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=medicines/all">All medicines</a></div>
                        <div><a href="?r=medicines/moves">Medicines movements</a></div>
                        <div><a href="?r=medicines/store">Medicines store</a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Events</h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=events/elections">Elections</a></div>
                        <div><a href="?r=events/promotions">Promotions</a></div>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Invoices</h3>
                    </div>
                    <div class="panel-body">
                        <div><a href="?r=invoices/cashs">Cash receipts</a></div>
                        <div><a href="?r=invoices/pays">Payment receipts</a></div>
                        <div><a href="?r=invoices/goods">Good receipts</a></div>
                        <div><a href="?r=invoices/balance">Current Balance</a></div>
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
