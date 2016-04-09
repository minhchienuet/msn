<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AqiVn */

$this->title = 'Create new level';
$this->params['breadcrumbs'][] = ['label' => 'Aqi-Vn', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aqi-vn-create">
    <h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
