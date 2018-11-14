$(".quantity-cart").change(function(){
    var soluong = $(this).val();
    var id_pro = $(this).attr("data-quatity");
    alert(id_pro);
    $.ajax({
        url : "handling-cart.php", // gửi ajax đến file handling-cart.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : {soluong : soluong , id_pro : id_pro
       },
       success : function (result){
            location.reload();
        }
    });
});
$(".del").click(function(){
	var id_pro = $(this).attr('data-quatity');
	$.ajax({
        url : "delete-cart.php", // gửi ajax đến file handling-cart.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : { id_pro : id_pro
       },
       success : function (result){
            location.reload();
        }
    });
});
$(".reset").click(function(){
	var reset = 1;
	$.ajax({
        url : "delete-cart.php", // gửi ajax đến file handling-cart.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : { reset : reset
       },
       success : function (result){
            location.reload();
        }
    });
});
