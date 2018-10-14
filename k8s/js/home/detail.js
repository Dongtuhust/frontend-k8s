$(document).ready(function(){
        // get search keywords
        var keywords = $("#background-header").attr('data-key');
 
        // get data from the api based on search keywords
        $.getJSON("http://localhost/product_api/product/readOne.php?id=" + keywords, function(data){
 
            // template in products.js
            readOneProductsTemplate(data, keywords);
 
            // // chage page title
            // changePageTitle("Search products: " + keywords);
            var category = data.category_id;
            $.getJSON("http://localhost/product_api/product/read.php", function(data_recmd){
                readSameProductsTeamplate(data_recmd,category);
            });
        });

        
        
        // prevent whole page reload
        return false;
});

function readOneProductsTemplate(data,keywords){
//header    
    var header_html = "";
    header_html +="<div class='background-deep' style='background-image: url("+data.product_image+");'>";

    header_html +="</div>";
    header_html +="<div class = 'head-title'>";
        header_html +="<p>"+data.name+"</p>";
        header_html +="<span>Ps4 Dongtu Store</span>";
        header_html +="<div class='go'>";
            header_html +="<a href='#p1' title=''><button type='button' class='btn btn-light'>Go</button></a>";
        header_html +="</div>";
    header_html +="</div>";
// detail product find One
   var read_products_html = "";
    read_products_html+="<div class='product'>";
    read_products_html+="<div class='description'>";
        read_products_html+="<div class='img-product' style='background-image: url("+data.product_image+");'>";
        read_products_html+="</div>";
        read_products_html+="<div class='text-description'>";
            read_products_html+="<div class='text-name'>";
                read_products_html+="<span class='name'>"+data.name+"</span><br>";
                read_products_html+="<span class='price'>"+data.price+"</span><br>";
                read_products_html+="<span class='text-detail head' >Hãng sản xuất :</span>";
                read_products_html+="<span class='text-detail' >"+data.distributor+"</span><br>";
                read_products_html+="<span class='text-detail head' >Thể loại :</span>";
                read_products_html+="<span class='text-detail' >"+"Đối kháng"+"</span><br>";
                read_products_html+="<span class='text-detail head' >Bảo hành :</span>";
                read_products_html+="<span class='text-detail' >12 tháng </span><br>";
                read_products_html+="<span class='text-detail head' >Mô tả :</span>";
                read_products_html+="<div class='mota'>";
                    read_products_html+="<p>"+data.description+"</p><br>";
                read_products_html+="</div>";
                read_products_html+="<span class='text-detail head' style=''>Lựa chọn :</span>";
                read_products_html+="<div style='display: block;margin-top:10px; ' >";
                    read_products_html+="<a href=''>";
                        read_products_html+="<button ";
                        read_products_html+="type='button' class='btn btn-outline-warning btn-buy-now' data-product="+data.id+"><i class='fa fa-shopping-cart'></i>";
                    read_products_html+="</button>";
                read_products_html+="</a>";
                read_products_html+="<select  style='width: 150px;height: 37px;' class='custom-select quantity-cart' data-quatity='"+data.quantity+"' >";
                    read_products_html+="<option selected>Số lượng</option>";
                    for (var i = 0; i < 20; i++) {
                        read_products_html+="<option value='"+i+"'>"+i+"</option>";
                    }
                read_products_html+="</select>";
            read_products_html+="</div>";
        read_products_html+="</div>";
    read_products_html+="</div>";
    read_products_html+="</div>";
    read_products_html+="<div style='display: flex;height: 70px;width: 200px;margin-left : 100px;'>";
    for (var i = 1; i < 4; i++) {
        var url = data.detail_image;
        url = url + "/product" + i + ".jpg";
        read_products_html+="<span class='list-img-product' style='background-image: url("+url+")' data-img = 'url("+url+")' ></span>";
    }
    read_products_html+="</div>";
    read_products_html+="</div>";
    $("#background-header").html(header_html);
    $("#detail_product").html(read_products_html);
}

function readSameProductsTeamplate(data_recmd,category){
    var read_same_products_html = "";
    $.each(data_recmd.records, function(key, val) {
        if (val.category_id==category) {
            read_same_products_html+="<div class='col-sm-3'>";
                read_same_products_html+="<div class='card hot-card' data-imgpro = '"+val.product_image+"' data-name = '"+val.name+"' data-description = '"+val.description+"'>";
                    read_same_products_html+="<a href='detail.php?id="+val.id+"'><img class='card-img-top' src='"+val.product_image+"' alt='Card image cap'></a>";
                    read_same_products_html+="<div class='card-body'>";
                        read_same_products_html+="<h5 class='card-title'>"+val.name+"</h5>";
                        read_same_products_html+="<p class='card-text'>"+val.price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+" VNĐ</p>";
                        read_same_products_html+="<button ";
                        // read_products_html+="<button data-id='<?php";
                        // read_products_html+="if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;";
                        //         read_products_html+="?>'";
                        read_same_products_html+="type='button' class='btn btn-outline-warning btn-buy-now' data-product='"+val.id+"'><i class='fa fa-shopping-cart'></i>";
                        read_same_products_html+="</button>";
                        read_same_products_html+="<p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
                    read_same_products_html+="</div>";
                read_same_products_html+="</div>";
            read_same_products_html+="</div>";
        }
    });

    $("#same_product").html(read_same_products_html);
}