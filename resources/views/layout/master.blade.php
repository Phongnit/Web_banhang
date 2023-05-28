<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
{{-- Css --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('fontend/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/fonts/fontawesome-webfont.woff2')}}">
    <link rel="stylesheet" href="{{asset('fontend/fonts/ionicons.ttf')}}">
    <link rel="stylesheet" href="{{asset('fontend/fonts/Simple-Line-Icons.woff2')}}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
{{-- EndCss --}}
    <style>
        .search_bar .search-ajax-result {
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- Main Wrapper Start -->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
        <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="welcome_text">
                           <ul>
                               <li><span>Giao hàng miễn phí: </span>Hãy tận dụng thời gian của chúng tôi để lưu lại sự kiện </li>
                               <li><span>Trả hàng miễn phí: </span> Đảm bảo sự hài lòng</li>
                           </ul>
                        </div>
                        <div class="top_right">
                            <ul>
                               <li class="top_links"><a href="#">Tài Khoản của tôi <i class="ion-chevron-down"></i></a>
                                   <ul class="dropdown_links">
                                       @if(Auth::user())
                                           @auth<li><a href="{{url('my-account')}}"> {{Auth::user()->name ?? 'None'}} </a></li>@endauth
                                           <li><a href="{{url('logout')}}">Đăng xuất</a></li>
                                       @else
                                           <li><a href="{{url('login')}}">Đăng nhập</a></li>
                                           <li><a href="{{url('register')}}">Đăng ký</a></li>
                                       @endif
                                   </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="search_bar">
                            <form action="#">
                                <input placeholder="Tìm kiếm..." class="input-search-ajax" type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                            <div class="search-ajax-result">
                            </div>
                        </div>
                        <div class="cart_area">
                            <div class="cart_link">
                                <a href="{{url('cart')}}"><i class="fa fa-shopping-basket"></i>Giỏ hàng {{session()->get('totalQuantity')}}</a>
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                    <a href="{{url('/')}}">Trang chủ</a>
                                </li>
                                <li class="{{ request()->is('shop') ? 'active' : '' }}">
                                    <a href="{{url('/shop')}}">Cửa hàng</a>
                                </li>
                                <li class="menu-item-has-children {{ request()->is('about') ? 'active' : '' }}">
                                    <a href="{{url('/about')}}">Chúng tôi</a>
                                </li>
                                <li class="menu-item-has-children {{ request()->is('contact') ? 'active' : '' }}">
                                    <a href="{{url('/contact')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> phongnit69@gmail.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
    </div>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <header class="header_area header_three">
        <!--header top start-->
        <div class="header_top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="welcome_text">
                            <ul>
                                <li><span>Giao hàng miễn phí:</span>Hãy tận dụng thời gian của chúng tôi để lưu lại sự kiện </li>
                                <li><span>Trả hàng miễn phí</span> Đảm bảo sự hài lòng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="top_right text-right">
                            <ul>
                               <li class="top_links"><a href="#">Tài khoản của tôi<i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_links">
                                        @if(Auth::check())
                                            @auth<li><a href="{{url('my-account',Auth::user()->id)}}"> {{Auth::user()->name ?? 'None'}} </a></li>@endauth
                                            <li><a href="{{url('logout')}}">Đăng xuất</a></li>
                                        @else
                                        <li><a href="{{url('login')}}">Đăng nhập</a></li>
                                        <li><a href="{{url('register')}}">Đăng ký</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->

        <!--header middel start-->
        <div class="header_middel">
            <div class="container-fluid">
                <div class="middel_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="search_bar">
                                <form action="#" class="form-search">
                                    <input placeholder="Tìm kiếm..." class="input-search-ajax" type="text" name="search">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                                <div class="search-ajax-result">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{asset('fontend/img/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart_area">
                                <div class="cart_link">
                                    <a href="{{url('cart')}}"><i class="fa fa-shopping-basket"></i>Giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="horizontal_menu">
                    <div class="left_menu">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/')}}">Trang chủ<i class="fa"></i></a>
                                    </li>
                                    <li class="mega_items"><a href="{{url('/shop')}}">Cửa hàng</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="logo_container">
                        <a href="{{url('/')}}"><img src="{{asset('fontend/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <div class="right_menu">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/about')}}">Chúng tôi</a></li>
                                    <li><a href="{{url('/contact')}}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu_inner">
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Trang chủ</a></li>
                                        <li class="{{ request()->is('shop') ? 'active' : '' }}"><a href="{{url('/shop')}}">Của hàng</a></li>
                                        <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{url('/about')}}">Chúng tôi</a></li>
                                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{url('/contact')}}">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>
    <!--header area end-->

<!-- Body-->
@yield('main')
<!-- Body End-->

    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widgets_container contact_us">
                            <h3>Liên hệ chúng tôi</h3>
                            <div class="footer_contact">
                                <p>Địa chỉ: 236, Đường Hoàng Quốc Việt , Phường Cổ Nhuế, Thành phố Hà Nội</p>
                                <p>Điện thoại: <a href="tel:+(+84)362682422">(+84) 362682422</a> </p>
                                <p>Email: <a href="mailto:phongnit69@gmail.com">phongnit69@gmail.com</a></p>
                                <ul>
                                    <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="youtube"><i class="fa fa-youtube"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Nhận những thông tin sản phẩm mới </h3>
                            <div class="newleter-content">
                                <p>Chất lượng tạo nên thương hiệu !</p>
                                 <div class="subscribe_form">
                                    <form id="mc-form" class="mc-form footer-newsletter" >
                                        <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                                        <button id="mc-submit">Đăng ký</button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div><!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--footer area end-->

<!-- JS
============================================ -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdWLY_Y6FL7QGW5vcO3zajUEsrKfQPNzI"></script>
<script  src="https://www.google.com/jsapi"></script>
<script src="{{asset('fontend/js/map.js')}}"></script>
<script src="{{asset('fontend/js/plugins.js')}}"></script>
<script src="{{asset('fontend/js/main.js')}}"></script>@yield('js')
<!-- end JS
============================================ -->
        <script>
            $('.search-ajax-result').hide();
            $('.input-search-ajax').keyup(function (){
                var _token = 'csrf';
                var _text = $(this).val();
                var _url = "{{url('uploads')}}";
                if(_text != '') {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/search?search='+_text,
                        type: 'GET',
                        success: function (res) {
                            console.table(res)
                            var _html = '';
                            for (var pro of res) {
                                var slug = convertToSlug(pro.name)
                                _html += '<div class="media">';
                                _html += '<a href="">';
                                _html += '<img width="60px" src="'+ _url + '/'+pro.images.path+'">';
                                _html += '</a>';
                                _html += '<div class="media-body">';
                                _html += '<h5 class="media heading" style="display:flex"><a href="{{url('shop/product')}}/'+pro.id+'-'+slug+'">'+pro.name+'</a></h5>';
                                _html += '</div>'
                                _html +='</div>'
                            }
                            $('.search-ajax-result').show(20);
                            $('.search-ajax-result').html(_html);
                        }
                    });
                } else{
                    $('.search-ajax-result').html('');
                    $('.search-ajax-result').hide();
                }
            })
            function convertToSlug(Text) {
                return Text.toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            }
        </script>
</body>

</html>
