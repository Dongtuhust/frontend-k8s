$(document).ready(function(){
 
    // when a 'search users' button was clicked
    $(document).on('submit', '#search-user-form', function(){
 
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
 
        // get data from the api based on search keywords
        $.getJSON("http://localhost/users_api/users/search.php?s=" + keywords, function(data){
 
            // template in users.js
            readUsersTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search users: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
    $(document).on('submit', '#search-olduser-form', function(){
 
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
 
        // get data from the api based on search keywords
        $.getJSON("http://localhost/old_user_api/user/search.php?s=" + keywords, function(data){
 
            // template in users.js
            readusersTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search users: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
 
});