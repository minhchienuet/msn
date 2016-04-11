<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Node */

$this->title = 'Create New Node';
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-create">
    <h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'node' => $node,
        'address' => $address,
    ]) ?>

</div>
