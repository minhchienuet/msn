<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AqiVnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiêu chuẩn AQI Việt Nam';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aqi-vn-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('Create new level', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'level',
            'name',
            'start_value',
            'end_value',
            'color',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
