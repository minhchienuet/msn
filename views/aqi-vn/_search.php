<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AqiVnSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aqi-vn-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'start_value') ?>

    <?= $form->field($model, 'end_value') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
