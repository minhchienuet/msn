/**
 * Created by Nguyen on 4/15/16.
 */
/* Dictionary search with keyup event */
$('form[name="sform"] input[name="stext"]').on('keyup',function () {
    var keyword = $(this).val();
    $.ajax({
        url: '/site/search',
        type: 'get',
        contentType: "JSON",
        data: {keyword: keyword},
        success:function(response) {
            $('#search-resultbox').show();
            $('#search-bar .search-items').html(response);
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

/* When click the product on the search result */
$(document).on('click', '#search-bar .search-items li a', function (e) {
    e.preventDefault();
    var product_id = $(this).attr('value');
    getProductDetail(product_id);
});

/* Click to show product's detail */
function getProductDetail(product_id) {
    $.ajax({
        url: 'products/' + product_id
    }).done(function (response) {
            $('#main').html(response);
        });
}