// product list html
function readAllProductsTemplate(data, keywords){
 
    var read_products_html="";
    console.log(data);
    read_products_html+="<h2 class='chimuc'>Tất cả</h2>";
    read_products_html+="<div class='row'>";
    $.each(data.records, function(key, val) {       
            read_products_html+="<div class='col-sm-3'>";
                read_products_html+="<div class='card'>";
                    read_products_html+="<a href='detail.php?id="+val.id+"'><img class='card-img-top' src='"+val.product_image+"' alt='Card image cap'></a>";
                    read_products_html+="<div class='card-body'>";
                        read_products_html+="<h5 class='card-title'>"+val.name+"</h5>";
                        read_products_html+="<p class='card-text'>"+val.price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+" VNĐ</p>";
                        read_products_html+="<button data-id='";
                        read_products_html+="type='button' class='btn btn-outline-warning btn-buy-now' data-product="+val.id+">";
                        read_products_html+="<i class='fa fa-shopping-cart'></i>";
                        read_products_html+="</button>";
                    read_products_html+="<p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
                    read_products_html+="</div>";
                read_products_html+="</div>";
            read_products_html+="</div>";
        
    });
    read_products_html+="</div>";
        if(data.paging){
            var read_products_paging="";    
            read_products_paging+="<ul class='pagination'>";
         
                // first page
                if(data.paging.first!=""){
                    read_products_paging+="<li class='page-item'><a data-page='" + data.paging.first + "'>First Page</a></li>";
                }
         
                // loop through pages
                $.each(data.paging.pages, function(key, val){
                    var active_page=val.current_page=="yes" ? "class='active'" : "";
                    read_products_paging+="<li class='page-item' " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
                });
         
                // last page
                if(data.paging.last!=""){
                    read_products_paging+="<li class='page-item'><a data-page='" + data.paging.last + "'>Last Page</a></li>";
                }
            read_products_paging+="</ul>";
        }   
    

    
    // inject to 'page-content' of our app
    $("#all-product").html(read_products_html);
    $("#paging").html(read_products_paging);
}

function readHotProductsTemplate (data,keywords){
    var read_products_html="";
    read_products_html+="<div class='row'>";
    $.each(data.records, function(key, val) { 
        if (val.status=="Hot") {
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
    read_products_html+="</div>";

    $("#product-hot").html(read_products_html);
}

function readNewProductsTemplate (data,keywords){
    var read_products_html="";
    read_products_html+="<div class='row'>";
    $.each(data.records, function(key, val) { 
        if (val.status=="Mới") {
            read_products_html+="<div class='col-sm-3'>";
                read_products_html+="<div class='card new-card' data-imgpro = 'url('"+val.product_image+"')' data-name = '"+val.product_image+"' data-description = '"+val.description+"'>";
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
    read_products_html+="</div>";

    $("#product-new").html(read_products_html);
}

