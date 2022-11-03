@extends('layout.master')
@section('main')
    <!--slider area start-->
    <div class="slider_area slider_style home_three_slider owl-carousel">
        <div class="single_slider" data-bgimg="{{asset('fontend/img/slider/slider4.jpg')}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_one">
                            <img src="{{asset('fontend/img/slider/content3.png')}}" alt="">
                            <p>Bộ sưu tập quần áo mùa hè của chúng tôi đã trở lại đang được giảm giá một nửa</p>
                            <a href="{{url('/shop')}}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider" data-bgimg="{{asset('fontend/img/slider/slider5.jpg')}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_two">
                            <img src="{{asset('fontend/img/slider/content4.png')}}" alt="">
                            <p>Bộ sưu tập quần áo mùa hè của chúng tôi đã trở lại đang được giảm giá một nửa</p>
                            <a href="{{url('/shop')}}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider" data-bgimg="{{asset('fontend/img/slider/slider6.jpg')}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_three">
                            <img src="{{asset('fontend/img/slider/content5.png')}}" alt="">
                            <p>Bộ sưu tập quần áo mùa hè của chúng tôi đã trở lại đang được giảm giá một nửa</p>
                            <a href="{{url('/shop')}}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!--banner area start-->
    <div class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="{{url('/shop')}}"><img src="{{asset('fontend/img/bg/banner8.jpg')}}" alt="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="{{url('/shop')}}"><img src="{{asset('fontend/img/bg/banner9.jpg')}}" alt="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area bottom">
                        <div class="banner_thumb">
                            <a href="{{url('/shop')}}"><img src="{{asset('fontend/img/bg/banner10.jpg')}}" alt="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product section area start-->
    <section class="product_section womens_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm mới nhất của chúng tôi</h2>
                        <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach($products as $product)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{url('shop/product',$product->id)}}"><img src="uploads/{{$product->ProductImage[0]->path}}" width="10px;" alt=""></a>
                                        <a class="secondary_img" href="{{url('shop/product',$product->id)}}"><img src="uploads/{{$product->ProductImage[1]->path}}" alt=""></a>
                                        <div class="quick_button">
                                            <a href="{{url('shop/product',$product->id)}}" title="quick_view">Xem sản phẩm</a>
                                        </div>
                                        <div class="double_base">
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                            @if($product->discount != null)
                                                <div class="product_sale">
                                                    <span>-@php $sale = 100-($product->discount / $product->price) * 100; echo ceil($sale)@endphp%</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="">{{$product->name}}</a></h3>
                                        @if($product->discount != null)
                                        <span class="current_price">{{number_format($product->discount),0,0}}đ</span>
                                            <span class="old_price">{{number_format($product->price),0,0}}đ</span>
                                        @else
                                            <span>{{number_format($product->price),0,0}}đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product section area end-->

    <!--banner area start-->
    <section class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a class="primary_img" href="{{url('/shop')}}"><img src="{{asset('fontend/img/bg/banner11.jpg')}}" alt="#"></a>
                            <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product5.jpg" alt=""></a>
                            <div class="banner_content">
                                <h1>Handbag <br> Men’s Collection</h1>
                                <a href="{{url('/shop')}}">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="{{url('/shop')}}"><img src="{{asset('fontend/img/bg/banner12.jpg')}}" alt="#"></a>
                            <div class="banner_content">
                                <h1>Sneaker <br> Men’s Collection</h1>
                                <a href="{{url('/shop')}}">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product section area start-->
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm đang được giảm giá</h2>
                        <p>Sản phẩm ấn tượng và giảm giá nhiều nhất</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach($productsSale as $product)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="shop/product/{{$product->id}}"><img src="uploads/{{$product->ProductImage[0]->path}}" width="10px;" alt=""></a>
                                        <a class="secondary_img" href="shop/product/{{$product->id}}"><img src="uploads/{{$product->ProductImage[1]->path}}" alt=""></a>
                                        <div class="quick_button">
                                            <a href="shop/product/{{$product->id}}" title="quick_view">Xem sản phẩm</a>
                                        </div>
                                        @if($product->discount != null)
                                            <div class="product_sale">
                                                <span>@php $sale = 100-($product->discount / $product->price) * 100; echo ceil($sale)@endphp%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="">{{$product->name}}</a></h3>
                                        @if($product->discount != null)
                                            <span class="current_price">{{number_format($product->discount),0,0}}đ</span>
                                            <span class="old_price">{{number_format($product->price),0,0}}đ</span>
                                        @else
                                            <span>{{number_format($product->price),0,0}}đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
