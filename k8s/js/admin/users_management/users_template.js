// user list html
function readUsersTemplate(data, keywords){
 
    var read_users_html="";

    read_users_html+="<div class='row tab'>";
        // search users form
        read_users_html+="<form class='col-sm-4' id='search-user-form' action='#' method='post'>";
        read_users_html+="<div >";
            read_users_html+="<span style='margin-top: 5px;margin-bottom: 7px;display: flex;'>";
                read_users_html+="<input class='form-control input_search' type='search' placeholder='Search' value='" + keywords + "' name='keywords' aria-label='Search'>";
                read_users_html+="<i style='margin-top: 7px;cursor: pointer;margin-left: 5px;color: orange;font-size: 15px;' class='fas fa-search search'>";
                read_users_html+="</i>";
            read_users_html+="</span>";
        read_users_html+="</div>";
        read_users_html+="</form>";
    read_users_html+="</div>";
    // Quản lý sản phẩm  ========================================================-->
    read_users_html+="<div id='handling-user'>";
    read_users_html+="</div>";
    read_users_html+="<div id='user_list'>";
        read_users_html+="<div class='hover-effect' style='height: 50px'>";
            read_users_html+="<h2 style='text-align: center;'>Quản lý tài khoản người dùng</h2>";
        read_users_html+="</div>";
        read_users_html+="<table class='table table-hover'>";
            read_users_html+="<thead>";
                read_users_html+="<tr>";
                    read_users_html+="<th scope='col'>ID</th>";
                    read_users_html+="<th scope='col'>Tên</th>";
                    read_users_html+="<th scope='col'>Địa chỉ</th>";
                    read_users_html+="<th scope='col'>Điện thoại</th>";
                    read_users_html+="<th scope='col' style='text-align: center;'>Email</th>";
                    read_users_html+="<th scope='col'>Ngày tạo</th>";
                    read_users_html+="<th scope='col'>Trạng thái khóa</th>";
                    read_users_html+="<th scope='col'>Phân quyền</th>";
                read_users_html+="</tr>";
            read_users_html+="</thead>";
            read_users_html+="<tbody>";
            $.each(data.records, function(key, val) {
                        read_users_html+="<tr valign='top'>";
                            read_users_html+="<th scope='row'>"+ val.user_id +"</th>";
                            read_users_html+="<td>"+ val.username +"</td>";
                            read_users_html+="<td>"+ val.phone +"</td>";
                            read_users_html+="<td style='text-align: center;'>"+ val.address +"</td>";
                            read_users_html+="<td style='text-align: center;'>"+ val.email +"</td>";
                            read_users_html+="<td style='text-align: center;'>"+ val.createdate +"</td>";
                            read_users_html+="<td style='text-align: center;'>"+ val.is_block +"</td>";
                            read_users_html+="<td style='text-align: center;'>"+ val.permision +"</td>";
                            read_users_html+="<td><button type='button' class='btn btn-light' data-toggle='modal' data-target='#ModalCenter"+ val.user_id +"' name='"+ val.user_id +"'>Chi tiết</button></td>";
                            read_users_html+="<div class='modal fade' id='ModalCenter"+ val.user_id +"' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
                                read_users_html+="<div class='modal-dialog modal-dialog-centered' role='document'>";
                                    read_users_html+="<div class='modal-content'>";
                                        read_users_html+="<div class='modal-header'>";
                                            read_users_html+="<h5 class='modal-title' id='exampleModalLongTitle'>Chỉnh sửa dữ liệu sản phẩm</h5>";
                                            read_users_html+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                read_users_html+="<span aria-hidden='true'>&times;</span>";
                                            read_users_html+="</button>";
                                        read_users_html+="</div>";
                                        read_users_html+="<form method='post'>";
                                            read_users_html+="<div class='modal-body'>";
                                                read_users_html+="<p style='color: blue;font-weight: bold;'>ID : </p>";
                                                read_users_html+="<input type='text' class='form-control' name='ID' value='"+ val.user_id +"' readonly='true'>";
                                                read_users_html+="<p style='color: blue;font-weight: bold;'>Tài khoản : </p>";
                                                read_users_html+="<input type='text' class='form-control' name='user_name' value='"+ val.username +"' readonly='true'>";
                                                read_users_html+="<p style='color: blue;font-weight: bold;'>Email : </p>";
                                                read_users_html+="<input type='text' class='form-control' name='email' value='"+ val.email +"' readonly='true'>";
                                                read_users_html+="<p style='color: blue;font-weight: bold;'>Ngày tạo : </p>";
                                                read_users_html+="<input type='text' class='form-control' name='createdate' value='"+ val.createdate +"' readonly='true'>";

                                            read_users_html+="</div>";
                                            read_users_html+="<div class='modal-footer'>";
                                                read_users_html+="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                read_users_html+="<button type='submit' data-id='"+val.user_id+"' name='block-user' class='btn btn-primary update-user-button'>Block</button>";
                                                read_users_html+="<button type='submit' data-id='"+val.user_id+"' name='del-user' class='btn btn-danger delete-user-button'>Xóa</button>";
                                            read_users_html+="</div>";
                                        read_users_html+="</form>";
                                    read_users_html+="</div>";
                                read_users_html+="</div>";
                            read_users_html+="</div>";
                        read_users_html+="</tr>";
            });
            read_users_html+="</tbody>";
        read_users_html+="</table>";
    read_users_html+="</div>";
        if(data.paging){
        read_users_html+="<ul class='pagination'>";
     
            // first page
            if(data.paging.first!=""){
                read_users_html+="<li class='page-item'><a data-page='" + data.paging.first + "'>First Page</a></li>";
            }
     
            // loop through pages
            $.each(data.paging.pages, function(key, val){
                var active_page=val.current_page=="yes" ? "class='active'" : "";
                read_users_html+="<li class='page-item' " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
            });
     
            // last page
            if(data.paging.last!=""){
                read_users_html+="<li class='page-item'><a data-page='" + data.paging.last + "'>Last Page</a></li>";
            }
        read_users_html+="</ul>";
        }   
    

    
    // inject to 'page-content' of our app
    $("#app").html(read_users_html);
}