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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
            ['label' => 'Cảnh báo', 'url' => ['/admin/warning']],
            ['label' => 'Nodes', 'url' => ['/admin/node']],
            ['label' => 'Sensors', 'url' => ['/sensors']],
        ],
    ]);

    if(Yii::$app->user->isGuest){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' =>[
                ['label' => 'Đăng nhập', 'url' => ['/login']],
                ['label' => 'Đăng ký', 'url' => ['/signup']],
            ]
        ]);
    }else{
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' =>[
                [
                    'label' => ' '. Yii::$app->user->identity->email . ' ',
                    'items'=>[
                        ['label' => 'Cài đặt tài khoản', 'url' => ['/profile'], 'linkOptions' => ['data-method' => 'post']],
                        ['label' => 'Danh sách cảnh báo', 'url' => ['/site/warning/list']],
                        ['label' => 'Logout', 'url' => ['/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
                ],
            ]
        ]);
    }
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
<?php $this->endPage() ?>