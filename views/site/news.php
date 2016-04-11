<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 4:01 PM
 */
use yii\helpers\Html;
$this->title = 'Đăng ký nhận bản tin';
?>
<h3 class="text-danger text-center"> <?= Html::encode($this->title) ?></h3>
<form class="form-horizontal" method="post">
    <div class="form-group row">
        <p class="col-sm-offset-4 col-sm-5 text-info">Chọn khu vực nhận bản tin: </p>
    </div>
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
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModalNews"> Đăng ký </button>
            <a href="/" class="btn btn-danger" role="button"> Hủy bỏ </a>
        </div>
    </div>
</form>

<div class="modal fade" id="myModalNews" tabindex="-1" role="dialog" aria-labelledby="myModalNewsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalNewsLabel">Congratulation!</h4>
            </div>
            <div class="modal-body text-info">
                Bạn đã đăng ký nhận tin tức thành công!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<script src="/js/select_area.js"></script>