// product list html
function readProductsTemplate(data, keywords){
 
    var read_products_html="";

    read_products_html+="<div class='row tab'>";
        read_products_html+="<div class='col-sm-4'>";
            read_products_html+="<button type='button'  class='btn btn-success' id='distributor_product'>Nhà phân phối</button>";
            read_products_html+="<button type='submit' class='btn btn-primary' id='seller_product'>Người dùng bán</button>";
        read_products_html+="</div>";
        // search products form
        read_products_html+="<form class='col-sm-4' id='search-product-form' action='#' method='post'>";
        read_products_html+="<div >";
            read_products_html+="<span style='margin-top: 5px;margin-bottom: 7px;display: flex;'>";
                read_products_html+="<input class='form-control input_search' type='search' placeholder='Search' value='" + keywords + "' name='keywords' aria-label='Search'>";
                read_products_html+="<i style='margin-top: 7px;cursor: pointer;margin-left: 5px;color: orange;font-size: 15px;' class='fas fa-search search'>";
                read_products_html+="</i>";
            read_products_html+="</span>";
        read_products_html+="</div>";
        read_products_html+="</form>";
    read_products_html+="</div>";
    // Quản lý sản phẩm  ========================================================-->
    read_products_html+="<div id='handling-product'>";
    read_products_html+="</div>";
    read_products_html+="<div id='product_list'>";
        read_products_html+="<div class='hover-effect' style='height: 50px'>";
            read_products_html+="<h2 style='text-align: center;'>Quản lý sản phẩm do nhà phân phối cung cấp</h2>";
        read_products_html+="</div>";
        read_products_html+="<table class='table table-hover'>";
            read_products_html+="<thead>";
                read_products_html+="<tr>";
                    read_products_html+="<th scope='col'>Id</th>";
                    read_products_html+="<th scope='col'>Tên sản phẩm</th>";
                    read_products_html+="<th scope='col'>Giá</th>";
                    read_products_html+="<th scope='col'>Miêu tả</th>";
                    read_products_html+="<th scope='col'>Thể loại</th>";
                    read_products_html+="<th scope='col'>Số lượng</th>";
                    read_products_html+="<th scope='col'>Nhà cung cấp</th>";
                    read_products_html+="<th scope='col'>Trạng thái</th>";
                    read_products_html+="<th scope='col'>Sửa</th>";
                read_products_html+="</tr>";
            read_products_html+="</thead>";
            read_products_html+="<tbody>";
            $.each(data.records, function(key, val) {
                        read_products_html+="<tr valign='top'>";
                            read_products_html+="<th scope='row'>"+ val.id +"</th>";
                            read_products_html+="<td>"+ val.name +"</td>";
                            read_products_html+="<td>"+ val.price +"</td>";
                            read_products_html+="<td><textarea class='form-control' rows='1'>"+ val.description +"</textarea></td>";
                            read_products_html+="<td style='text-align: center;'>"+ val.category_id +"</td>";
                            read_products_html+="<td style='text-align: center;'>"+ val.quantity +"</td>";
                            read_products_html+="<td style='text-align: center;'>"+ val.distributor +"</td>";
                            read_products_html+="<td style='text-align: center;'>"+ val.status +"</td>";
                            read_products_html+="<td><button type='button' class='btn btn-light' data-toggle='modal' data-target='#ModalCenter"+ val.id +"' name='"+ val.id +"'>Sửa</button></td>";
                            read_products_html+="<div class='modal fade' id='ModalCenter"+ val.id +"' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
                                read_products_html+="<div class='modal-dialog modal-dialog-centered' role='document'>";
                                    read_products_html+="<div class='modal-content'>";
                                        read_products_html+="<div class='modal-header'>";
                                            read_products_html+="<h5 class='modal-title' id='exampleModalLongTitle'>Chỉnh sửa dữ liệu sản phẩm</h5>";
                                            read_products_html+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                read_products_html+="<span aria-hidden='true'>&times;</span>";
                                            read_products_html+="</button>";
                                        read_products_html+="</div>";
                                        read_products_html+="<form method='post'>";
                                            read_products_html+="<div class='modal-body'>";
                                                read_products_html+="<p>product_id : </p><input type='text' class='form-control' name='product_id' value='"+ val.id +"' readonly='true'>";
                                                read_products_html+="<p>product_name : </p><input type='text' class='form-control' name='product_name' value='"+ val.name +"'>";
                                                read_products_html+="<p>price_buy : </p><input type='text' class='form-control' name='price_buy' value='"+ val.price +"'>";
                                                read_products_html+="<p>description : </p><input type='text' class='form-control' name='description' value='"+ val.description +"'>";
                                                read_products_html+="<p>category_id : </p><input type='text' class='form-control' name='category_id' value='"+ val.category_id +"'>";
                                                read_products_html+="<p>quantity : </p><input type='text' class='form-control' name='quantity' value='"+ val.quantity +"'>";
                                                read_products_html+="<p>distributor_name : </p><input type='text' class='form-control' name='distributor_name' value='"+ val.distributor +"'>";
                                                read_products_html+="<p>";
                                                read_products_html+="product_status : </p><select  class='form-control' name='product_status' value='"+ val.status +"'>";
                                                    read_products_html+="<option value='Mới'>Mới</option>";
                                                    read_products_html+="<option value='Cũ'>Cũ</option>";
                                                    read_products_html+="<option value='Hot'>Hot</option>";
                                                    read_products_html+="<option value='Quá cũ'>Quá cũ</option>";
                                                read_products_html+="</select>";

                                            read_products_html+="</div>";
                                            read_products_html+="<div class='modal-footer'>";
                                                read_products_html+="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                read_products_html+="<button type='submit' data-id='"+val.id+"' name='submited' class='btn btn-primary update-product-button'>Save changes</button>";
                                                read_products_html+="<button type='submit' data-id='"+val.id+"' name='submited' class='btn btn-danger delete-product-button'>Xóa</button>";
                                            read_products_html+="</div>";
                                        read_products_html+="</form>";
                                    read_products_html+="</div>";
                                read_products_html+="</div>";
                            read_products_html+="</div>";
                        read_products_html+="</tr>";
            });
            read_products_html+="</tbody>";
        read_products_html+="</table>";
    read_products_html+="</div>";
        if(data.paging){
        read_products_html+="<ul class='pagination'>";
     
            // first page
            if(data.paging.first!=""){
                read_products_html+="<li class='page-item'><a data-page='" + data.paging.first + "'>First Page</a></li>";
            }
     
            // loop through pages
            $.each(data.paging.pages, function(key, val){
                var active_page=val.current_page=="yes" ? "class='active'" : "";
                read_products_html+="<li class='page-item' " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
            });
     
            // last page
            if(data.paging.last!=""){
                read_products_html+="<li class='page-item'><a data-page='" + data.paging.last + "'>Last Page</a></li>";
            }
        read_products_html+="</ul>";
        }   
    

    
    // inject to 'page-content' of our app
    $("#app").html(read_products_html);
}


// old product list html
function readOldProductsTemplate(data, keywords){
 
    var read_products_html="";

    read_products_html+="<div class='row tab'>";
        read_products_html+="<div class='col-sm-4'>";
            read_products_html+="<button type='button'  class='btn btn-success' id='distributor_product'>Nhà phân phối</button>";
            read_products_html+="<button type='submit' class='btn btn-primary' id='seller_product'>Người dùng bán</button>";
        read_products_html+="</div>";
        // search products form
        read_products_html+="<form class='col-sm-4' id='search-oldproduct-form' action='#' method='post'>";
        read_products_html+="<div >";
            read_products_html+="<span style='margin-top: 5px;margin-bottom: 7px;display: flex;'>";
                read_products_html+="<input class='form-control input_search' type='search' placeholder='Search' value='" + keywords + "' name='keywords' aria-label='Search'>";
                read_products_html+="<i style='margin-top: 7px;cursor: pointer;margin-left: 5px;color: orange;font-size: 15px;' class='fas fa-search search'>";
                read_products_html+="</i>";
            read_products_html+="</span>";
        read_products_html+="</div>";
        read_products_html+="</form>";
    read_products_html+="</div>";
    // Quản lý sản phẩm  ========================================================-->
    read_products_html+="<div id='handling-product'>";
    read_products_html+="</div>";
    read_products_html+="<div id='product_list'>";
        read_products_html+="<div class='hover-effect' style='height: 50px'>";
            read_products_html+="<h2 style='text-align: center;'>Quản lý sản phẩm do người dùng đăng bán</h2>";
        read_products_html+="</div>";
        read_products_html+="<table class='table table-hover'>";
            read_products_html+="<thead>";
                read_products_html+="<tr>";
                    read_products_html+="<th scope='col' style='text-align: center;'>Email</th>";
                    read_products_html+="<th scope='col'>Id</th>";
                    read_products_html+="<th scope='col'>Tên sản phẩm</th>";
                    read_products_html+="<th scope='col'>Giá</th>";
                    read_products_html+="<th scope='col'>Ngày mua</th>";
                    read_products_html+="<th scope='col'>Mô tả</th>";
                    read_products_html+="<th scope='col'>Tình trạng(%)</th>";
                    read_products_html+="<th scope='col'>Trạng thái</th>";
                    read_products_html+="<th scope='col'>Ngày đăng</th>";
                    read_products_html+="<th scope='col'>Sửa</th>";
                read_products_html+="</tr>";
            read_products_html+="</thead>";
            read_products_html+="<tbody>";
            $.each(data.records, function(key, val) {
                        read_products_html+="<tr valign='top'>";
                            read_products_html+="<th style='text-align: center;'>"+ val.user_mail +"</th>";
                            read_products_html+="<th scope='row'>"+ val.id +"</th>";
                            read_products_html+="<td>"+ val.name +"</td>";
                            read_products_html+="<td>"+ val.price +"</td>";
                            read_products_html+="<td>"+ val.buy_time +"</td>";
                            read_products_html+="<td><textarea class='form-control' rows='1'>"+ val.description +"</textarea></td>";
                            read_products_html+="<td style='text-align: center;'>"+ val.percent +"</td>";
                            if (val.status=="Đã bán") {
                                read_products_html+="<td style='text-align: center;color:red;'>"+ val.status +"</td>";
                            }else{
                                read_products_html+="<td style='text-align: center;'>"+ val.status +"</td>";
                            }
                            read_products_html+="<td style='text-align: center;'>"+ val.created_time +"</td>";
                            read_products_html+="<td><button type='button' class='btn btn-light' data-toggle='modal' data-target='#ModalCenter"+ val.id +"' name='"+ val.id +"'>Sửa</button></td>";
                            read_products_html+="<div class='modal fade' id='ModalCenter"+ val.id +"' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
                                read_products_html+="<div class='modal-dialog modal-dialog-centered' role='document'>";
                                    read_products_html+="<div class='modal-content'>";
                                        read_products_html+="<div class='modal-header'>";
                                            read_products_html+="<h5 class='modal-title' id='exampleModalLongTitle'>Chỉnh sửa dữ liệu sản phẩm</h5>";
                                            read_products_html+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                read_products_html+="<span aria-hidden='true'>&times;</span>";
                                            read_products_html+="</button>";
                                        read_products_html+="</div>";
                                        read_products_html+="<form method='post'>";
                                            read_products_html+="<div class='modal-body'>";
                                                read_products_html+="<p>product_id : </p><input type='text' class='form-control' name='product_id' value='"+ val.id +"' readonly='true'>";
                                                read_products_html+="<p>product_name : </p><input type='text' class='form-control' name='product_name' value='"+ val.name +"'>";
                                                read_products_html+="<p>price_buy : </p><input type='text' class='form-control' name='price_buy' value='"+ val.price +"'>";
                                                read_products_html+="<p>description : </p><input type='text' class='form-control' name='description' value='"+ val.description +"'>";
                                                read_products_html+="<p>percent : </p><input type='text' class='form-control' name='percent' value='"+ val.percent +"'>";
                                                read_products_html+="<p>status : </p><input type='text' class='form-control' name='status' value='"+ val.status +"'>";
                                                read_products_html+="<p>created_time : </p><input type='text' class='form-control' name='created_time' value='"+ val.created_time +"'>";
                                            read_products_html+="</div>";
                                            read_products_html+="<div class='modal-footer'>";
                                                read_products_html+="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                read_products_html+="<button type='submit' data-id='"+val.id+"' name='submited' class='btn btn-primary update-product-button'>Save changes</button>";
                                                read_products_html+="<button type='submit' data-id='"+val.id+"' name='submited' class='btn btn-danger delete-product-button'>Xóa</button>";
                                            read_products_html+="</div>";
                                        read_products_html+="</form>";
                                    read_products_html+="</div>";
                                read_products_html+="</div>";
                            read_products_html+="</div>";
                        read_products_html+="</tr>";
            });
            read_products_html+="</tbody>";
        read_products_html+="</table>";
    read_products_html+="</div>";
        if(data.paging){
        read_products_html+="<ul class='pagination'>";
     
            // first page
            if(data.paging.first!=""){
                read_products_html+="<li class='page-item'><a data-page='" + data.paging.first + "'>First Page</a></li>";
            }
     
            // loop through pages
            $.each(data.paging.pages, function(key, val){
                var active_page=val.current_page=="yes" ? "class='active'" : "";
                read_products_html+="<li class='page-item' " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
            });
     
            // last page
            if(data.paging.last!=""){
                read_products_html+="<li class='page-item'><a data-page='" + data.paging.last + "'>Last Page</a></li>";
            }
        read_products_html+="</ul>";
        }   
    

    
    // inject to 'page-content' of our app
    $("#app").html(read_products_html);
}
