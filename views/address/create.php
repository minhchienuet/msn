<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'Create New Address';
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create col-md-5 col-md-offset-4">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
