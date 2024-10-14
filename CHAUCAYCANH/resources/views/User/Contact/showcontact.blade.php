<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chậu - Cây Cảnh</title>
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

<body>

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
									$shipping_id = Session::get('ShipID');
								//Kiểm tra xem CusID có tồn tại (không null) và ShipID là null. Nếu đúng, hiển thị liên kết đến trang /checkout.
									if($customer_id !== null && $shipping_id==null  ){
								?>
									<li><a href="{{ URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php 
								//Kiểm tra xem CusID có tồn tại (không null) và ShipID cũng không null. Nếu đúng, hiển thị liên kết đến trang /payment.
									} elseif ($customer_id !== null && $shipping_id!== null  ) {
								?>
									<li><a href="{{ URL::to('/payment')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php
								//Nếu cả hai điều kiện trên không thỏa mãn, hiển thị liên kết đến trang /login_checkout
									}else{
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
								<li ><a href="{{ URL::to('/shop')}}">Sản phẩm</a>
                                    {{-- <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										
                                    </ul> --}}
                                </li> 
								<li ><a href="{{ URL::to('/blog')}}">Tin tức</a>
                                   
                                </li> 
								<li><a href="{{ URL::to('/showcart')}}">Giỏ hàng</a></li>
								<li><a href="{{ URL::to('/contact')}}">Liên hệ</a></li>
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
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">LIÊN HỆ <strong>VỚI CHÚNG TÔI</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d298.6564920014077!2d105.92646608019889!3d20.943753758307427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135af32e37074cb%3A0xaa1fab073343c4b2!2zQ8ahIFPhu58gU-G6o24gWHXhuqV0IENo4bqtdSBDw6J5IEPhuqNuaCBHaWFuZyBWxINu!5e1!3m2!1svi!2s!4v1700492872793!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            					height="400" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">THÔNG TIN CỦA BẠN</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Họ và tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Địa chỉ">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Lời nhắn của bạn"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="GỬI">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">THÔNG TIN LIÊN HỆ</h2>
	    				<address>
	    					<p>SHOP CHẬU - CÂY CẢNH </p>
							<p>Địa chỉ: Thị trấn Văn Giang-Văn Giang-Hưng Yên</p>
							<p>Điện thoại: +84 81411440</p>
							<p>Email: nguyenbaochau261203.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">MẠNG XÃ HỘI</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Chậu</span>-Cây cảnh</h2>
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="./uploads/slide2.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Hướng dẫn chăm sóc cây</p>
								<h2>24 MAY 2024</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="./uploads/slide5.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Work shop từ cây xanh</p>
								<h2>24 MAY 2024</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="./uploads/slide4.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Tại sao bạn nên trồng cây xanh trong nhà?</p>
								<h2>24 MAY 2024</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="./uploads/slide3.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Vai trò của cây xanh</p>
								<h2>24 MAY 2024</h2>
							</div>
						</div>
					</div>
					{{-- <div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỏi đáp online</a></li>
								<li><a href="#">Liên hệ với chúng tôi</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Work Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trồng cây</a></li>
								<li><a href="#">Trang trí từ cây cảnh</a></li>
								
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Liên hệ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin cửa hàng</a></li>
								
								<li><a href="#">Địa chỉ</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Liên hệ với Shop</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Email của bạn" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>
									Nhận thông tin cập nhật mới nhất từ <br />trang web của chúng tôi và tự cập nhật đến bạn...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2024 CHAU-CAY CANH</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="https://web.facebook.com/nguyenbaochau2612">Ch@u</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

  
    <script src="{{asset('./js/jquery.js')}}"></script>
	<script src="{{asset('./js/bootstrap.min.js')}}"></script>
	<script src="{{asset('./js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('./js/price-range.js')}}"></script>
    <script src="{{asset('./js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('./js/main.js')}}"></script>
</body>
</html>