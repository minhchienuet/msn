<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

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
    <link rel="stylesheet" href="/js/leaflet/leaflet.css"/>
    <link rel="stylesheet" href="/js/bootstrap/css/bootstrap.min.css"/>
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
            'class' => 'navbar-default navbar-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Liên hệ', 'url' => ['/site/contact']],
            [
                'label' => 'Tìm kiếm nâng cao',
                'items' => [
                    ['label' => 'Tìm kiếm theo khu vực', 'url' => ['/site/area']],
                    ['label' => 'Tìm kiếm theo mức độ ô nhiễm', 'url' => ['/site/aqi']],
                    [
                        'label' => 'Tìm kiếm theo thời gian thực',
                        'options' =>[
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'left',
                            'title' =>'Trả về kết quả gần đây nhất',
                        ],
                        'url' => ['/site/time'],
                    ],
                 ],
            ],
            ['label' => 'Đăng ký cảnh báo', 'url' => ['/warning/register']],
        ],
        ]);
?>
<?php
    if (\Yii::$app->user->can('reportView')) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' =>[
                ['label' => 'Báo cáo/thống kê', 'url' => ['/site/report']],
            ]
        ]);
    }
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
                            ['label' => 'Danh sách cảnh báo', 'url' => ['/warning/list']],
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!--<script src="/js/search_index.js"></script>-->
<?php $this->endPage() ?>
