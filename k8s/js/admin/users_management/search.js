$(document).ready(function(){
 
    // when a 'search users' button was clicked
    $(document).on('submit', '#search-user-form', function(){
        ip = getIp();
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
        ip += ":30999";
        // get data from the api based on search keywords
        $.getJSON(ip+"/users/search.php?s=" + keywords, function(data){
 
            // template in users.js
            readUsersTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search users: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
 
});