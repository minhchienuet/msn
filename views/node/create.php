<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Node */

$this->title = 'Create New Node';
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
