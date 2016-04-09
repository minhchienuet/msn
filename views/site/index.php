
<!--<script>-->
<!--            var map;-->
<!--            require(["esri/map", "dojo/domReady!"], function(Map) {-->
<!--                map = new Map("map", {-->
<!--                    basemap: "topo",  //For full list of pre-defined basemaps, navigate to http://arcg.is/1JVo6Wd-->
<!--                    center: [-122.45, 37.75], // longitude, latitude-->
<!--                    zoom: 13-->
<!--                });-->
<!--            });-->
<!--</script>-->
<!---->
<!--<div id="map">-->
<!--    <div id="searchBox">-->
<!--        <form class="navbar-form navbar-left" role="search">-->
<!--            <div class="form-group">-->
<!--                <input type="text" class="form-control" placeholder="Search">-->
<!--            </div>-->
<!--            <button type="submit" class="btn btn-default">-->
<!--                <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->


<!DOCTYPE html>
<html>
<head>
    <!--    <title>H? Th?ng WSN</title>-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../js/leaflet/leaflet.css" />
    <link rel="stylesheet" href="../js/bootstrap/css/bootstrap.min.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body onload="startTime()">
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <h2 class="text-center">H? TH?NG WSN</h2>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <div class="col-md-4">-->
<!--            <div class="row">-->
<!--                <h2>T�m Ki?m</h2>-->
<!--                <div class="form-horizontal" role="form">-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-sm-5" for="wsn-name">V? tr�:</label>-->
<!--                        <div class="col-sm-6">-->
<!--                            <input type="text" class="form-control" id="wsn-name" placeholder="Nh?p v�o t�n ??a ?i?m">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <div class="col-sm-11 text-center">-->
<!--                            <button id="btn-sr" class="btn btn-default">T�m</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row" id="sr"></div>-->
<!--        </div>-->
<div class="col-md-8" id="map"></div>
<!--    </div>-->
<!--</div>-->

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/leaflet/leaflet.js"></script>
<script>
    function startTime(){
        var map = L.map('map').setView([21.04056,105.78483], 10);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiaHV5aG9hbmdidDIiLCJhIjoiY2lsb3puc2kxMDhvOXU5bTF3YzNzbDNydCJ9.meN01vk94NEjbSdhgZ6XhA', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery � <a href="http://mapbox.com">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(map);

        var mywms = L.tileLayer.wms("http://localhost:8082/geoserver/hanoi/wms", {
            layers: 'wsn:hanoi',
            format: 'image/png',
            transparent: true,
            version: '1.1.0',
            attribution: "myattribution"
        });
        mywms.addTo(map);

        $.getJSON("php/wsn.php", function( data ) {
            var items = [];
            $.each(data, function(index, value) {
                var x = Math.floor((Math.random() * 5) + 1);
                if(x==1){
                    var hospitalIcon = L.icon({
                        iconUrl: 'img/1.jpg',
                        iconSize:     [21, 21],
                        iconAnchor:   [16, 31],
                        popupAnchor:  [0, -28]
                    });
                }
                if(x==2){
                    var hospitalIcon = L.icon({
                        iconUrl: 'img/2.png',
                        iconSize:     [21, 21],
                        iconAnchor:   [16, 31],
                        popupAnchor:  [0, -28]
                    });
                }
                if(x==3){
                    var hospitalIcon = L.icon({
                        iconUrl: 'img/3.png',
                        iconSize:     [21, 21],
                        iconAnchor:   [16, 31],
                        popupAnchor:  [0, -28]
                    });
                }
                if(x==4){
                    var hospitalIcon = L.icon({
                        iconUrl: 'img/4.jpg',
                        iconSize:     [21, 21],
                        iconAnchor:   [16, 31],
                        popupAnchor:  [0, -28]
                    });
                }
                if(x==5){
                    var hospitalIcon = L.icon({
                        iconUrl: 'img/5.png',
                        iconSize:     [21, 21],
                        iconAnchor:   [16, 31],
                        popupAnchor:  [0, -28]
                    });
                }


                L.marker([data[index].lat, data[index].long], {icon: hospitalIcon}).addTo(map).bindPopup(data[index].diem_dat);
            });
        });
//      document.getElementById("demo").innerHTML = map;
//    setTimeout(function(){ startTime() }, 5000);
    }


    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery � <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);

    //    var mywms = L.tileLayer.wms("http://localhost:8082/geoserver/wsn/wms", {
    //      layers: 'wsn:vnm_adm1',
    //      format: 'image/png',
    //      transparent: true,
    //      version: '1.1.0',
    //      attribution: "myattribution"
    //    });
    //    mywms.addTo(map);

    $.getJSON("php/wsn.php", function( data ) {
        var items = [];
        $.each(data, function(index, value) {
            var x = Math.floor((Math.random() * 5) + 1);
            if(x==1){
                var hospitalIcon = L.icon({
                    iconUrl: 'img/1.jpg',
                    iconSize:     [21, 21],
                    iconAnchor:   [16, 31],
                    popupAnchor:  [0, -28]
                });
            }
            if(x==2){
                var hospitalIcon = L.icon({
                    iconUrl: 'img/2.png',
                    iconSize:     [21, 21],
                    iconAnchor:   [16, 31],
                    popupAnchor:  [0, -28]
                });
            }
            if(x==3){
                var hospitalIcon = L.icon({
                    iconUrl: 'img/3.png',
                    iconSize:     [21, 21],
                    iconAnchor:   [16, 31],
                    popupAnchor:  [0, -28]
                });
            }
            if(x==4){
                var hospitalIcon = L.icon({
                    iconUrl: 'img/4.jpg',
                    iconSize:     [21, 21],
                    iconAnchor:   [16, 31],
                    popupAnchor:  [0, -28]
                });
            }
            if(x==5){
                var hospitalIcon = L.icon({
                    iconUrl: 'img/5.png',
                    iconSize:     [21, 21],
                    iconAnchor:   [16, 31],
                    popupAnchor:  [0, -28]
                });
            }


            L.marker([data[index].lat, data[index].long], {icon: hospitalIcon}).addTo(map).bindPopup(data[index].diem_dat).openPopup();
        });
    });

    $("#btn-sr").click(function(e){
        $.getJSON("php/sr-wsn.php?wsn-name=" + $("#wsn-name").val(), function( data ) {
            var items = [];
            $.each(data, function(index, value) {
                items.push( "<li id='" + index + "'><a href='#' onclick='zoomToHospital(" + data[index].lat + "," + data[index].long + ")'>" + data[index].diem_dat + "</a></li>" );
                L.marker([data[index].lat, data[index].long]).bindPopup(data[index].diem_dat);
            });
            $( "<ul/>", {
                "class": "my-new-list",
                html: items.join( "" )
            }).appendTo( "#sr" );
        });
    });

    var zoomToHospital = function(lat, lon){
        map.setView([lat, lon], 15);
    }
    setInterval(function(){ startTime() }, 5000);
</script>
</body>
</html>
