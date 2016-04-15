<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Warning */

$this->title = 'Đăng ký nhận cảnh báo';
$this->params['breadcrumbs'][] = ['label' => 'Warnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
<form class="form-horizontal" method="post">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <input type="hidden" name="user_id" value="<?=Yii::$app->user->identity->id?>" />
    <div class="form-group row">
        <label for="province" class="col-sm-offset-1 col-sm-3 control-label">Tỉnh</label>
        <div class="col-md-4">
            <select class="form-control" name='province' id="province">
                <option value="">--Select--</option>
                <?php foreach($addresses as $address): ?>
                    <option value="<?php echo $address->province; ?>"><?php echo $address->province; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="district"  class="col-sm-offset-1 col-sm-3 control-label">Quận/Huyện</label>
        <div class="col-md-4">
            <select class="form-control" name='district' id="district">
                <option value="">--Select--</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="ward"  class="col-sm-offset-1 col-sm-3 control-label">Xã/Phường</label>
        <div class="col-md-4">
            <select class="form-control" name="ward" id="ward">
                <option value="">--Select--</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="node"  class="col-sm-offset-1 col-sm-3 control-label">Node</label>
        <div class="col-md-4">
            <select class="form-control" name="node_id" id="node">
                <option value="">--Select--</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="standard" class="col-sm-offset-1 col-sm-3 control-label">Tiêu chuẩn AQI</label>
        <div class="col-md-4">
            <label class="radio-inline">
                <input type="radio" name="standard" id="tcvn" value="TCVN">TC Việt Nam
            </label>
            <label class="radio-inline">
                <input type="radio" name="standard" id="tcqt" value="TCQT">TC Quốc Tế
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div id="levels_tcvn" hidden="hidden">
            <label for='level' class='col-sm-offset-1 col-sm-3 control-label'>Mức độ nhận cảnh báo</label>
            <div class='col-md-4'>
                <select class='form-control' name="level" id="level">
                    <option value="">--Select--</option>
                    <?php foreach($aqi_vn as $aqi): ?>
                        <option value="<?php echo $aqi->level; ?>"><?php echo $aqi->level; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div id="levels_tcqt" hidden="hidden">
            <label for='level' class='col-sm-offset-1 col-sm-3 control-label'>Mức độ nhận cảnh báo</label>
            <div class='col-md-4'>
                <select class='form-control' name="level" id="level">
                    <option value="">--Select--</option>
                    <?php foreach($aqi_qt as $aqi): ?>
                        <option value="<?php echo $aqi->level; ?>"><?php echo $aqi->level; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="time" class="col-sm-offset-1 col-sm-3 control-label">Thời gian nhận cảnh báo</label>
        <div class="col-md-4">
            <label class="radio-inline" data-toggle = 'tooltip' data-placement = "left" title="Email cảnh báo được gửi 7:00 AM hằng ngày">
                <input type="radio" name="time_interval" id="byDay" value="byDay">Theo ngày
            </label>
            <label class="radio-inline" data-toggle = 'tooltip' data-placement = "left" title="Email cảnh báo được gửi 2h một lần hằng ngày">
                <input type="radio" name="time_interval" id="byHour" value="byHour">Theo giờ
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label for="time" class="col-sm-offset-1 col-sm-3 control-label">Email nhận cảnh báo</label>
        <div class="col-md-4">
            <input type="email" class="form-control" name="email" id="email" value="<?php echo Yii::$app->user->identity->email; ?>">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-2">
            <button type="submit" class="btn btn-primary"> Đăng ký </button>
            <a href="/" class="btn btn-danger" role="button"> Hủy bỏ </a>
        </div>
    </div>
</form>
<br/><br>
<div id="chart_tcvn" hidden="hidden">
    <div class="col-md-offset-3 col-md-6">
        <table class="table table-bordered">
            <tr class="text-center" style="color: #ffffff">
                <?php foreach($aqi_vn as $aqi): ?>
                    <td class="col-sm-1" style="background-color: <?php echo $aqi->color ?> ">
                        <?php echo $aqi->level.". ".$aqi->name ?>
                    </td>
                <?php endforeach; ?>
            </tr>
            <tr class="text-center"  style="color: #ffffff">
                <?php foreach($aqi_vn as $aqi): ?>
                    <td style="background-color: <?php echo $aqi->color ?> ">
                        <?php echo $aqi->start_value." - ".$aqi->end_value ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
</div>
<div id="chart_tcqt" hidden="hidden">
    <div class="col-md-offset-1 col-md-10">
        <table class="table table-bordered">
            <tr class="text-center"  style="color: #ffffff">
                <?php foreach($aqi_qt as $aqi): ?>
                    <td class="col-sm-1" style="background-color: <?php echo $aqi->color ?>">
                        <?php echo $aqi->level.". ".$aqi->name ?>
                    </td>
                <?php endforeach; ?>

            </tr>
            <tr class="text-center"  style="color: #ffffff">
                <?php foreach($aqi_qt as $aqi): ?>
                    <td style="background-color: <?php echo $aqi->color ?>">
                        <?php echo $aqi->start_value." - ".$aqi->end_value ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
</div>
<script src="/js/select_area.js"></script>
<script src="/js/select_aqi_tc.js"></script>