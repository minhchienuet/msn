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
                        <?php
                            foreach($aqi_vn as $aqi){
                                echo '<option value="'.$aqi->level.'">';
                                echo $aqi->level;
                                echo "</option>";
                            }
                        ?>
                     </select>
                </div>
            </div>
            <div id="levels_tcqt" hidden="hidden">
                <label for='api' class='col-sm-offset-2 col-sm-3 control-label'>Chọn mức độ ô nhiễm</label>
                <div class='col-md-3'>
                    <select class='form-control'>
                        <?php foreach($aqi_qt as $aqi): ?>
                            <option value="$aqi->level"> <?php echo $aqi->level; ?></option>
                        <?php endforeach; ?>
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
                    <?php foreach($aqi_vn as $aqi){
                        echo "<td class='col-sm-1' ";
                        echo "style='background-color: ".$aqi->color." '>";
                        echo  $aqi->level.". ".$aqi->name ;
                        echo "</td>";
                    }?>
                </tr>
                <tr class="text-center"  style="color: #ffffff">
                    <?php foreach($aqi_vn as $aqi){
                        echo "<td style='background-color: ".$aqi->color." '>";
                        echo  $aqi->start_value." - ".$aqi->end_value ;
                        echo "</td>";
                    }?>
                </tr>
            </table>
        </div>
    </div>
    <div id="chart_tcqt" hidden="hidden">
        <div class="col-md-offset-2 col-md-10">
            <table class="table table-bordered">
                <tr class="text-center"  style="color: #ffffff">
                    <?php foreach($aqi_qt as $aqi){
                        echo "<td class='col-sm-1' ";
                        echo "style='background-color: ".$aqi->color." '>";
                        echo  $aqi->level.". ".$aqi->name ;
                        echo "</td>";
                    }?>
                </tr>
                <tr class="text-center"  style="color: #ffffff">
                    <?php foreach($aqi_qt as $aqi){
                        echo "<td style='background-color: ".$aqi->color." '>";
                        echo  $aqi->start_value." - ".$aqi->end_value ;
                        echo "</td>";
                    }?>
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