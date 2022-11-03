@extends('layout.master')
@section('main')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">Trang chủ</a></li>
                            <li>/</li>
                            <li>Đăng nhập</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="col-md-2">
    </div>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form method="POST">
                            @csrf
                            <p>
                                <label>Địa chỉ Email <span>*</span></label>
                                <input type="text" name="email" required>
                            </p>
                            <p>
                                <label>Mật khẩu <span>*</span></label>
                                <input type="password" name="password" required>
                            </p>
                            <div class="login_submit">
                                <a href="#">Bạn quên mật khẩu?</a>
                                <label for="remember">
                                    <input id="remember" name="remember_token" type="checkbox">
                                    Ghi nhớ
                                </label>
                                <button type="submit">Đăng nhập</button>
                            </div>
                            <p style="margin-top: 1rem">Bạn chưa có tài khoản? <a style="color: #ff6a28" href="{{url('/register')}}">Đăng ký ngay</a></p>

                        </form>
                    </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
@endsection
