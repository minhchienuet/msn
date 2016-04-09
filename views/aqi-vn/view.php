<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AqiVn */

$this->title = 'Level: '.$model->level;
$this->params['breadcrumbs'][] = ['label' => 'Aqi Vns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aqi-vn-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level',
            'name',
            'start_value',
            'end_value',
            'color',
            'description',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
