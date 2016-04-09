<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

    NavBar::begin([
        'options' => [
        'class' => 'navbar-inverse  navbar-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Users', 'url' => ['/user/admin']],
            ['label' => 'RBAC', 'url' => ['/user/rbac']],
            [
                'label' => 'AQI',
                'items' => [
                    ['label' => 'AQI Việt Nam', 'url' => ['/aqi-vn']],
                    ['label' => 'AQI Quốc tế', 'url' => ['/aqi-qt']],

                ],
            ],
            ['label' => 'Node', 'url' => ['/node']],
            ['label' => 'Báo cáo/Thống kê', 'url' => ['/site/report']],
            ['label' => 'Cảnh báo', 'url' => ['/site/warning']],
            ['label' => 'Bản tin', 'url' => ['/site/news']],
        ],

    ]);
    NavBar::end();
?>