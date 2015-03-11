<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'EENOSIMS',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $items = array();
            array_push($items, ['label' => 'Home', 'url' => ['/site/index']]);

            if(Yii::$app->user->isGuest) {
                array_push($items, ['label' => 'Login', 'url' => ['/site/login']]);
            } else {
                array_push($items, [
                    'label' => 'Entries',
                    'items' => [
                        ['label' => 'Patients', 'url' => ['/patients']],
                        ['label' => 'Volunteers', 'url' => ['/volunteers']],
                        ['label' => 'Friends', 'url' => ['/friends']],
                        ['label' => 'Officials', 'url' => ['/officials']],
                        ['label' => 'Medicines', 'url' => ['/medicines']],
                        ['label' => 'Events', 'url' => ['/events']],
                        ['label' => 'Elections', 'url' => ['/elections']],
                        ['label' => 'Invoices', 'url' => ['/invoices']]
                    ]]);
                array_push($items, [
                    'label' => 'Reports',
                    'items' => [
                        ['label' => 'Patients', 'url' => ['/report/all']],
                        ['label' => 'Volunteers', 'url' => ['/report/all']],
                        ['label' => 'Friends', 'url' => ['/report/all']],
                        ['label' => 'Officials', 'url' => ['/report/all']],
                        ['label' => 'Medicines', 'url' => ['/report/all']],
                        ['label' => 'Events', 'url' => ['/report/all']],
                        ['label' => 'Elections', 'url' => ['/report/all']],
                        ['label' => 'Invoices', 'url' => ['/report/all']]
                    ]]);
                array_push($items, [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]);
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; EENOSIMS NGO <?= date('Y') ?>.</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>