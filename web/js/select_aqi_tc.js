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