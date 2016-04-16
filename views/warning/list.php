<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh sách cảnh báo đã đăng ký';
?>
<div class="warning-list">

    <h4 class="text-danger text-center"><?= Html::encode($this->title) ?></h4>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'node_id',
            'standard',
            'level',
            'time_interval',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>