<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Warning */

$this->title = "Warning ID: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Warnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warning-view">

    <h1 class="text-danger text-center"><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'node_id',
            'standard',
            'level',
            'time_interval',
            'email:email',
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
    </p>
</div>
