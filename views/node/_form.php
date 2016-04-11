<?php

use yii\helpers\Html;
use app\models\Address;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Node */
/* @var $form yii\widgets\ActiveForm */

//$addresses = ArrayHelper::map(Address::find()->all(),'id','ward','district');

?>

<div class="node-form col-md-5 col-md-offset-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($address, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'ward')->textInput(['maxlength' => true]) ?>

    <?= $form->field($node, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($node, 'description')->textArea(['rows' => '6']) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($node->isNewRecord ? 'Create' : 'Update', ['class' => $node->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
