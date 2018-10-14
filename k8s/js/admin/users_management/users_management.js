
$(document).ready(function(){

    // show list of user on first load
    showUsersFirstPage();

    // when a 'page' button was clicked
    $(document).on('click', '.pagination li', function(){
        // get json url
        var json_url=$(this).find('a').attr('data-page');
 
        // show list of users
        showUsers(json_url);
    });
});
 
function showUsersFirstPage(){
    var json_url="http://localhost/users_api/users/readPaging.php";
    showUsers(json_url);
}

// function to show list of users
function showUsers(json_url,type){
 
    // get list of users from the API
    $.getJSON(json_url, function(data){
 
        // html for listing users
        readUsersTemplate(data, "");
        // // chage page title
        // changePageTitle("Read users");
 
    });
}