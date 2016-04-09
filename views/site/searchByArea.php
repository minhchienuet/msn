<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 5:35 PM
 */
use yii\helpers\Html;
$this->title = 'Tìm kiếm theo khu vực';
?>
<h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
<div id="search_form">
    <form class="form-horizontal" method="post">
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
            <div class="col-sm-offset-5 col-sm-4">
                <button type="button" id="search" class="btn btn-primary">Tìm </button>
                <a href="http://localhost/workspace/msn/web/index.php" class="btn btn-danger" role="button">Hủy bỏ</a>
            </div>
        </div>
    </form>
</div>
<div id="result" hidden="hidden">
    <label for="timeUnit" class="col-sm-offset-3 col-sm-3 control-label">Kết quả tìm kiếm : </label>
    <br><br><br><br><br><br>
    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-4">
            <button type="button" id="export_file" class="btn btn-primary">Xuất File </button>
            <button type="button" id="statistic" class="btn btn-primary">Thống kê </button>
            <a href="http://localhost/workspace/msn/web/index.php?r=site%2Farea" class="btn btn-danger" role="button">Quay lại</a>
        </div>
    </div>
</div>

<script>
    $('#search').on('click', function () {
        var content = $("#result").html();
        $("#search_form").replaceWith(content);
    });
    $('#province').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var province = this.value;
        $.ajax({
            url:"<?php echo Yii::$app->request->baseUrl. '/site/districts'?>",
            type: "GET",
            contentType: "JSON",
            data: {province: province},
            success:function(response) {
                $('#district').html(response);
            },
            error: function(){
                console.log("Error");
            }
        });
    });
    $('#district').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var district = this.value;
        $.ajax({
            url:"<?php echo Yii::$app->request->baseUrl. '/site/wards'?>",
            type: "GET",
            contentType: "JSON",
            data: {district: district},
            success:function(response) {
                $('#ward').html(response);
            },
            error: function(){
                console.log("Error");
            }
        });
    });
</script>