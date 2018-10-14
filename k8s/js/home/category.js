$(document).ready(function(){
        // get search keywords
        var keywords = $("#category").attr('data-key');
        var ip = getIpProductService();
        $.getJSON(ip+"/category/read.php", function(data){
            readCategoryTemplate(data,keywords)
        });
        // get data from the api based on search keywords
        $.getJSON(ip+"/product/read.php", function(data){
 
            // template in products.js
            readProductsCategoryTemplate(data, keywords);
 
            // // chage page title
            // changePageTitle("Search products: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
});
function readCategoryTemplate(data,keywords){
    var read_category_html = "";
    $.each(data.records, function(key, val) {
        if (val.id==keywords) {
            $(".background-deep").css("background-image","url("+val.image_uri+")");
            read_category_html += "<p>"+val.name+"</p>";
            read_category_html += "<p style='font-size: 30px'>"+val.title+"</p>";
            read_category_html += "<div class='go'>";
            read_category_html += "<a href='#p1' title=''><button type='button' class='btn btn-light'>Go</button></a>";
            read_category_html += "</div>";
        }
    });
    $("#category-header").html(read_category_html);
}
function readProductsCategoryTemplate(data,keywords){
    var read_products_html = "";
    $.each(data.records, function(key, val) {

        if (val.category_id==keywords) {
            read_products_html+="<div class='col-sm-3'>";
                read_products_html+="<div class='card hot-card' data-imgpro = '"+val.product_image+"' data-name = '"+val.name+"' data-description = '"+val.description+"'>";
                    read_products_html+="<a href='detail.php?id="+val.id+"'><img class='card-img-top' src='"+val.product_image+"' alt='Card image cap'></a>";
                    read_products_html+="<div class='card-body'>";
                        read_products_html+="<h5 class='card-title'>"+val.name+"</h5>";
                        read_products_html+="<p class='card-text'>"+val.price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+" VNĐ</p>";
                        read_products_html+="<button ";
                        // read_products_html+="<button data-id='<?php";
                        // read_products_html+="if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;";
                        //         read_products_html+="?>'";
                        read_products_html+="type='button' class='btn btn-outline-warning btn-buy-now' data-product='"+val.id+"'><i class='fa fa-shopping-cart'></i>";
                        read_products_html+="</button>";
                        read_products_html+="<p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
                    read_products_html+="</div>";
                read_products_html+="</div>";
            read_products_html+="</div>";
        }

    });    
    $("#category").html(read_products_html);
}