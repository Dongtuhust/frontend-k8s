$(document).ready(function(){
    var ip = getIpPaymentService();
    // when a 'search orders' button was clicked
    $(document).on('submit', '#search-order-form', function(){
        
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
        ip = "http://35.185.178.104:31910";
        // get data from the api based on search keywords
        $.getJSON(ip+"/orders/search.php?s=" + keywords, function(data){
 
            // template in orders.js
            readOrdersTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search orders: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
    $(document).on('submit', '#search-oldorder-form', function(){
 
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
        ip = getIpOldPaymentService();
        // get data from the api based on search keywords
        $.getJSON(ip+"/order/search.php?s=" + keywords, function(data){
 
            // template in orders.js
            readOrdersTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search orders: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
 
});