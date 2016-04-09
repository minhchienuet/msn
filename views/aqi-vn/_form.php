<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AqiVn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aqi-vn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_value')->textInput() ?>

    <?= $form->field($model, 'end_value')->textInput() ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
