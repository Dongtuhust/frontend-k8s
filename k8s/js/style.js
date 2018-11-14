
//sự kiện croll chuột tác động lên background phía sau
$(window).scroll(function(){
    var position = $(window).scrollTop();
    $(".background-deep").css("top",-position/7 + "px");
    // console.log(position);
});
//sự kiện hover over and out vào các thẻ
$(".new-card").hover(
    function(){
        // var url = "url('";
        url = $(this).attr('data-imgpro');
        // url += "')";
        var name = $(this).attr('data-name');
        var description = $(this).attr('data-description');
        if (description.length > 150 ) { description = description.substr(0,150); description += "..."}
        $(".new_product").css('backgroundImage', url);
        $(".card-view").css('backgroundImage', url);
        $(".img-title").text(name);
        $(".descripes").text(description);
    },
    function(){
        $(".new_product").css('backgroundImage', 'url("../image/img6.jpg")');
        $(".card-view").css('backgroundImage', 'url("../image/img6.jpg")');
        $(".img-title").text("The Devition");
        $(".descripes").text("Bộ phận The DivisionTM của Tom Clancy là một trải nghiệm RPG thực tế khiến cho thể loại này trở thành một thiết lập quân sự hiện đại lần đầu tiên");
    },
);
$(".hot-card").hover(
    function(){
        // var url = "url('";
        url = $(this).attr('data-imgpro');
        // url += "')";
        var name = $(this).attr('data-name');
        var description = $(this).attr('data-description');
        if (description.length > 150 ) { description = description.substr(0,150); description += "..."}
        $(".hot_product").css('backgroundImage', url);
        $(".card-view-2").css('backgroundImage', url);
        $(".img-title-hot").text(name);
        $(".descripes-hot").text(description);
    },
    function(){
        $(".hot_product").css('backgroundImage', 'url("../image/img5.jpg")');
        $(".card-view-2").css('backgroundImage', 'url("../image/img5.jpg")');
        $(".img-title-hot").text("Resident Evil 7");
        $(".descripes-hot").text("Tiếp theo Resident Evil 5 và Resident Evil 6 , Resident Evil 7 sẽ trở lại với rễ kinh dị sống còn của franchise, với sự nhấn mạnh về thăm dò");
    },
);
//sự kiện click button giỏ hàng
$(document).on('click', '.btn-buy-now', function() {
    //kiểm tra đăng nhập
    if ($("#home-content").attr('data-id')==0) {
        alert("Bạn chưa đăng nhập yêu cầu đăng nhập để mua hàng");
        window.location="login.php";
        return true;
    }

    //gửi ajax trả kết quả dialog giỏ hàng
    var id = $(this).attr('data-product');
    $.ajax({
        url : "cart.php", // gửi ajax đến file cart.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : {id : id
        },
        success : function (result){
            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
            // đó vào thẻ div có id = result
            $('#result').html(result);
        }
    });

    //bắt sự kiện click giỏ hàng tạo hiệu ứng bay
    if ($(this).hasClass('disable')) {return false;}
    $(document).find('.btn-buy-now').addClass('disable');
    var parent = $(this).parents('.card');
    var cart = $(document).find('#cartshop');
    var src = parent.find('img').attr('src');
    var parTop = parent.offset().top;
    var parLeft = parent.offset().left;
    $('<img/>',{
        class : 'img-fly',
        src : src
    }).appendTo('body').css({
        'top': parTop,
        'left': parseInt(parLeft) + parseInt(parent.width()) - 50
    });
    setTimeout(function(){
        $(document).find('.img-fly').css({
            'top': cart.offset().top,
            'left': cart.offset().left
        });
        setTimeout(function(){
            $(document).find('.img-fly').remove();
            $(document).find('.btn-buy-now').removeClass('disable');
        },1000);
    },500);
    // cart.find('#count-item').data('count') = parseInt(cart.find('#count-item').data('count')) +1 ;
    var d = parseInt(cart.find('#count-item').data('count')) +1;
    $("#count-item").attr("data-count",d);
    cart.find('#count-item').text(d+' Item').data('count', d);
});

//bắt sự kiện thay đổi số lượng sản phẩm trong giỏ hàng gửi ajax cập nhập lại giỏ hàng
$(".quantity-cart").change(function(){
    var soluong = $(this).val();
    var id_pro = $(this).attr("data-quatity");
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

//bắt sự kiện click button xóa sản phẩm trên giỏ hàng
$(".del").click(function(){
    var id_pro = $(this).attr('data-quatity');
    $.ajax({
        url : "delete-cart.php", // gửi ajax đến file delete-cart.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : { id_pro : id_pro
        },
        success : function (result){
            location.reload();
        }
    });
});

//bắt sự kiện click button làm mới lại giỏ hàng
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
//sự kiện click vào chuông thông báo notification
$(".notification").click(function(){
    var display = $(".box-notification").css("display");
    if (display == "none") {
        $(".box-notification").css({
            display : "block"
        });
    }else{
        $(".box-notification").css({
            display : "none"
        });
    }
});
//bắt sự kiện thay đổi hình thức thanh toán
// $(".radio-ship").change(function(){
//     $(".ship").attr("display","block");
//     $(."credit").attr("display","none");
// })
$(".radio-credit").change(function(){
    var display = $(".credit").css("display");
    if (display == "none") {
        $(".credit").css({
            display : "block"
        });
        $(".ship").css({
            display : "none"
        });
    }
})
$(".radio-ship").change(function(){
    var display = $(".ship").css("display");
    if (display == "none") {
        $(".ship").css({
            display : "block"
        });
        $(".credit").css({
            display : "none"
        });
    }
})
//xem ảnh treong trang chi tiết sản phẩm
$(".list-img-product").click(function(){
    var url = $(this).attr("data-img");
    $(".img-product").css({
        'backgroundImage': url
    });
})