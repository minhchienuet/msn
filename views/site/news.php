<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 4:01 PM
 */
$this->title = 'Đăng ký nhận bản tin';
?>
<form class="form-horizontal" method="post">
    <div class="form-group row">
        <p class="col-sm-offset-4 col-sm-5 text-info">Chọn khu vực nhận bản tin: </p>
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
        <label for="time" class="col-sm-offset-1 col-sm-3 control-label">Thời gian nhận bản tin</label>
        <div class="col-md-4">
            <label class="radio-inline">
                <input type="radio" name="time" id="tcvn" value="everyDay">Hàng ngày
            </label>
            <label class="radio-inline">
                <input type="radio" name="time" id="tcqt" value="everyHour">Hàng giờ
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="time" class="col-sm-offset-1 col-sm-3 control-label">Email nhận bản tin</label>
        <div class="col-md-4">
            <input type="email" class="form-control" id="email" placeholder="email@example.com">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-4">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal"> Đăng ký </button>
            <a href="http://localhost/workspace/msn/web/index.php" class="btn btn-danger" role="button"> Hủy bỏ </a>
        </div>
    </div>
</form>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Congratulation!</h4>
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