<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WarningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warnings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warning-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('Register Warning', ['register'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'node_id',
            'standard',
            'level',
            'time_interval',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
