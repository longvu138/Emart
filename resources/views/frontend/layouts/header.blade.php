 <!--? Preloader Start -->
 {{-- <div id="preloader-active">
     <div class="preloader d-flex align-items-center justify-content-center">
         <div class="preloader-inner position-relative">
             <div class="preloader-circle"></div>
             <div class="preloader-img pere-text">
                 <img src="/template/frontend/img/logo/logo.png" alt="">
             </div>
         </div>
     </div>
 </div> --}}
 <!-- Preloader Start -->
 <header>
     <!-- Header Start -->
     <div class="header-area">
         <div class="main-header header-sticky">
             <div class="container-fluid">
                 <div class="menu-wrapper">
                     <!-- Logo -->
                     <div class="logo">
                         <a href="/"><img src="/template/frontend/img/logo/logo.png" alt=""></a>
                     </div>
                     <!-- Main-menu -->
                     <div class="main-menu d-none d-lg-block">
                         <nav>
                             <ul id="navigation">
                                 <li><a href="index.html">Home</a></li>
                                 <li><a href="shop.html">shop</a></li>
                                 <li><a href="about.html">about</a></li>
                                 <li class="hot"><a href="#">Latest</a>
                                     <ul class="submenu">
                                         <li><a href="shop.html"> Product list</a></li>
                                         <li><a href="product_details.html"> Product Details</a></li>
                                     </ul>
                                 </li>
                                 <li><a href="blog.html">Blog</a>
                                     <ul class="submenu">
                                         <li><a href="blog.html">Blog</a></li>
                                         <li><a href="blog-details.html">Blog Details</a></li>
                                     </ul>
                                 </li>
                                 <li><a href="#">Pages</a>
                                     <ul class="submenu">
                                         <li><a href="login.html">Login</a></li>
                                         <li><a href="cart.html">Cart</a></li>
                                         <li><a href="elements.html">Element</a></li>
                                         <li><a href="confirmation.html">Confirmation</a></li>
                                         <li><a href="checkout.html">Product Checkout</a></li>
                                     </ul>
                                 </li>
                                 <li><a href="contact.html">Contact</a></li>
                             </ul>
                         </nav>
                     </div>
                     <!-- Header Right -->
                     <div class="header-right">
                         <ul>
                             @auth()
                                 <li class="pr-3"> <i class="fas fa-user"></i>
                                     {{ auth()->user()->full_name }}</span></li>
                                 <li class="pr-3"> <a class="text-danger"
                                         href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i></span>
                                     </a></span></li>

                             @else
                                 <li> <a class="mr-3" style="color: black" href="{{ route('user.auth') }}"><i class="fas fa-user"></i> Login</a>
                                 </li>
                             @endauth
                             
                         </ul>
                     </div>
                 </div>
                 <!-- Mobile Menu -->
                 <div class="col-12">
                     <div class="mobile_menu d-block d-lg-none"></div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->
 </header>
