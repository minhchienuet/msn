<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Node */

$this->title = 'Update Node: ' . $node->name;
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $node->name, 'url' => ['view', 'id' => $node->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="node-update">
    <h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'node' => $node,
        'address' => $address,
    ]) ?>

</div>
