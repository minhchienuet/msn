<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AqiVn */

$this->title = 'Update level: ' . $model->level;
$this->params['breadcrumbs'][] = ['label' => 'Aqi Vns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aqi-vn-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
