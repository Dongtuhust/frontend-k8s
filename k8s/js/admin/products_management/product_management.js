    var type="new";
$(document).ready(function(){

    // show list of product on first load
    showProductsFirstPage();
 
    // when a 'read products' button was clicked
    $(document).on('click', '#seller_product', function(){
        type="old";
        showOldProductsFirstPage();
    });
    $(document).on('click', '#distributor_product', function(){
        type="new";
        showProductsFirstPage();
    });
    // when a 'page' button was clicked
    $(document).on('click', '.pagination li', function(){
        // get json url
        var json_url=$(this).find('a').attr('data-page');
 
        // show list of products
        showProducts(json_url,type);
    });
});
 
function showProductsFirstPage(){
    var ip = getIpProductService();
    var json_url=ip + "/product/readPaging.php";
    showProducts(json_url,type);
}


function showOldProductsFirstPage(){
    var ip = getIpOldProductService();
    var json_url=ip +"/product/readPaging.php";
    showProducts(json_url,type);
}
// function to show list of products
function showProducts(json_url,type){
 
    // get list of products from the API
    $.getJSON(json_url, function(data){
 
        // html for listing products
        if (type=="new") {
            readProductsTemplate(data, "");
        }else{
            readOldProductsTemplate(data, "");
        }
 
        // // chage page title
        // changePageTitle("Read Products");
 
    });
}