// order list html
function readOrdersTemplate(data, keywords){
 
    var read_orders_html="";

    read_orders_html+="<div class='row tab'>";
        read_orders_html+="<div class='col-sm-4'>";
            read_orders_html+="<button type='button'  class='btn btn-success' id='new_order'>Đĩa mới</button>";
            read_orders_html+="<button type='submit' class='btn btn-primary' id='old_order'>Đĩa cũ</button>";
        read_orders_html+="</div>";
        // search orders form
        read_orders_html+="<form class='col-sm-4' id='search-order-form' action='#' method='post'>";
        read_orders_html+="<div >";
            read_orders_html+="<span style='margin-top: 5px;margin-bottom: 7px;display: flex;'>";
                read_orders_html+="<input class='form-control input_search' type='search' placeholder='Search' value='" + keywords + "' name='keywords' aria-label='Search'>";
                read_orders_html+="<i style='margin-top: 7px;cursor: pointer;margin-left: 5px;color: orange;font-size: 15px;' class='fas fa-search search'>";
                read_orders_html+="</i>";
            read_orders_html+="</span>";
        read_orders_html+="</div>";
        read_orders_html+="</form>";
    read_orders_html+="</div>";
    // Quản lý sản phẩm  ========================================================-->
    read_orders_html+="<div id='handling-order'>";
    read_orders_html+="</div>";
    read_orders_html+="<div id='order_list'>";
        read_orders_html+="<div class='hover-effect' style='height: 50px'>";
            read_orders_html+="<h2 style='text-align: center;'>Quản lý đơn hàng đĩa mới</h2>";
        read_orders_html+="</div>";
        read_orders_html+="<table class='table table-hover'>";
            read_orders_html+="<thead>";
                read_orders_html+="<tr>";
                    read_orders_html+="<th scope='col'>Mã đơn hàng</th>";
                    read_orders_html+="<th scope='col'>Tên khách hàng</th>";
                    read_orders_html+="<th scope='col'>Giới tính</th>";
                    read_orders_html+="<th scope='col'>Địa chỉ</th>";
                    read_orders_html+="<th scope='col'>Số đt</th>";
                    read_orders_html+="<th scope='col'>Tổng tiền</th>";
                    read_orders_html+="<th scope='col'>Dạng thanh toán</th>";
                    read_orders_html+="<th scope='col'>Ngày mua</th>";
                    read_orders_html+="<th scope='col'>Ghi chú</th>";
                    read_orders_html+="<th scope='col'>Trạng thái</th>";
                    read_orders_html+="<th scope='col'>Chi tiết</th>";
                read_orders_html+="</tr>";
            read_orders_html+="</thead>";
            read_orders_html+="<tbody>";
            $.each(data.records, function(key, val) {
                        read_orders_html+="<tr valign='top'>";
                            read_orders_html+="<th scope='row'>"+ val.order_id +"</th>";
                            read_orders_html+="<td>"+ val.customer_name +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.gender +"</td>";
                            read_orders_html+="<td>"+ val.customer_add +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.customer_phone +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.total_money +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.payment +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.order_date +"</td>";
                            read_orders_html+="<td><textarea class='form-control' rows='1'>"+ val.note +"</textarea></td>";
                            if (val.status =="Bị hủy") {
                                read_orders_html+="<td style='text-align: center;color:red;'>"+ val.status +"</td>";
                            }else{
                                read_orders_html+="<td style='text-align: center;color:green'>"+ val.status +"</td>";
                            }
                            read_orders_html+="<td><button type='button' class='btn btn-light' data-toggle='modal' data-target='#ModalCenter"+ val.order_id +"' name='"+ val.order_id +"'>Chi tiết</button></td>";
                            read_orders_html+="<div class='modal fade' id='ModalCenter"+ val.order_id +"' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
                                read_orders_html+="<div class='modal-dialog modal-dialog-centered' role='document'>";
                                    read_orders_html+="<div class='modal-content'>";
                                        read_orders_html+="<div class='modal-header'>";
                                            read_orders_html+="<h5 class='modal-title' id='exampleModalLongTitle'>Chi tiết đơn hàng";
                                            read_orders_html+="<input type='text' class='form-control' name='order_id' value='"+ val.order_id +"' readonly='true'></h5>";
                                            read_orders_html+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                read_orders_html+="<span aria-hidden='true'>&times;</span>";
                                            read_orders_html+="</button>";
                                        read_orders_html+="</div>";
                                        read_orders_html+="<form method='post'>";
                                            read_orders_html+="<div class='modal-body'>";
                                                // read_orders_html+="<p>order_name : </p><input type='text' class='form-control' name='order_name' value='"+ val.customer_name +"'>";
                                                // read_orders_html+="<p>price_buy : </p><input type='text' class='form-control' name='price_buy' value='"+ val.price +"'>";
                                                // read_orders_html+="<p>description : </p><input type='text' class='form-control' name='description' value='"+ val.description +"'>";
                                                // read_orders_html+="<p>category_id : </p><input type='text' class='form-control' name='category_id' value='"+ val.category_id +"'>";
                                                // read_orders_html+="<p>quantity : </p><input type='text' class='form-control' name='quantity' value='"+ val.quantity +"'>";
                                                // read_orders_html+="<p>distributor_name : </p><input type='text' class='form-control' name='distributor_name' value='"+ val.distributor +"'>";
                                                // read_orders_html+="<p>";
                                                // read_orders_html+="order_status : </p><select  class='form-control' name='order_status' value='"+ val.status +"'>";
                                                //     read_orders_html+="<option value='Mới'>Mới</option>";
                                                //     read_orders_html+="<option value='Cũ'>Cũ</option>";
                                                //     read_orders_html+="<option value='Hot'>Hot</option>";
                                                //     read_orders_html+="<option value='Quá cũ'>Quá cũ</option>";
                                                // read_orders_html+="</select>";
                                            read_orders_html+="</div>";
                                            read_orders_html+="<div class='modal-footer'>";
                                                read_orders_html+="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                read_orders_html+="<button type='submit' data-id='"+val.order_id+"' name='neworder' class='btn btn-primary update-order-button'>Xác nhận giao hàng</button>";
                                                read_orders_html+="<button type='submit' data-id='"+val.order_id+"' name='delneworder' class='btn btn-danger delete-order-button'>Hủy đơn hàng</button>";
                                            read_orders_html+="</div>";
                                        read_orders_html+="</form>";
                                    read_orders_html+="</div>";
                                read_orders_html+="</div>";
                            read_orders_html+="</div>";
                        read_orders_html+="</tr>";
            });
            read_orders_html+="</tbody>";
        read_orders_html+="</table>";
    read_orders_html+="</div>";
        if(data.paging){
        read_orders_html+="<ul class='pagination'>";
     
            // first page
            if(data.paging.first!=""){
                read_orders_html+="<li class='page-item'><a data-page='" + data.paging.first + "'>First Page</a></li>";
            }
     
            // loop through pages
            $.each(data.paging.pages, function(key, val){
                var active_page=val.current_page=="yes" ? "class='active'" : "";
                read_orders_html+="<li class='page-item' " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
            });
     
            // last page
            if(data.paging.last!=""){
                read_orders_html+="<li class='page-item'><a data-page='" + data.paging.last + "'>Last Page</a></li>";
            }
        read_orders_html+="</ul>";
        }   
    

    
    // inject to 'page-content' of our app
    $("#app").html(read_orders_html);
}


// old order list html
function readOldOrdersTemplate(data, keywords){
 
    var read_orders_html="";

    read_orders_html+="<div class='row tab'>";
        read_orders_html+="<div class='col-sm-4'>";
            read_orders_html+="<button type='button'  class='btn btn-success' id='new_order'>Đĩa mới</button>";
            read_orders_html+="<button type='submit' class='btn btn-primary' id='old_order'>Đĩa cũ</button>";
        read_orders_html+="</div>";
        // search orders form
        read_orders_html+="<form class='col-sm-4' id='search-order-form' action='#' method='post'>";
        read_orders_html+="<div >";
            read_orders_html+="<span style='margin-top: 5px;margin-bottom: 7px;display: flex;'>";
                read_orders_html+="<input class='form-control input_search' type='search' placeholder='Search' value='" + keywords + "' name='keywords' aria-label='Search'>";
                read_orders_html+="<i style='margin-top: 7px;cursor: pointer;margin-left: 5px;color: orange;font-size: 15px;' class='fas fa-search search'>";
                read_orders_html+="</i>";
            read_orders_html+="</span>";
        read_orders_html+="</div>";
        read_orders_html+="</form>";
    read_orders_html+="</div>";
    // Quản lý sản phẩm  ========================================================-->
    read_orders_html+="<div id='handling-order'>";
    read_orders_html+="</div>";
    read_orders_html+="<div id='order_list'>";
        read_orders_html+="<div class='hover-effect' style='height: 50px'>";
            read_orders_html+="<h2 style='text-align: center;'>Quản lý đơn hàng đĩa cũ</h2>";
        read_orders_html+="</div>";
        read_orders_html+="<table class='table table-hover'>";
            read_orders_html+="<thead>";
                read_orders_html+="<tr>";
                    read_orders_html+="<th scope='col'>Mã đơn hàng</th>";
                    read_orders_html+="<th scope='col'>Người bán</th>";
                    read_orders_html+="<th scope='col'>Người mua</th>";
                    read_orders_html+="<th scope='col'>Tổng tiền</th>";
                    read_orders_html+="<th scope='col'>Địa chỉ</th>";
                    read_orders_html+="<th scope='col'>Số điện thoại</th>";
                    read_orders_html+="<th scope='col'>Ngày mua hàng</th>";
                    read_orders_html+="<th scope='col'>Ghi chú</th>";
                    read_orders_html+="<th scope='col'>Trạng thái</th>";
                    read_orders_html+="<th scope='col'>Chi tiết</th>";
                read_orders_html+="</tr>";
            read_orders_html+="</thead>";
            read_orders_html+="<tbody>";
            $.each(data.records, function(key, val) {
                        read_orders_html+="<tr valign='top'>";
                            read_orders_html+="<th scope='row'>"+ val.order_id +"</th>";
                            read_orders_html+="<td>"+ val.seller +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.customer_name +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.total_money +"</td>";
                            read_orders_html+="<td>"+ val.customer_add +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.customer_phone +"</td>";
                            read_orders_html+="<td style='text-align: center;'>"+ val.order_date +"</td>";
                            read_orders_html+="<td><textarea class='form-control' rows='1'>"+ val.note +"</textarea></td>";
                            if (val.status =="Bị hủy") {
                                read_orders_html+="<td style='text-align: center;color:red;'>"+ val.status +"</td>";
                            }else{
                                read_orders_html+="<td style='text-align: center;color:green'>"+ val.status +"</td>";
                            }
                            read_orders_html+="<td><button type='button' class='btn btn-light' data-toggle='modal' data-target='#ModalCenter"+ val.order_id +"' name='"+ val.order_id +"'>Chi tiết</button></td>";
                            read_orders_html+="<div class='modal fade' id='ModalCenter"+ val.order_id +"' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
                                read_orders_html+="<div class='modal-dialog modal-dialog-centered' role='document'>";
                                    read_orders_html+="<div class='modal-content'>";
                                        read_orders_html+="<div class='modal-header'>";
                                            read_orders_html+="<h5 class='modal-title' id='exampleModalLongTitle'>Chỉnh tiết đơn hàng";
                                            read_orders_html+="<input type='text' class='form-control' name='order_id' value='"+ val.order_id +"' readonly='true'></h5>";
                                            read_orders_html+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                read_orders_html+="<span aria-hidden='true'>&times;</span>";
                                            read_orders_html+="</button>";
                                        read_orders_html+="</div>";
                                        read_orders_html+="<form method='post'>";
                                            read_orders_html+="<div class='modal-body'>";
                                                // read_orders_html+="<p>order_name : </p><input type='text' class='form-control' name='order_name' value='"+ val.customer_name +"'>";
                                                // read_orders_html+="<p>price_buy : </p><input type='text' class='form-control' name='price_buy' value='"+ val.price +"'>";
                                                // read_orders_html+="<p>description : </p><input type='text' class='form-control' name='description' value='"+ val.description +"'>";
                                                // read_orders_html+="<p>category_id : </p><input type='text' class='form-control' name='category_id' value='"+ val.category_id +"'>";
                                                // read_orders_html+="<p>quantity : </p><input type='text' class='form-control' name='quantity' value='"+ val.quantity +"'>";
                                                // read_orders_html+="<p>distributor_name : </p><input type='text' class='form-control' name='distributor_name' value='"+ val.distributor +"'>";
                                                // read_orders_html+="<p>";
                                                // read_orders_html+="order_status : </p><select  class='form-control' name='order_status' value='"+ val.status +"'>";
                                                //     read_orders_html+="<option value='Mới'>Mới</option>";
                                                //     read_orders_html+="<option value='Cũ'>Cũ</option>";
                                                //     read_orders_html+="<option value='Hot'>Hot</option>";
                                                //     read_orders_html+="<option value='Quá cũ'>Quá cũ</option>";
                                                // read_orders_html+="</select>";
                                            read_orders_html+="</div>";
                                            read_orders_html+="<div class='modal-footer'>";
                                                read_orders_html+="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                read_orders_html+="<button type='submit' data-id='"+val.order_id+"' name='oldorder' class='btn btn-primary update-order-button'>Xác nhận giao hàng</button>";
                                                read_orders_html+="<button type='submit' data-id='"+val.order_id+"' name='deloldorder' class='btn btn-danger delete-order-button'>Hủy đơn hàng</button>";
                                            read_orders_html+="</div>";
                                        read_orders_html+="</form>";
                                    read_orders_html+="</div>";
                                read_orders_html+="</div>";
                            read_orders_html+="</div>";
                        read_orders_html+="</tr>";
            });
            read_orders_html+="</tbody>";
        read_orders_html+="</table>";
    read_orders_html+="</div>";
        if(data.paging){
        read_orders_html+="<ul class='pagination'>";
     
            // first page
            if(data.paging.first!=""){
                read_orders_html+="<li class='page-item'><a data-page='" + data.paging.first + "'>First Page</a></li>";
            }
     
            // loop through pages
            $.each(data.paging.pages, function(key, val){
                var active_page=val.current_page=="yes" ? "class='active'" : "";
                read_orders_html+="<li class='page-item' " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
            });
     
            // last page
            if(data.paging.last!=""){
                read_orders_html+="<li class='page-item'><a data-page='" + data.paging.last + "'>Last Page</a></li>";
            }
        read_orders_html+="</ul>";
        }   
    

    
    // inject to 'page-content' of our app
    $("#app").html(read_orders_html);
}