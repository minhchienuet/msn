<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 3/10/16
 * Time: 3:59 PM
 */
use yii\helpers\Html;
$this->title = 'Tìm kiếm theo mức độ ô nhiễm';
?>
<div id="search_form">
    <form class="form-horizontal" method="post">
        <div class="form-group row">
            <label for="timeUnit" class="col-sm-offset-2 col-sm-3 control-label">Chọn tiêu chuẩn đo</label>
            <div class="col-md-6">
                <label class="radio-inline">
                    <input type="radio" name="timeUnit" id="tcvn" value="tcvn"> TCVN
                </label>
                <label class="radio-inline">
                    <input type="radio" name="timeUnit" id="tcqt" value="tcqt"> TCQT
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div id="levels_tcvn" hidden="hidden">
                <label for='api' class='col-sm-offset-2 col-sm-3 control-label'>Chọn mức độ ô nhiễm</label>
                <div class='col-md-3'>
                    <select class='form-control'>
                        <option value='1'>1</option>
                         <option value='2'>2</option>
                         <option value='3'>3</option>
                         <option value='4'>4</option>
                         <option value='5'selected>5</option>
                     </select>
                </div>
            </div>
            <div id="levels_tcqt" hidden="hidden">
                <label for='api' class='col-sm-offset-2 col-sm-3 control-label'>Chọn mức độ ô nhiễm</label>
                <div class='col-md-3'>
                    <select class='form-control'>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7' selected>7</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-offset-5 col-sm-4">
                <button type="button" id="search" class="btn btn-primary ">Tìm </button>
                <a href="http://localhost/workspace/msn/web/index.php" class="btn btn-danger" role="button">Hủy bỏ</a>
            </div>
        </div>
    </form>
    <br/><br><br>
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
        <div class="col-md-offset-2 col-md-10">
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
    </div>
</div>
<div id="result" hidden="hidden">
    <label for="timeUnit" class="col-sm-offset-3 col-sm-3 control-label">Kết quả tìm kiếm : </label>
    <br><br><br><br><br><br>
    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-4">
            <a href="http://localhost/workspace/msn/web/index.php?r=site%2Faqi">Quay lại</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#tcvn').on('click', function () {
        $('#levels_tcvn').show();
        $('#chart_tcvn').show();
        $('#levels_tcqt').hide();
        $('#chart_tcqt').hide();
    });
    $('#tcqt').on('click', function () {
        $('#levels_tcqt').show();
        $('#chart_tcqt').show();
        $('#levels_tcvn').hide();
        $('#chart_tcvn').hide()
    });
    $('#search').on('click', function () {
        var content = $("#result").html();
        $("#search_form").replaceWith(content);
    });
});
</script>