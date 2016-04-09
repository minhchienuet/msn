<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AqiQt */

$this->title = 'Create new level';
$this->params['breadcrumbs'][] = ['label' => 'Aqi-qt', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aqi-qt-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
