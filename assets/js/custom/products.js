$(document).ready(function () {
    products = base_url + 'products';
    load_content();
});

function load_content() {
    $.ajax({
        url: `${products}/index_content`,
        dataType: 'json',
        method: 'GET',
        success: res => {
            $('.content').html(res.status ? res.html : `<h1>No Data Found!!!</h1>`);
        },
        error: res => {
            $('.content').html(`<h1>No Data Found!!!</h1>`);
        },
    });
}