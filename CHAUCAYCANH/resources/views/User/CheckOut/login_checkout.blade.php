<!DOCTYPE html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('./Admin/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('./Admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('./Admin/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('./Admin/css/font.css')}}" type="text/css"/>
<link href="{{asset('./Admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('./Admin/js/jquery2.0.3.min.js')}}"></script>

</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Đăng nhập</h2>
    <?php
        $message = Session::get('message');
        if($message){
            echo $message;
            Session::put('message',null);
        }   
    ?>

        <form action="{{URL::to('/login_customer')}}" method="POST">
            @csrf
            <input class="ggg" type="text" name="email_account" placeholder="Nhập email" required="" />
            <input class="ggg" type="password" name="password_account" placeholder="Nhập password" required="" />
            <span><input type="checkbox" />Nhớ mật khẩu</span>
            <h6><a href="#">Quên mật khẩu</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Đăng nhập" name="name">
        </form>
        
</div>

        <h3 style="text-align: center">Bạn chưa có tài khoản? Hãy tạo tài khoản</h3>
        
</div>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2>Đăng ký</h2>
        <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }   
        ?>
    
    <form action="{{URL::to('/add_customer')}}" method="POST">
        @csrf
        <input class="ggg" type="text" name="cus_name" placeholder="Họ và tên"/> 
        <input class="ggg"  type="text"   name="cus_phone" placeholder="Số điện thoại"/>
        <input class="ggg"  type="email"  name="cus_email" placeholder="Email"/>
        <input class="ggg"  type="password"  name="cus_password" placeholder="Mật khẩu"/>
        <div class="clearfix"></div>
        <input type="submit" value="Đăng Ký" name="name">
    </form>
            
    </div>
</div>
<script src="{{asset('./Admin/js/bootstrap.js')}}"></script>
<script src="{{asset('./Admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('./Admin/js/scripts.js')}}"></script>
<script src="{{asset('./Admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('./Admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('./Admin/js/jquery.scrollTo.js')}}"></script>
</body>
</html>

