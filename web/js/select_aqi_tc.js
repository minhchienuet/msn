$('#tcvn').on('click', function () {
    $("#level").empty().html($("#levels_tcvn").html());
    $("#chart_tcvn").show();
    $("#chart_tcqt").hide();
});
$('#tcqt').on('click', function () {
    $("#level").empty().html($("#levels_tcqt").html());
    $("#chart_tcqt").show();
    $("#chart_tcvn").hide();
});