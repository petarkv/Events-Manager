<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="{{ asset('css/frontend_css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/frontend_css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/frontend_css/responsive.css') }}" rel="stylesheet">
	
	<!-- Password Strength -->
    <link href="{{ asset('css/frontend_css/passtrength.css') }}" rel="stylesheet">
    
    <!-- Awesome Icons 4.7.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('images/frontend_images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/frontend_images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/frontend_images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/frontend_images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/frontend_images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +381 65 555 55 555</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@events.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook" title="Facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter" title="Twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin" title="Linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-instagram" title="Instagram"></i></a></li>
								<li><a href=""><i class="fa fa-youtube" title="YouTube"></i></a></li>
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
							<a href="{{ url('/') }}"><img src="{{ asset('images/frontend_images/logo_events.jpg') }}" alt="" /></a>
						</div>
						<div class="btn-group pull-right"></div>						
					</div>					
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
	
	<section id="form" style="margin-top: 10px;"><!--form-->
        <div class="container">
            <div class="row">
    
        @if (Session::has('flash_message_error'))                
          <div class="alert alert-error alert-block" style="background-color: #f2dfd0;">
            <button type="button" class="close" data-dismiss="alert">×</button>                
            <strong>{!! session('flash_message_error') !!}</strong>                
          </div>
        @endif 
              
        @if (Session::has('flash_message_success'))                
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>                
            <strong>{!! session('flash_message_success') !!}</strong>                
          </div>
        @endif
    
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
						<form id="loginForm" name="loginForm" action="{{ url('/user-login') }}" method="POST">
							{{  csrf_field() }}
                            <input name="email" type="email" placeholder="Email Address" />
                            <input name="password" type="password" placeholder="Password" />
                            <!--span>
                                <input type="checkbox" class="checkbox"> 
                                Keep me signed in
                            </span-->
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form id="userRegisterForm" name="userRegisterForm" action="{{ url('/user-register') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="name" name="name" type="text" placeholder="Name"/>
                            <input id="surname" name="surname" type="text" placeholder="Surname"/>
                            <input id="username" name="username" type="text" placeholder="Username"/>
                            <input id="email" name="email" type="email" placeholder="Email Address"/>
                            <input id="myPassword" name="password" type="password" placeholder="Password"/>
                            <input id="repassword" name="repassword" type="password" placeholder="Retype Password"/>
                            <input type="file" id="avatar" name="avatar"/>
                            <button type="submit" class="btn btn-default">Signup</button> 
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
				
		<div class="footer-widget">
			<div class="container">
				<div class="row">

					<div class="col-sm-2" style="margin-right: 50px;">
						<div class="companyinfo" style="margin-top: -5px;">
							<h2><span>Upcoming</span>Events</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="{{ url('/page/help') }}">Contact Us</a></li>
								<li><a href="#">Online Tickets</a></li>								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Our Partners</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">SKC Bgd</a></li>
								<li><a href="#">Dom Omladine Bgd</a></li>								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Events</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">About Us</a></li>								
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 EVENTS Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="">Events Manager</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->	

  
    <script src="{{ asset('js/frontend_js/jquery.js') }}"></script>
	<script src="{{ asset('js/frontend_js/price-range.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.prettyPhoto.js') }}"></script>
	<script src="{{ asset('js/frontend_js/main.js') }}"></script>
	
	<!-- Login / Register Users -->
	<script src="{{ asset('js/frontend_js/jquery.validate.js') }}"></script>
	
	<!-- Password Strength -->
    <script src="{{ asset('js/frontend_js/passtrength.js') }}"></script>
</body>
</html>