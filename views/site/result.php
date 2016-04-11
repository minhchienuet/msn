
<script src="../js/raphael-min.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/morris.min.js"></script>
<meta charset=utf-8 />
<title>morris.js Bar Chart Example</title>
<div class="container-fluid">
    <label class="col-sm-offset-3 col-sm-3 control-label">Kết quả thống kê : </label>

    <div id="bar-example" class="col-sm-offset-4 col-sm-4"  style="height: 250px; width: 500px;"></div>
    <script>
        new Morris.Bar({
            element: 'bar-example',
            data: [
                { y: '2006', a: 100, b: 90 },
                { y: ' a: 75,  b: 65 },
                2007', a: 75,  b: 65 },
                { y: '2008', a: 50,  b: 40 },
                { y: '2009', a: 75,  b: 65 },
                { y: '2010', a: 50,  b: 40 },
                { y: '2011', { y: '2012', a: 100, b: 90 }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B']
        });
    </script>
</div>
<br><br><br><br><br><br>
<div class="form-group row">
    <div class="col-sm-offset-5 col-sm-5">
        <button type="button" id="export_file" class="btn btn-primary">Xuất File </button>
        <a href="http://localhost/yii_02/web/site/report" class="btn btn-danger" role="button"> Hủy bỏ </a>
    </div>
</div>

