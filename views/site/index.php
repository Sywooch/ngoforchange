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
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Entries</h3>
                    </div>
                    <div class="panel-body">
                        <h4>Medicines</h4>
                        <div><a herf="">View stock</a></div>
                        <div><a href="">Medicines</a></div>
                        <div><a href="">Medicines Transfers</a></div>
                        <h4>Invoices</h4>
                        <div><a herf="">Current balance</a></div>
                        <div><a herf="">Balance report</a></div>
                        <div><a herf="">Receipts</a></div>
                        <div><a herf="">Payments</a></div>
                    </div>
                    <div class="panel-footer">Panel footer</div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Patients</h3>
                    </div>
                    <div class="panel-body">
                        <div>View all</div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="panel-footer">Panel footer</div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Friends</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                    <div class="panel-footer">Panel footer</div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Officials</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                    <div class="panel-footer">Panel footer</div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Volunteers</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                    <div class="panel-footer">Panel footer</div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Events</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                    <div class="panel-footer">Panel footer</div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Elections</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                    <div class="panel-footer">Panel footer</div>
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
