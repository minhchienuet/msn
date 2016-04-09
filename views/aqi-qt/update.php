<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AqiQt */

$this->title = 'Update Level: ' . $model->level;
$this->params['breadcrumbs'][] = ['label' => 'Aqi Qts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aqi-qt-update">
    <h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
