<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 3:59 PM
 */
use yii\helpers\Html;
$this->title = 'Tìm kiếm theo thời gian thực';
?>
<div id="search_form">
    <form class="form-horizontal" method="post">
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
            <div class="col-sm-offset-5 col-sm-4">
                <button type="button" id="search" class="btn btn-primary ">Tìm </button>
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
            <a href="http://localhost/workspace/msn/web/index.php?r=site%2Ftime">Quay lại</a>
        </div>
    </div>
</div>

<script>
    $('#search').on('click', function () {
        var content = $("#result").html();
        $("#search_form").replaceWith(content);
    });
</script>