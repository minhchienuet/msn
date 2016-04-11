<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
<?php
    NavBar::begin([
        'brandLabel' => 'MSN',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse  navbar-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Users', 'url' => ['/admin/user']],
            ['label' => 'RBAC', 'url' => ['/admin/rbac']],
            [
                'label' => 'AQI',
                'items' => [
                    ['label' => 'AQI Việt Nam', 'url' => ['/aqi-vn']],
                    ['label' => 'AQI Quốc tế', 'url' => ['/aqi-qt']],
                ],
            ],
            ['label' => 'Nodes', 'url' => ['/node']],
            ['label' => 'Báo cáo/Thống kê', 'url' => ['/site/report']],
            ['label' => 'Cảnh báo', 'url' => ['/site/warning']],
            ['label' => 'Bản tin', 'url' => ['/site/news']],
        ],
    ]);
    ?>
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>[
            Yii::$app->user->isGuest ?
                ['label' => 'Đăng nhập', 'url' => ['/login']] :
                [
                    'label' => ' '. Yii::$app->user->identity->email . ' ',
                    'items'=>[
                        ['label' => 'Setting Account', 'url' => ['/profile'], 'linkOptions' => ['data-method' => 'post']],
                        ['label' => 'Logout', 'url' => ['/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
                ],
            ['label' => 'Đăng ký', 'url' => ['/signup']],
        ]
    ]);
    NavBar::end();
    ?>
<div class="col-lg-12">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">
                <i class="glyphicon glyphicon-remove"></i>
            </button>
            <strong>Success: </strong> <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">
                <i class="glyphicon glyphicon-remove"></i>
            </button>
            <strong>Error: </strong> <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
</div>
<div class="container-fluid">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php $this->endPage() ?>