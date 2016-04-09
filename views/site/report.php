<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ReportForm */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Báo cáo/Thống kê';
?>
<h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
<div id="report_form">
<form class="form-horizontal" method="post">
    <div class="form-group row">
        <p class="col-sm-offset-4 col-sm-5 text-info">Chọn các điều kiện để thống kê: </p>
    </div>
    <div class="form-group row">
        <label for="province" class="col-sm-offset-1 col-sm-3 control-label">Tỉnh</label>
        <div class="col-md-4">
            <select class="form-control">
                <option>Hà Nội</option>
                <option>Hà Nam</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="province" class="col-sm-offset-1 col-sm-3 control-label">Quận/Huyện</label>
        <div class="col-md-4">
            <select class="form-control">
                <option>Cầu Giấy</option>
                <option>Nam Từ Liêm</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="ward"  class="col-sm-offset-1 col-sm-3 control-label">Xã/Phường</label>
        <div class="col-md-4">
            <select class="form-control">
                <option>Dịch Vọng</option>
                <option>Mai Dịch</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="startDate" class="col-sm-offset-1 col-sm-3 control-label">Từ ngày</label>
        <div class="col-md-4">
            <input type="date" class="form-control" name="startDate">
        </div>
    </div>

    <div class="form-group row">
        <label for="endDate" class="col-sm-offset-1 col-sm-3 control-label">Đến ngày</label>
        <div class="col-md-4">
            <input type="date" class="form-control" name="endDate">
        </div>
    </div>

    <div class="form-group row">
        <label for="timeUnit" class="col-sm-offset-1 col-sm-3 control-label">Đơn vị đo thời gian</label>
        <div class="col-md-4">
            <label class="radio-inline">
                <input type="radio" name="timeUnit" id="timeUnit" value="byDay"> Theo Ngày
            </label>
            <label class="radio-inline">
                <input type="radio" name="timeUnit" id="timeUnit" value="byHour"> Theo Giờ
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label for="index" class="col-sm-offset-1 col-sm-3 control-label">Thông số</label>
        <div class="col-md-4">
            <select multiple class="form-control">
                <option>Bụi PM 2.5</option>
                <option>Nhiệt độ</option>
                <option>Độ ẩm</option>
                <option>SO2</option>
                <option>CO</option>
                <option>NO</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="Data Type" class="col-sm-offset-1 col-sm-3 control-label">Dạng số liệu</label>
        <div class="col-md-4">
            <label class="radio-inline">
                <input type="radio" name="dataType" id="chart" value="chart"> Dạng biểu đồ
            </label>
            <label class="radio-inline">
                <input type="radio" name="dataType" id="table" value="table"> Dạng bảng
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-4">
<!--            <button type="button" id="report" class="btn btn-primary "> OK </button>-->
            <a href="http://msn.local.com/site/result" class="btn btn-primary"> OK </a>
            <a href="http://localhost/workspace/msn/web/index.php" class="btn btn-danger" role="button">Hủy bỏ</a>
        </div>
    </div>
</form>
</div>
<div id="result" hidden="hidden">
    <label for="timeUnit" class="col-sm-offset-3 col-sm-3 control-label">Kết quả thống kê : </label>
    <br><br><br><br><br><br>
    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-4">
            <button type="button" id="export_file" class="btn btn-primary">Xuất File </button>
            <a href="http://localhost/workspace/msn/web/index.php?r=site%2Freport" class="btn btn-danger" role="button"> Hủy bỏ </a>
        </div>
    </div>
</div>

<script>
$('#report').on('click', function () {
        var content = $("#result").html();
        $("#report_form").replaceWith(content);
    });
</script>