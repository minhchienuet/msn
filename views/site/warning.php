<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 4:01 PM
 */
$this->title = 'Đăng ký nhận cảnh báo';
$this->params['breadcrumbs'][] = $this->title;
?>

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
                        <option value='1'> >= 1</option>
                        <option value='2'> >= 2</option>
                        <option value='3' selected> >= 3</option>
                        <option value='4'> >= 4</option>
                        <option value='5'> =5</option>
                    </select>
                </div>
            </div>

            <div id="levels_tcqt" hidden="hidden">
                <label for='api' class='col-sm-offset-1 col-sm-3 control-label'>Mức độ nhận cảnh báo</label>
                <div class='col-md-4'>
                    <select class='form-control'>
                        <option value='1'> >= 1</option>
                        <option value='2'> >= 2</option>
                        <option value='3'> >= 3</option>
                        <option value='4'> >= 4</option>
                        <option value='5' selected> >= 5</option>
                        <option value='6'> >= 6</option>
                        <option value='7'> >= 7</option>
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
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal"> Đăng ký </button>
            <a href="http://localhost/workspace/msn/web/index.php" class="btn btn-danger" role="button"> Hủy bỏ </a>
        </div>
    </div>
</form>
<br/><br>
<div id="chart_tcvn" hidden="hidden">
    <div class="col-md-offset-3 col-md-6">
        <table class="table table-bordered">
            <tr class="text-center" style="color: #ffffff">
                <td class="col-sm-1" style="background-color: #0566cd"> 1.Tốt </td>
                <td class="col-sm-1" style="background-color: #b9c625" > 2.Trung bình </td>
                <td class="col-sm-1" style="background-color: #ba6e27"> 3.Kém </td>
                <td class="col-sm-1" style="background-color: #ba1627"> 4.Xấu </td>
                <td class="col-sm-1" style="background-color: #4e3826"> 5.Nguy hại </td>
            </tr>
            <tr class="text-center"  style="color: #ffffff">
                <td style="background-color: #0566cd"> 0-50 </td>
                <td style="background-color: #b9c625"> 51-100 </td>
                <td style="background-color: #ba6e27"> 101-200</td>
                <td style="background-color: #ba1627"> 201-300 </td>
                <td style="background-color: #4e3826"> 301-500 </td>
            </tr>
        </table>
    </div>
</div>
<div id="chart_tcqt" hidden="hidden">
    <div class="col-md-offset-1 col-md-10">
        <table class="table table-bordered">
            <tr class="text-center"  style="color: #ffffff">
                <td class="col-lg-1" style="background-color: #03a815"> 1.Tốt </td>
                <td class="col-lg-1" style="background-color: #b7c423" > 2.Bình thường </td>
                <td class="col-lg-1" style="background-color: #b96d2a"> 3.Có hại </td>
                <td class="col-lg-1" style="background-color: #b91526"> 4.Nguy hại </td>
                <td class="col-lg-1" style="background-color: #71155b"> 5.Rất nguy hại </td>
                <td class="col-lg-1" style="background-color: #620c19"> 6.Nguy hiểm </td>
                <td class="col-lg-1" style="background-color: #913a19"> 7.Rất nguy hiểm </td>

            </tr>
            <tr class="text-center"  style="color: #ffffff">
                <td style="background-color: #03a815"> 0-50 </td>
                <td style="background-color: #b7c423"> 51-100 </td>
                <td style="background-color:  #b96d2a"> 101-150</td>
                <td style="background-color: #b91526"> 151-200 </td>
                <td style="background-color: #71155b"> 201-300 </td>
                <td style="background-color: #620c19"> 301-400 </td>
                <td style="background-color: #913a19"> 401-500 </td>
            </tr>
        </table>
    </div>
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

<script>
    $('#tcvn').on('click', function () {
        $("#levels_tcvn").show();
        $("#chart_tcvn").show();
        $("#levels_tcqt").hide();
        $("#chart_tcqt").hide();
    });
    $('#tcqt').on('click', function () {
        $("#levels_tcqt").show();
        $("#chart_tcqt").show();
        $("#levels_tcvn").hide();
        $("#chart_tcvn").hide();
    });
</script>
