<!---->
<!--<script src="../js/raphael-min.js"></script>-->
<!--<script src="../js/jquery-1.12.0.min.js"></script>-->
<!--<script src="../js/morris.min.js"></script>-->

<link href="https://www.amcharts.com/lib/3/plugins/export/export.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.js"></script>
<style>
    #chartdiv {
    width		: 100%;
    height		: 500px;
    font-size	: 11px;
    }

    .amcharts-export-menu-top-right {
    top: 10px;
    right: 0;
    }
</style>
<title>morris.js Bar Chart Example</title>
<div class="container-fluid">
    <label class="col-sm-offset-3 col-sm-3 control-label">Kết quả thống kê : </label>

    <div id="chartdiv"></div>
    <script type="text/javascript">
        var chart;

        var chartData = [ {
            "country": "USA",
            "visits": 5025,
            "sensor1": 1200,
            "sensor2": 100,
            "sensor3": 2200,
            "sensor4": 500
//            "color": "#FF0F00"
        }, {
            "country": "China",
            "visits": 1882,
            "color": "#FF6600"
        }, {
            "country": "Japan",
            "visits": 1809,
            "color": "#FF9E01"
        }, {
            "country": "Germany",
            "visits": 1322,
            "color": "#FCD202"
        }, {
            "country": "UK",
            "visits": 1122,
            "color": "#F8FF01"
        }, {
            "country": "France",
            "visits": 1114,
            "color": "#B0DE09"
        }, {
            "country": "India",
            "visits": 984,
            "color": "#04D215"
        }, {
            "country": "Spain",
            "visits": 711,
            "color": "#0D8ECF"
        }, {
            "country": "Netherlands",
            "visits": 665,
            "color": "#0D52D1"
        }];


        var chart = AmCharts.makeChart( "chartdiv", {
            "theme": "light",
            type: "serial",
            dataProvider: chartData,
            categoryField: "country",
            depth3D: 10,
            angle: 20,

            categoryAxis: {
                labelRotation: 90,
                gridPosition: "start"
            },

            valueAxes: [ {
                title: "Visitors"
            } ],

            graphs: [ {
                "balloonText": "Visistor:[[value]]",
                valueField: "visits",
                colorField: "color",
                type: "column",
                lineAlpha: 0.1,
                fillAlphas: 1
            },
            {
                "balloonText": "sensor1:[[value]]",
                valueField: "sensor1",
                colorField: "color",
                type: "column",
                lineAlpha: 0.1,
                fillAlphas: 1
            },
            {
                "balloonText": "sensor2:[[value]]",
                valueField: "sensor2",
                colorField: "color",
                type: "column",
                lineAlpha: 0.1,
                fillAlphas: 1
            },
            {
                "balloonText": "sensor3:[[value]]",
                valueField: "sensor3",
                colorField: "color",
                type: "column",
                lineAlpha: 0.1,
                fillAlphas: 1
            },
            {
                "balloonText": "sensor4:[[value]]",
                valueField: "sensor4",
                colorField: "color",
                type: "column",
                lineAlpha: 0.1,
                fillAlphas: 1
            }],

            chartCursor: {
                cursorAlpha: 0,
                zoomable: false,
                categoryBalloonEnabled: false
            },
            export: {
                enabled: true
            }
        } );
    </script>
    <br>
    <div class="form-group row">
        <div class="text-center">
            <a href="/site/report" class="btn btn-danger" role="button"> Quay lại </a>
        </div>
    </div>
</div>


