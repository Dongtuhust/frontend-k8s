$(document).ready(function(){

    // show list of product on first load
    showProductsFirstPage();
    showHotProduct();
    showNewProduct();
    // when a 'page' button was clicked
    $(document).on('click', '.pagination li', function(){
        // get json url
        var json_url=$(this).find('a').attr('data-page');
        var type="all";
        // show list of products
        showProducts(json_url,type);
    });
});
 
function showProductsFirstPage(){
    var type = "all";
    var ip = getIpProductService();
    var json_url=ip + "/product/readPaging.php";
    showProducts(json_url,type);
}

function showHotProduct(){
    var type= "hot";
    var ip = getIpProductService();
    var json_url=ip + "/product/read.php";
    showProducts(json_url,type);
}

function showNewProduct(){
    var type= "new";
    var ip = getIpProductService();
    var json_url=ip + "/product/read.php";
    showProducts(json_url,type);
}

// function to show list of products
function showProducts(json_url,type){
    // get list of products from the API
    $.getJSON(json_url, function(data){
        // html for listing products
        if (type=="all") {
            readAllProductsTemplate(data, "");
        }else if (type=="hot") {
            readHotProductsTemplate(data, "");
        }else if (type=="new") {
            readNewProductsTemplate(data, "");
        }
    });
}