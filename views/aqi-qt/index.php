<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AqiQtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiêu chuẩn AQI Quốc tế';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aqi-qt-index">
    <h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
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
