<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">111-222-3333</li>
                    <li class="email-text">contact@arefindev.com</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    @if($global_page_data->cart_status == 1)
                    <li class="menu"><a href="cart.html">{{$global_page_data->cart_heading}}</a></li>
                    @endif

                    @if($global_page_data->checkout_status == 1)
                    <li class="menu"><a href="checkout.html">{{$global_page_data->checkout_heading}}</a></li>
                    @endif
                    
                    <li class="menu"><a href="signup.html">Sign Up</a></li>
                    <li class="menu"><a href="login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>