<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 4:01 PM
 */
use yii\helpers\Html;

$this->title = 'Đăng ký nhận cảnh báo';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
<form class="form-horizontal">
    <div class="form-group row">
        <label for="province" class="col-sm-offset-1 col-sm-3 control-label">Tỉnh</label>
        <div class="col-md-4">
            <select class="form-control" id="province">
                <option value="">--Select--</option>
                <?php foreach($addresses as $address): ?>
                    <option value=" <?php echo $address->province; ?> "> <?php echo $address->province; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="ward"  class="col-sm-offset-1 col-sm-3 control-label">Quận/Huyện</label>
        <div class="col-md-4">
            <select class="form-control" id="district">
                <option value="">--Select--</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="ward"  class="col-sm-offset-1 col-sm-3 control-label">Xã/Phường</label>
        <div class="col-md-4">
            <select class="form-control" id="ward">
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
                <label for='api' class='col-sm-offset-1 col-sm-3 control-label'>Mức độ nhận cảnh báo</label>
                <div class='col-md-4'>
                    <select class='form-control'>
                        <?php foreach($aqi_vn as $aqi): ?>
                            <option value="$aqi->level"> <?php echo $aqi->level; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div id="levels_tcqt" hidden="hidden">
                <label for='api' class='col-sm-offset-1 col-sm-3 control-label'>Mức độ nhận cảnh báo</label>
                <div class='col-md-4'>
                    <select class='form-control'>
                        <?php foreach($aqi_qt as $aqi): ?>
                            <option value="$aqi->level"> <?php echo $aqi->level; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
    </div>

    <div class="form-group row">
        <label for="time" class="col-sm-offset-1 col-sm-3 control-label">Thời gian nhận cảnh báo</label>
        <div class="col-md-4">
            <label class="radio-inline">
                <input type="radio" name="time" id="byDay" value="byDay">Theo ngày
            </label>
            <label class="radio-inline">
                <input type="radio" name="time" id="byHour" value="byHour">Theo giờ
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label for="time" class="col-sm-offset-1 col-sm-3 control-label">Email nhận cảnh báo</label>
        <div class="col-md-4">
            <input type="email" class="form-control" id="email" placeholder="email@example.com">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-2">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModalWarning"> Đăng ký </button>
            <a href="http://localhost/workspace/msn/web/index.php" class="btn btn-danger" role="button"> Hủy bỏ </a>
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
<div class="modal fade" id="myModalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalWarningLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalWarningLabel">Congratulation!</h4>
            </div>
                <div class="modal-body text-info">
                    Bạn đã đăng ký nhận cảnh báo thành công!
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<script src="/js/select_area.js"></script>
<script src="/js/select_aqi_tc.js"></script>
