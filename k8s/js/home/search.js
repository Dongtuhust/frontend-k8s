$(document).ready(function(){
        // get search keywords
        var keywords = $("#result_search").attr('data-key');
 
        // get data from the api based on search keywords
        $.getJSON("http://localhost/product_api/product/search.php?s=" + keywords, function(data){
 
            // template in products.js
            searchProductsTemplate(data, keywords);
 
            // // chage page title
            // changePageTitle("Search products: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
});

function searchProductsTemplate(data,keywords){
    var read_products_html = "";
    var count = 0;
    read_products_html+="<div class='row'>";
    $.each(data.records, function(key, val) {
        count++; 
        read_products_html+="<div class='col-sm-3'>";
            read_products_html+="<div class='card'>";
                read_products_html+="<a href='detail.php?id='"+val.id+"'><img class='card-img-top' src='"+val.product_image+"'alt='Card image cap'></a>";
                read_products_html+="<div class='card-body'>";
                    read_products_html+="<h5 class='card-title'>"+val.name+"</h5>";
                    read_products_html+="<p class='card-text'>"+val.price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+" VNĐ</p>";
                    read_products_html+="<button ";
                    read_products_html+="type='button' class='btn btn-outline-warning btn-buy-now' data-product="+val.id+"><i class='fa fa-shopping-cart'></i>";
                    read_products_html+="</button>";
                    read_products_html+="<p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small>";
                    read_products_html+="</p>";
                read_products_html+="</div>";
            read_products_html+="</div>";
        read_products_html+="</div>";
    });     
    read_products_html+="</div>";
    read_products_html+="<h3 style='color: orange;margin-top:50px;'>Có "+count+" Kết quả</h3>";
    $("#result_search").html(read_products_html);
}