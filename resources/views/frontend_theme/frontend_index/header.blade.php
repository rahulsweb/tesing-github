<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
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
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/images/home/logo.png ') }}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            {{--  <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>  --}}

                            {{--  <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="col-sm-8">
                      


  <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
              
                                @if(Auth::guest())
                                <li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ route('frontend.register.create') }}"><i class="fa fa-lock"></i> Register</a></li>
                            @else
                          
                                   
                                  
                             
                           
                                  
                                         
                            <li class="dropdown"><a href="#"><i class="fa fa-user"></i>Account</a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('address') }}">Address Manage</a></li>
                                    <li><a href="{{ url('profile') }}">Profile</a></li>
                                    <li><a href="{{ url('order') }}">Orders</a></li>
                                </ul>
                            </li>
                         
                            <li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> Wishlist</a></li>  
                            <li><a href="{{ url('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            @if(Session::has('cart') )
                            <li><a href="{{ url('shopping/cart') }}"><i class="fa fa-shopping-cart"></i> Cart  
                         
                             @if(Session::get('cart')->totalQty > 0)
                                <span class="badge"> 
                                {{ Session::get('cart')->totalQty }}        
                                </span>
                                @else
                                <span class="badge" style="display:none"> 
                                        {{ Session::get('cart')->totalQty=0 }}

                                </span>
                            @endif 
                            </a>
                            
                          
                            
                            </li> 
                                         
                            @endif            
                                 <li class="dropdown"><a href="#"><i class="fa fa-user"></i> <strong class="text-danger">{{ ucfirst(auth()->user()->first_name)." ".ucfirst(auth()->user()->last_name)}}</strong></a>
                                    <ul role="menu" class="sub-menu">
                                        <li>     <a href="{{ route('frontend.logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <strong><span >Logout</span></strong>
                                            </a>
    
                                            <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form></li>
                                      

                                        
                                        
                                    </ul>
                                </li>
                                         
                                         
                                       
                              
                             
                                
                            @endif


                               
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
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
                                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="">Products</a></li>
                                        {{--  <li><a href="product-details.html">Product Details</a></li>  --}}
                                        <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                        <li><a href="{{ url('shopping/cart') }}">Cart</a></li>

                                        
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
                                {{--  <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  --}}
                                {{--  <li><a href="404.html">404</a></li>  --}}
                                {{--  <li><a href="contact-us.html">Contact</a></li>  --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
  