@extends('layout.master')
@section('main')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">Trang chủ</a></li>
                            <li>/</li>
                            <li>Đăng ký</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                </div>
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Đăng ký</h2>
                        <form method="POST">
                            @csrf
                            <p>
                                <label>Tên tài khoản<span>*</span></label>
                                <input type="text" name="name">
                                @error('name')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </p>
                            <p>
                                <label>Địa chỉ Email<span>*</span></label>
                                <input type="text" name="email">
                                @error('email')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                             </p>
                            <p>
                                <label>Họ và Tên<span>*</span></label>
                                <input type="text" name="full_name">
                                @error('full_name')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </p>
                            <p>
                                <label>Địa chỉ <span>*</span></label>
                                <input type="text" name="address">
                                @error('address')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </p>
                            <p>
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="phone">
                                @error('phone')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </p>
                             <p>
                                <label>Mật khẩu <span>*</span></label>
                                <input type="password" name="password">
                                 @error('password')
                                 <span style="color:red">{{$message}}</span>
                                 @enderror
                             </p>
                            <p>
                                <label>Nhập lại mật khẩu <span>*</span></label>
                                <input type="password" name="password_confirmation">
                                @error('password')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </p>
                            <div></div> Bạn đã có tài khoản ->  <a style="color: red" href="{{url('/login')}}">Đăng nhập</a>
                            <div class="login_submit">
                                <button type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
@endsection
