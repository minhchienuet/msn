<script>
    $(document).ready(function(){
        startTime();
    });
</script>

<div class="container-fluid" id="map" style=" height: 600px; weight: 100px"></div>

<script src="/js/leaflet/leaflet.js"></script>
<script type="text/javascript" src="/js/smoothie.js"></script>
<script type="text/javascript">
    function createTimeline(canvasEl) {
        var line1 = new TimeSeries();
        var line2 = new TimeSeries();

        // Add a random value to each line every second
        setInterval(function () {
            line1.append(new Date().getTime(), Math.random());
            line2.append(new Date().getTime(), Math.random());
        }, 1000);

        var smoothie = new SmoothieChart(
            {
                grid: {
                    strokeStyle: 'rgb(125, 0, 0)', fillStyle: 'rgb(60, 0, 0)',
                    lineWidth: 1, millisPerLine: 250, verticalSections: 6
                },
                labels: {fillStyle: 'rgb(60, 0, 0)'}
            }
        );
        smoothie.streamTo(canvasEl);
        // Add to SmoothieChart
        smoothie.addTimeSeries(line1,
            {strokeStyle: 'rgb(0, 255, 0)', fillStyle: 'rgba(0, 255, 0, 0.4)', lineWidth: 3}
        );
        smoothie.addTimeSeries(line2,
            {strokeStyle: 'rgb(255, 0, 255)', fillStyle: 'rgba(255, 0, 255, 0.3)', lineWidth: 3}
        );
        smoothie.streamTo(canvasEl, 1000 /*delay*/);
    }
</script>
<script>
    function startTime() {
        var map = L.map('map').setView([21.04056, 105.78483], 9);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiaHV5aG9hbmdidDIiLCJhIjoiY2lsb3puc2kxMDhvOXU5bTF3YzNzbDNydCJ9.meN01vk94NEjbSdhgZ6XhA', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(map);

        var mywms = L.tileLayer.wms("http://localhost:8080/geoserver/wsn/wms", {
            layers: 'wsn:vnm_adm2',
            format: 'image/png',
            transparent: true,
            version: '1.1.0',
            attribution: "myattribution"
        });
        mywms.addTo(map);
        $.getJSON("php/wsn.php", function (data) {
            var items = [];
            $.each(data, function (index, value) {
//            var x = Math.floor((Math.random() * 5) + 1);

                var hospitalIcon = L.icon({
                    iconUrl: 'img/icon.png',
                    iconSize: [26, 26],
                    iconAnchor: [16, 31],
                    popupAnchor: [0, -28],
                    className: "canvas-" + data[index].stt
                });


//            L.marker([data[index].lat, data[index].long], {icon: hospitalIcon}).addTo(map).bindPopup("<b>"+ data[index].diem_dat +"</b> asdfasdfsdfa");
                L.marker([data[index].lat, data[index].long], {
                    id: "canvas-" + data[index].stt,
                    icon: hospitalIcon
                }).addTo(map).bindPopup('<p>' +
                    '<p>'+data[index].diem_dat+'</p>' +
                    '<canvas id="canvas-' + data[index].stt + '" width="300" height="100"></canvas>' +
                    '</p>');
            });
        });
        map.on('popupopen', function (e) {
            createTimeline(document.getElementById(e.popup._source.options.id));
            //alert(e.popup._source.getLatLng());
        });
    }
//    var zoomToHospital = function (lat, lon) {
//        map.setView([lat, lon], 15);
//    }

        $('form[name="sform"] input[name="stext"]').on('keyup',function () {
            var keyword = $(this).val();
            $.ajax({
                url: '/php/search.php',
                type: 'GET',
                contentType: "JSON",
                data: {keyword: keyword},
                dataType: "JSON",
                success:function(data) {
                    var items = [];
                    $.each(data, function(index, value) {
                        items.push( "<li class='list-group-item' id='" + index + "'><a href='#' onclick='zoomToAddress(" + data[index].lat + "," + data[index].long + ")'>" + data[index].dia_chi + "</a></li>" );
                    });
                    $('#search-resultbox').show();
                    $('#search-bar .search-items').html(items);
                },
                error: function(){
                    console.log("Error");
                }
            });
        });

    $(document).click(function () {
        $('#search-resultbox').hide();
        $('#search-bar .search-items').empty();
    });

    var zoomToAddress = function(lat, long){
        map.setView([lat, long], 15);
    }
</script>
