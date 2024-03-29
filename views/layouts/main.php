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
    <div class="wrap bg-image-<?= mt_rand(1, 5); ?>">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::t('app', 'EENOSIMS'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $items = array();
            array_push($items, [
                'label' => Yii::t('app', 'Home'),
                'url' => ['/site/index']
                ]);

            if(Yii::$app->user->isGuest) {
                array_push($items, [
                    'label' => Yii::t('app', 'Login'),
                    'url' => ['/site/login']
                    ]);
            } else {
                array_push($items, [
                    'label' => Yii::t('app', 'Entries'),
                    'items' => [
                        ['label' => Yii::t('app', 'Members'), 'url' => ['/persons']],
                        ['label' => Yii::t('app', 'Medicines'), 'url' => ['/medicines']],
                        ['label' => Yii::t('app', 'Events'), 'url' => ['/events']],
                        ['label' => Yii::t('app', 'Invoices'), 'url' => ['/invoices']]
                    ]]);
                array_push($items, [
                    'label' => Yii::t('app', 'Reports'),
                    'items' => [
                        ['label' => Yii::t('app', 'Activity'), 'url' => ['/report/activity']],
                        ['label' => Yii::t('app', 'Data Integrity'), 'url' => ['/report/dataintegrity']],
                        ['label' => Yii::t('app', 'Invoices'), 'url' => ['/report/invoices']],
                        ['label' => Yii::t('app', 'Medicine Usage'), 'url' => ['/report/all']]
                    ]]);
                array_push($items, [
                    'label' => Yii::t('app', 'Logout').' ('. Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]);
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>

        <div class="container main-container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Yii::t('app', 'EENOSIMS NGO') ?> <?= date('Y') ?>.</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
