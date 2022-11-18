<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin_home')}}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin_home')}}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_home')}}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/page/*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Page</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_about')}}"><i class="fa fa-angle-right"></i>About</a></li>

                    <li class="{{ Request::is('admin/page/terms') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_terms')}}"><i class="fa fa-angle-right"></i>Terms and Conditions</a></li>      
                    
                    <li class="{{ Request::is('admin/page/privacy') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_privacy')}}"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>                  

                    <li class="{{ Request::is('admin/page/contact') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_contact')}}"><i class="fa fa-angle-right"></i>Contact</a></li>    

                    <li class="{{ Request::is('admin/page/photo-galllery') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_photo_gallery')}}"><i class="fa fa-angle-right"></i>Photo gallery</a></li>    

                    <li class="{{ Request::is('admin/page/video-galllery') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_video_gallery')}}"><i class="fa fa-angle-right"></i>Video gallery</a></li>    

                    <li class="{{ Request::is('admin/page/faq') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_faq')}}"><i class="fa fa-angle-right"></i>FAQ</a></li>                      

                    <li class="{{ Request::is('admin/page/blog') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_blog')}}"><i class="fa fa-angle-right"></i>Blog</a></li>                         

                    <li class="{{ Request::is('admin/page/cart') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_cart')}}"><i class="fa fa-angle-right"></i>Cart</a></li>                         

                    <li class="{{ Request::is('admin/page/checkout') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_checkout')}}"><i class="fa fa-angle-right"></i>Checkout</a></li>                         

                    <li class="{{ Request::is('admin/page/payment') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_payment')}}"><i class="fa fa-angle-right"></i>Payment</a></li>                         
                    
                    <li class="{{ Request::is('admin/page/signup') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_signup')}}"><i class="fa fa-angle-right"></i>Sign Up</a></li>                         

                    <li class="{{ Request::is('admin/page/signin') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_page_signin')}}"><i class="fa fa-angle-right"></i>Sign In</a></li>    
                </ul>
            </li>

            <li class="{{ Request::is('admin/slide/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_slide_view')}}"><i class="fa fa-hand-o-right"></i> <span>Slide</span></a></li>

            <li class="{{ Request::is('admin/feature/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_feature_view')}}"><i class="fa fa-hand-o-right"></i> <span>Feature</span></a></li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_testimonial_view')}}"><i class="fa fa-hand-o-right"></i> <span>Testimonial</span></a></li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_post_view')}}"><i class="fa fa-hand-o-right"></i> <span>Posts</span></a></li>

            <li class="{{ Request::is('admin/photo/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_photo_view')}}"><i class="fa fa-hand-o-right"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('admin/video/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_video_view')}}"><i class="fa fa-hand-o-right"></i> <span>Video Gallery</span></a></li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_faq_view')}}"><i class="fa fa-hand-o-right"></i> <span>FAQ</span></a></li>



        </ul>
    </aside>
</div>