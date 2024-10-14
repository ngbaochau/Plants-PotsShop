<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Chậu - Cây Cảnh</title>
    <link href="{{asset('./css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('./css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('./css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('./css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('./css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('./css/main.css')}}" rel="stylesheet">
	<link href="{{asset('./css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head><!--/head-->
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>+84 81411440</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>nguyenbaochau261203@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ URL::to('/index')}}"><img src="{{ URL::to('images/home/logo.png') }}" alt="" />

                    </div>
                    
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            $name = Session::get('CusName');
                        ?>
                        @if($name)
                            <li><a href="#"><i class="fa fa-user"></i>{{ $name }}</a></li>
                        @else
                            <li><a href="{{ route('login_checkout') }}"><i class="fa fa-user"></i>Tài khoản</a></li>
                        @endif
                        
                            <?php
                                $customer_id =  Session::get('CusID');
                            
                                if($customer_id !== null){
                            ?>
                                <li><a href="{{ URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                            <?php 
                                } else {
                            ?>
                                <li><a href="{{ URL::to('/login_checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                            <?php
                                }
                            ?>
                            
                            
                            
                            
                            <li><a href="{{ URL::to('/showcart')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                            <?php
                                $customer_id =  Session::get('CusID');
                            
                                if($customer_id !== null){
                            ?>
                                <li><a href="{{ URL::to('/logout_checkout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
                            <?php 
                                } else {
                            ?>
                                <li><a href="{{ route('login_checkout') }}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                            <?php
                                }
                            ?>

                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ URL::to('/index')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                {{-- <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    
                                </ul> --}}
                            </li> 
                            <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                               
                            </li> 
                            <li><a href="{{ URL::to('/showcart')}}">Giỏ hàng</a></li>
                            <li><a href="contact-us.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action="{{ URL::to('/search')}}" method="POST">
                        @csrf
                        <div class="search_box pull-right">
                            <input type="text" name="key_submit" placeholder="Tìm kiếm sản phẩm">
                            <span class="search_icon">
                                <button type="submit" name="search_items" class="btn btn-default btn-sm">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>CHẬU</span>-CÂY CẢNH</h1>
                                <h2>Cây cảnh trong nhà </h2>
                                <p>Cây cảnh trong nhà là những loại cây được trồng và chăm sóc trong không gian bên trong nhà, thường là trong các chậu hoặc lọ đất. Đây không chỉ là một phần của trang trí nội thất mà còn mang lại nhiều lợi ích cho sức khỏe và tinh thần của con người. </p>
                                <button type="button" class="btn btn-default get">Xem ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ URL::to('images/home/caybangsingapore1.jpg') }}" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>CHẬU</span>-CÂY CẢNH</h1>
                                <h2>Thiết kế độc quyền</h2>
                                <p>Chậu cây cảnh là một phần không thể thiếu trong trang trí nội thất và trang trí không gian sống hiện đại. Đây không chỉ là một phần của trang trí mà còn mang lại nhiều lợi ích khác nhau cho sức khỏe và tinh thần của con người. </p>
                                <button type="button" class="btn btn-default get">Xem ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ URL::to('images/home/chaugomvan.jpg') }}" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>CHẬU</span>-CÂY CẢNH</h1>
                                <h2>Cây trong văn phòng</h2>
                                <p> Để cây  trong văn phòng giúp làm sạch không khí bằng cách hấp thụ các chất độc hại như formaldehyd, benzen và ammonia từ các vật liệu xây dựng, thiết bị điện tử và sản phẩm làm sạch không khí. Điều này giúp cải thiện chất lượng không khí trong môi trường làm việc và giảm nguy cơ các vấn đề về sức khỏe như đau đầu,... </p>
                                <button type="button" class="btn btn-default get">Xem ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ URL::to('images/home/cayvanphong.jpg') }}" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png" class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/index')}}">Trang chủ</a></li>
              <li class="active">Thanh toán</li>
            </ol>
        </div><!--/breadcrums-->
       
        <div class="register-req">
            <p>Đăng nhập hoặc đăng ký để tiến hành thanh toán giỏ hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">          
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Địa chỉ nhận hàng</p>
                        <div class="form-one">
                            <form  method="POST">
                                @csrf
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên*" required>
                                <input type="email" name="shipping_email" class="shipping_email" placeholder="Email*" required>
                                <input type="tel" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại*" required>
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ*" required>
                                <textarea name="shipping_note" class="shipping_note" placeholder="Ghi chú"></textarea>

                                @if(Session::get('fee'))
                                 <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}" >
                                @else
                                <input type="hidden" name="order_fee" class="order_fee" value="30000" >
                                @endif
                               

                                <div class="form-group">
                                    <label for="district">Chọn hình thức thanh toán</label>
                                    <select class="form-control input-sm m-bot15 payment_select " name="payment_select" >
                                        <option value="0">Thẻ tín dụng</option>
                                        <option value="1">Thanh toán khi nhận hàng</option>
                                    </select>
                                </div>
                                <input type="button" value="XÁC NHẬN ĐƠN HÀNG" name="send_order" class="btn btn-primary btn-sm send_order" style="margin-top: 20px">
                                    {{-- <div class="payment-options">
                                            <span>
                                                <label><input name="payment_option" value="1"  type="checkbox"> Thẻ tín dụng/Ghi nợ</label>
                                            </span>
                                            <span>
                                                <label><input name="payment_option" value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
                                            </span>
                                            <span>
                                                <label><input name="payment_option" value="3" type="checkbox"> ApplePay</label>
                                            </span>
                                    </div> --}}
                            </form>
                            <form>
                            @csrf
                            <div class="form-group">
                                <label for="city">Chọn tỉnh thành</label>
                                <select class="form-control input-sm m-bot15 choose city" name="city_id" id="city">
                                    <option value="">--Chọn tỉnh thành--</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->CityID }}">{{ $city->CityName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">Chọn quận/huyện</label>
                                <select class="form-control input-sm m-bot15 choose district" name="district_id" id="district">
                                    <option value="">--Chọn quận/huyện--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ward">Chọn phường/xã</label>
                                <select class="form-control input-sm m-bot15 choose wards" name="ward_id" id="ward">
                                    <option value="">--Chọn phường/xã--</option>
                                </select>
                            </div>
                            <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery" style="margin-top: 20px">
                            
                        </form>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>

        <div class="table-responsive cart_info">
            <?php 
                $content =  Cart::content();
            ?>
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="description">Sản phẩm</td>
                    <td class="image">Hình ảnh</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng tiền </td>
                    <td class="total">Xóa</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach ($content as $sp)
                <tr>
                    <td class="cart_description">
                        <h4><a href="">{{ $sp->name }}</a></h4>
                    </td>
                    <td class="cart_product" >
                        <a href="">  <img src="./Admin/uploads/product/{{ $sp->options->image }}" width="90px" alt="" /></a>
                    </td>
                    <td class="cart_price">
                        <p>{{ number_format($sp->price) }} đ</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <form action="<?php echo e(URL::to('/update_sluongcart')); ?>" method="POST">
                            @csrf
                            {{-- <a class="cart_quantity_up" href=""> - </a> --}}
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $sp->qty }}"  size="2">
                            {{-- <a class="cart_quantity_down" href=""> + </a> --}}
                            <input type="hidden" value="{{ $sp->rowId}}" name="rowId_cart" class="form-control">
                            <input type="submit" value="Cập nhật" name="update_sluong" class="btn btn-default-sm" style="height: 28px;">
                        </form>
                        </div>
                       
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">
                            <?php
                            $subtotal = $sp->price * $sp->qty;
                            echo number_format($subtotal) . 'đ';

                        ?>                        
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{ URL::to('/delete_cart/'.$sp->rowId)}}">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Tạm tính: <span>{{ number_format((float) str_replace(',', '', Cart::subtotal()), 0, ',', '.') }}  VNĐ</span></li>

                        @if(Session::has('fee'))
                            <li >
                                <a class="cart_quantity_delete" href="{{ URL::to('/delete_fee')}}">
                                    <i class="fa fa-times"></i>
                                </a>
                                Phí vận chuyển:
                                <span>{{ number_format((float) Session::get('fee'), 0, ',', '.') }} VNĐ</span>
                            </li>
                        @endif

                        <li>Tổng tiền: <span>{{ number_format((float) str_replace(',', '', Cart::subtotal()) + (float) Session::get('fee'), 0, ',', '.') }} VNĐ</span></li>
                    
								
                        
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<!--Lấy ra thông tin đị chỉ -->
<script type="text/javascript">                       
    $(document).ready(function(){
        $('.choose').on('change', function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action == 'city'){
                result = 'district';
            } else if(action == 'district'){
                result = 'ward';
            }

            console.log('Action:', action);
            console.log('Ma ID:', ma_id);

            $.ajax({
                url: '{{ url("/select_delivery_checkout") }}',
                method: 'POST',
                data: { action: action, ma_id: ma_id, _token: _token },
                success: function(data){
                    console.log('Success:', data);
                    $('#' + result).html(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Có lỗi xảy ra khi tải dữ liệu. Vui lòng thử lại sau.');
                }
            });
        });
    });
</script>
<!--Tính phí vận chuyển-->
<script type="text/javascript">                       
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var city_id = $('.city').val();
            var district_id = $('.district').val();
            var wards_id = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(city_id == '' && district_id == '' && wards_id == ''  ){
                alert('Vui lòng nhập đầy đủ thông tin địa chỉ')
            }else{
                    $.ajax({
                        url: '{{ url("/calculate_fee") }}',
                        method: 'POST',
                        data: { city_id: city_id, district_id: district_id,wards_id:wards_id, _token: _token },
                        success: function(){
                           location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            alert('Có lỗi xảy ra khi tải dữ liệu. Vui lòng thử lại sau.');
                        }
                    });
            }     
        });
    });
</script>
<!--xác nhận đơn hàng-->
<script type="text/javascript">
$(document).ready(function(){
        $('.send_order').click(function(){
            var shipping_name  = $('.shipping_name').val();
            var shipping_email = $('.shipping_email').val();
            var shipping_phone = $('.shipping_phone').val();
            var shipping_address = $('.shipping_address').val();
            var shipping_note = $('.shipping_note').val();
            var shipping_method = $('.payment_select').val();
            var order_fee = $('.order_fee').val();
            var _token = $('input[name="_token"]').val();
           
                    $.ajax({
                        url: '{{ url("/confirm_order") }}',
                        method: 'POST',
                        data: { shipping_name: shipping_name, shipping_email: shipping_email,
                                shipping_phone:shipping_phone, shipping_address:shipping_address,
                                shipping_method:shipping_method,shipping_note:shipping_note,
                                order_fee:order_fee, _token: _token },
                        success: function(){
                           alert('Đặt hàng thành công');
                           window.location.href = "{{ url('/cash') }}";
                        }
                        
                    });   
        });
    });
</script>














<script src="{{asset('./js/jquery.js')}}"></script>
<script src="{{asset('./js/bootstrap.min.js')}}"></script>
<script src="{{asset('./js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('./js/price-range.js')}}"></script>
<script src="{{asset('./js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('./js/main.js')}}"></script>


</body>
</html>