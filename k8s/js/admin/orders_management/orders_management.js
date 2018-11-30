var type = "new";
$(document).ready(function(){

    // show list of order on first load
    showOrdersFirstPage();
 
    // when a 'read orders' button was clicked
    $(document).on('click', '#old_order', function(){
        type = "old";
        showOldOrdersFirstPage();
    });
    $(document).on('click', '#new_order', function(){
        type = "new";
        showOrdersFirstPage();
    });
    // when a 'page' button was clicked
    $(document).on('click', '.pagination li', function(){
        // get json url
        var json_url=$(this).find('a').attr('data-page');
 
        // show list of orders
        showOrders(json_url,type);
    });
});
 
function showOrdersFirstPage(){
    // var ip = getIpPaymentService();
    // var json_url=ip +"/orders";
    var json_url = "../api/read-payment-api.php";
    showOrders(json_url,type);
}


function showOldOrdersFirstPage(){
    var json_url = "../api/read-payment-old-api.php";
    showOrders(json_url,type);
}
// function to show list of orders
function showOrders(json_url,type){
 
    // get list of orders from the API
    $.getJSON(json_url, function(data){
 
        // html for listing orders
        if (type=="new") {
            readOrdersTemplate(data, "");
        }else{
            readOldOrdersTemplate(data, "");
        }
 
        // // chage page title
        // changePageTitle("Read orders");
 
    });
}