<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +381 65 555 55 555</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@events.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook" title="Facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" title="Twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" title="Linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" title="Instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube" title="YouTube"></i></a></li>
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
                        <a href="/"><img src="{{ asset('images/frontend_images/logo_events.jpg') }}" alt="" /></a>
                    </div>
                    <!--<div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">                            
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-crosshairs"></i> Ticket Orders</a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if (empty(Auth::check()))
                                <li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i>Login</a></li> 
                            @else
                                <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>                                
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
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
                            <li><a href="/" class="active">Home</a></li>
                            <li><a href="/">Events Calendar</a></li>
                            <!--li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li> 
                                    <li><a href="checkout.html">Checkout</a></li> 
                                    <li><a href="cart.html">Cart</a></li>
                   
                                </ul>
                            </li--> 
                            <!--li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li--> 
                            <!--li><a href="404.html">404</a></li-->
                            <li><a href="/">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->