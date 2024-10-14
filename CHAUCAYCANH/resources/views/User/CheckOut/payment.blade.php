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
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->
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
                        <a class="cart_quantity_delete" href="{{ URL::to('/delete_cart/'.$sp->rowId)}}"><i class="fa fa-times"></i></a>
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
    <h4 style="margin-left:100px;margin-top:-50px; font-size:20px">Chọn hình thức thanh toán</h4>
    <form action="{{URL::to('/order_place')}}" method="POST">
        @csrf
        <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1"  type="checkbox"> Thẻ tín dụng/Ghi nợ</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="checkbox"> ApplePay</label>
                </span>
                <input type="submit" value="ĐẶT HÀNG" name="order_place" class="btn btn-primary btn-sm" style="margin-top: 70px" >
            </div>
    </form>
    </div>
</section> <!--/#cart_items-->
<script src="{{asset('./js/jquery.js')}}"></script>
<script src="{{asset('./js/bootstrap.min.js')}}"></script>
<script src="{{asset('./js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('./js/price-range.js')}}"></script>
<script src="{{asset('./js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('./js/main.js')}}"></script>
</body>
</html>