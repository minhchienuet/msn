<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Node */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-view">
    <h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute'=>'address_id',
                'label'=>'Address ID',
                'value'=>$address->id,
            ],
            [
                'attribute'=>'province',
                'label'=>'Province',
                'value'=>$address->province,
            ],
            [
                'attribute'=>'district',
                'label'=>'District',
                'value'=>$address->district,
            ],
            [
                'attribute'=>'ward',
                'label'=>'Ward',
                'value'=>$address->ward,
            ],
            'description',
        ],
    ]) ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
