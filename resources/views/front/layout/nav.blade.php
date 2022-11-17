<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('uploads/logo.png')}}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('uploads/logo.png')}}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">        
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">Home</a>
                        </li>
                        @if ($global_page_data->about_status == 1)
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">{{$global_page_data->about_heading}}</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Regular Couple Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Delux Couple Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Regular Double Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Delux Double Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Premium Suite</a>
                                </li>
                            </ul>
                        </li>

                        @if ($global_page_data->photo_gallery_status == 1 || $global_page_data->video_gallery_status == 1)

                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                            <ul class="dropdown-menu">
                                @if ($global_page_data->photo_gallery_status == 1)
                                <li class="nav-item">
                                    <a href="{{route('photo_gallery')}}" class="nav-link">{{$global_page_data->photo_gallery_heading}}</a>
                                </li>
                                @endif
                                @if ($global_page_data->video_gallery_status == 1)
                                <li class="nav-item">
                                    <a href="{{route('video_gallery')}}" class="nav-link">{{$global_page_data->video_gallery_heading}}</a>
                                </li>
                                @endif
                            </ul>
                        </li>

                        @endif

                        <li class="nav-item">
                            <a href="{{route('blog')}}" class="nav-link">Blog</a>
                        </li>
                        @if ($global_page_data->contact_status == 1)
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">{{$global_page_data->contact_heading}}</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>