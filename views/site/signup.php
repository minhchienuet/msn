<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng ký';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-4 col-sm-8">
<div class="site-signup">
    <div class="row">
       <div class="col-lg-5">
           <?php $form = ActiveForm::begin(['id' =>'form-signup']); ?>
                <?= $form->field($model,'email') ?>
                <?= $form->field($model,'password')->passwordInput() ?>
                <div class="form-group">
                    <?= \yii\bootstrap\Html::submitButton('Signup',['class' => 'btn btn-primary', 'name' => 'signup=button']) ?>
                </div>
            <?php ActiveForm::end() ?>
       </div>
    </div>
</div>
</div>