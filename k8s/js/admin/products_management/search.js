$(document).ready(function(){
    var ip = getIpProductService();
    // when a 'search products' button was clicked
    $(document).on('submit', '#search-product-form', function(){
        ip = getIp();
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
        ip += ":30234";
        // get data from the api based on search keywords
        $.getJSON(ip+"/product/search.php?s=" + keywords, function(data){
 
            // template in products.js
            readProductsTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search products: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
    $(document).on('submit', '#search-oldproduct-form', function(){
 
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
        ip = getIpOldProductService();
        // get data from the api based on search keywords
        $.getJSON(ip+"/product/search.php?s=" + keywords, function(data){
 
            // template in products.js
            readProductsTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search products: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
 
});