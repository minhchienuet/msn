<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'Update Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
