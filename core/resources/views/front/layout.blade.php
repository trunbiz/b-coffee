<!doctype html>
<html lang="en" @if($rtl == 1) dir="rtl" @endif>

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    {{-- <meta http-equiv="x-ua-compatible" content="ie=edge"> --}}
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!--====== Title ======-->
    <title>{{$bs->website_title}}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('/assets/front/img/'.$bs->favicon)}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">

    <!--====== flaticon css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">

    <!--====== time and date picker ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.css')}}">

    <!--====== jquery timepicker ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery.timepicker.min.css')}}">


    <!--====== nice select css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/plugin.min.css')}}">

    <!--====== animate css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.min.css')}}">

    <!--====== fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/all.min.css')}}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}">

    <!--====== jQuery UI css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.min.css')}}">

    <!--====== Default css ======-->

    <link rel="stylesheet" href="{{asset('assets/front/css/default.css')}}">

    @if ($bs->is_tawkto == 1)
    <style>
    .back-to-top {
        bottom: 50px;
    }
    .back-to-top.show {
        right: 20px;
    }
    </style>
    @endif
    @if (count($langs) == 0)
    <style media="screen">
    .support-bar-area ul.social-links li:last-child {
        margin-right: 0px;
    }
    .support-bar-area ul.social-links::after {
        display: none;
    }
    </style>
    @endif
    @if($bs->feature_section == 0)
    <style media="screen">
    .hero-txt {
        padding-bottom: 160px;
    }
    </style>
    @endif
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/styles.php?color='.str_replace('#','',$bs->base_color)) }}">
    @if ($rtl == 1)
    <link rel="stylesheet" href="{{asset('assets/front/css/rtl.css')}}">
    @endif

    @yield('style')

</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div id="preloader">
        <div class="loader revolve">
            <div class="layer">
                <div class="round"></div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="support-bar">
                            <div class="row">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <div class="infos">
                                        <span><i class="fas fa-envelope-open-text"></i><a>{{convertUtf8($bs->support_email)}}</a></span>
                                        <span><i class="fas fa-phone-alt"></i><a>{{convertUtf8($bs->support_phone)}}</a></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6 col-12">
                                    <div class="links">
                                        @if (!empty($socials))
                                        <ul class="social-links">
                                            @foreach ($socials as $social)
                                            <li><a href="{{$social->url}}" target="_blank"><i class="{{$social->icon}}"></i></a></li>
                                            @endforeach
                                        </ul>
                                        @endif

                                        @if (!empty($currentLang))
                                            <div class="language">
                                                <a class="language-btn" href="#"><i class="fas fa-globe-asia"></i> {{convertUtf8($currentLang->name)}}</a>
                                                <ul class="language-dropdown">
                                                    @foreach ($langs as $key => $lang)
                                                    <li><a href='{{ route('changeLanguage', $lang->code) }}'>{{convertUtf8($lang->name)}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @guest
                                        <ul class="login">
                                            <li><a href="{{route('user.login')}}">{{__('Login')}}</a></li>
                                        </ul>
                                        @endguest
                                        @auth
                                        <ul class="login">
                                            <li><a href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a></li>
                                        </ul>
                                        @endauth
                                        <div id="cartQuantity" class="cart">
                                            <a href="{{route('front.cart')}}">
                                                <i class="fas fa-cart-plus"></i>
                                                @php
                                                    $itemsCount = 0;
                                                    $cart = session()->get('cart');
                                                    if(!empty($cart)){
                                                        foreach($cart as $p){
                                                            $itemsCount += $p['qty'];
                                                        }
                                                    }
                                                @endphp
                                                <span class="cart-quantity">{{$itemsCount}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{route('front.index')}}">
                                <img src="{{asset('assets/front/img/'.$bs->logo)}}" alt="Logo">
                            </a> <!-- logo -->

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFive" aria-controls="navbarFive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button> <!-- navbar toggler -->
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarFive">
                                <ul class="navbar-nav m-xl-auto mr-auto">

                                    <li class="nav-item"><a class="page-scroll" href="{{route('front.index')}}">{{__('Home')}}</a>
                                    </li>

                                    @if ($bs->menu_page == 1 || $bs->menu_page1 == 1)
                                    <li class="nav-item"><a class="page-scroll" href="{{route('front.product')}}">{{__('Menu')}}</a>
                                    @endif

                                    @if ($bs->item_page == 1)
                                    <li class="nav-item"><a class="page-scroll" href="{{route('front.items')}}">{{__('Items')}}</a>
                                    @endif


                                    @if ($bs->gallery_page == 1 || $bs->gallery_page == 1 || App\Models\Page::where('language_id',$currentLang->id)->where('status',1)->count() > 0)
                                    <li class="nav-item"><a class="page-scroll" href="#">{{$bs->pages_p_link}} <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach (App\Models\Page::where('language_id',$currentLang->id)->where('status',1)->orderBy('serial_number', 'ASC')->get() as $page)
                                            <li><a href="{{route('front.dynamicPage',[$page->slug,$page->id])}}">{{$page->name}}</a></li>
                                            @endforeach
                                            @if ($bs->gallery_page == 1)
                                            <li class="nav-item"><a class="page-scroll" href="{{route('front.gallery')}}">{{__('Gallery')}}</a>
                                            </li>
                                            @endif
                                            @if ($bs->team_page == 1)
                                            <li class="nav-item"><a class="page-scroll" href="{{route('front.team')}}">{{__('Team')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif

                                    @if ($bs->blog_page == 1)
                                    <li class="nav-item"><a class="page-scroll" href="{{route('front.blogs')}}">{{__('Blogs')}}</a>
                                    </li>
                                    @endif

                                    @if ($bs->contact_page == 1)
                                    <li class="nav-item"><a class="page-scroll" href="{{route('front.contact')}}">{{__('Contact')}}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="navbar-btns d-flex align-items-center">
                                <div class="header-times d-none d-md-inline-block">
                                    <i class="flaticon-time"></i>
                                    <span>{{__('Opening Time')}}</span>
                                    <p>{{$bs->office_time}}</p>
                                </div>
                                @if($bs->is_quote)
                                    <a class="main-btn main-btn-2 d-none d-sm-inline-block" href="{{route('front.reservation')}}">{{__('RESERVATION')}}</a>
                                @endif
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>

    <!--====== HEADER PART ENDS ======-->

    @yield('content')
 <!--    announcement banner section start   -->
 <a class="announcement-banner" href="{{asset('assets/front/img/'.$bs->announcement)}}"></a>
 <!--    announcement banner section end   -->


    <!--====== FOOTER PART START ======-->
    @if($bs->top_footer_section == 1)
        <footer class="footer-area footer-area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget-1">
                            <div class="header-times d-none d-md-inline-block">
                                <i class="flaticon-time"></i>
                                <h5>{{__('Opening Time')}}</h5>
                                <span>{{convertUtf8($bs->office_time)}}</span>
                            </div>
                            <p>{{convertUtf8($bs->footer_text)}}</p>
                            <ul>
                                @foreach ($socials as $social_link)
                                <li><a href="{{$social_link->url}}"><i class="{{$social_link->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 order-3 order-lg-2">
                        <div class="footer-widget-2 text-left text-sm-center @if(request()->routeIs('front.index')) pt-60 @endif">
                            <a href="{{route('front.index')}}"><img src="{{asset('assets/front/img/' . $bs->footer_logo)}}" alt="logo"></a>
                            <ul class="pt-25">
                                @php
                                    $blinks = App\Models\Bottomlink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                                @endphp
                                @foreach ($blinks as $blink)
                                <li><a href="{{$blink->url}}">{{convertUtf8($blink->name)}}</a></li>
                                @endforeach
                            </ul>
                            @if($be->footer_bottom_img)
                            <a class="pt-30" href="javascript:;">
                                <img src="{{asset('assets/front/img/'.$be->footer_bottom_img)}}" alt="">
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                        <h3 class="subscribe-title">{{__('Subscribe Here')}}</h3>
                        <form id="subscribeForm" action="{{route('front.subscribe')}}" method="post" class="subscribe-form">
                            @csrf
                            <div class="subscribe-inputs">
                                <input name="email" type="text" placeholder="{{__('Enter Your Email')}}">
                                <button type="submit"><i class="far fa-paper-plane"></i></button>
                            </div>
                            <p id="erremail" class="text-danger mb-0 err-email"></p>
                        </form>
                        <div class="footer-widget-3">
                            <ul>
                                @php
                                    $ulinks = App\Models\Ulink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                                @endphp

                                @foreach ($ulinks as $ulink)
                                <li><a href="{{$ulink->url}}">+ {{convertUtf8($ulink->name)}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
    @if($bs->copyright_section ==1)
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright d-block justify-content-center d-md-flex">
                        {!! nl2br(replaceBaseUrl(convertUtf8($bs->copyright_text)))  !!}
                        <a class="footer-hover" href="{{route('front.index')}}">B Coffee</a>
                        <span style="margin-left: 5px">All rights reserved</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!--====== FOOTER PART ENDS ======-->

    <!--====== GO TO TOP PART START ======-->

    <style>
        .cart span {
            position: absolute;
            top: -10px;
            right: -16px;
            display: inline-block;
            background-color: #000000;
            color: #fff;
            border-radius: 50%;
            height: 20px;
            width: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 12px;
        }
    </style>

    <div style="position: fixed; top: 50%; right: 40px; display: none" class="cart" id="cartQuantity2">
        <div class="animation-cartQuantity2" >
            <a class="animation-a" href="{{route('front.cart')}}">
                <i class="fas fa-cart-plus"></i>
                @php
                    $itemsCount = 0;
                    $cart = session()->get('cart');
                    if(!empty($cart)){
                        foreach($cart as $p){
                            $itemsCount += $p['qty'];
                        }
                    }
                @endphp
                <span class="cart-quantity">{{$itemsCount}}</span>
            </a>
        </div>
    </div>

    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fa fa-angle-double-up"></i>
                    <i class="fa fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>

    <!--====== GO TO TOP PART ENDS ======-->


    {{-- Cookie alert dialog start --}}
    <div class="cookie">
        @include('cookieConsent::index')
    </div>
    {{-- Cookie alert dialog end --}}

    @php
    $is_announcement = $bs->is_announcement;
    $announcement_delay = $bs->announcement_delay;
    @endphp
    <script>
        "use strict";
        var lat = '{{$bs->latitude}}';
        var lng = '{{$bs->longitude}}';
        var is_announcement = {{ $is_announcement }};
        var announcement_delay = {{ $announcement_delay }};
        var rtl = {{ $rtl }};
        var position = "{{$be->base_currency_symbol_position}}";
        var symbol = "{{$be->base_currency_symbol}}";
    </script>



    <!--====== jquery js ======-->
    <script src="{{asset('assets/front/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/front/js/vendor/jquery.3.2.1.min.js')}}"></script>

    {{-- <!--====== Google Recaptcha ======-->
    <script src="{{asset('assets/front/js/recaptcha-api.js')}}?" async defer></script> --}}

    <!--====== Bootstrap js ======-->
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>

    <!--====== jQuery UI ======-->
    <script src="{{asset('assets/front/js/jquery.ui.js')}}"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('assets/front/js/slick.min.js')}}"></script>

    <!--====== Isotope js ======-->
    <script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{asset('assets/front/js/imagesloaded.pkgd.min.js')}}"></script>

    <!--====== wow js ======-->
    <script src="{{asset('assets/front/js/wow.min.js')}}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{asset('assets/front/js/jquery.nice-select.min.js')}}"></script>

    <!--====== Magnific Pz js ======-->
    <script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/front/js/toastr.min.js')}}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{asset('assets/front/js/toastr.min.js')}}"></script>

    <!--====== time and date picker js ======-->
    <script src="{{asset('assets/front/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/front/js/jquery.timepicker.min.js')}}"></script>

    <!--====== Cart js ======-->
    <script src="{{asset('assets/front/js/cart.js')}}"></script>
    <!--====== Misc js ======-->
    <script src="{{asset('assets/front/js/misc.js')}}"></script>
    <!--====== Main js ======-->
    <script src="{{asset('assets/front/js/main.js')}}"></script>
    @yield('script')

    @if (session()->has('success'))
    <script>
       "use strict";
       toastr["success"]("{{__(session('success'))}}");
    </script>
    @endif

    @if (session()->has('warning'))
    <script>
       "use strict";
       toastr["warning"]("{{__(session('warning'))}}");
    </script>
    @endif

    @if (session()->has('error'))
    <script>
       "use strict";
       toastr["error"]("{{__(session('error'))}}");
    </script>
    @endif

{{-- <style>.fb-livechat, .fb-widget{display: none}.ctrlq.fb-button, .ctrlq.fb-close{position: fixed; right: 24px; cursor: pointer}.ctrlq.fb-button{z-index: 999; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff; width: 60px; height: 60px; text-align: center; bottom: 80px; border: 0; outline: 0; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; -ms-border-radius: 60px; -o-border-radius: 60px; box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16); -webkit-transition: box-shadow .2s ease; background-size: 80%; transition: all .2s ease-in-out}.ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1); box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px; border-radius: 50%;}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size: 13px;}</style><div class="fb-livechat"> <div class="ctrlq fb-overlay"></div><div class="fb-widget"> <div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/HQHLIFE" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div><div class="fb-credit"> <span style="color:#bec2c9;font-size:12px">Powered by </span><a href="https://www.facebook.com/HQHLIFE" target="_blank" rel="noffollow" >HQH</a> </div><div id="fb-root"></div></div><a href="https://m.me/HQHLIFE" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"> <div class="bubble">1</div><div class="bubble-msg">Bạn cần hỗ trợ?</div></a></div><script src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=true&version=v15.0"></script><script>jQuery(document).ready(function($){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script> --}}

{{-- <!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "111604517139201");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> --}}

</body>

</html>
