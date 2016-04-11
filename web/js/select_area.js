$('#province').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var province = this.value;
    $.ajax({
        url: "/site/districts",
        type: "GET",
        contentType: "JSON",
        data: {province: province},
        success:function(response) {
            $('#district').html(response);
        },
        error: function(){
            console.log("Error");
        }
    });
});
$('#district').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var district = this.value;
    $.ajax({
        url:"/site/wards",
        type: "GET",
        contentType: "JSON",
        data: {district: district},
        success:function(response) {
            $('#ward').html(response);
        },
        error: function(){
            console.log("Error");
        }
    });
});