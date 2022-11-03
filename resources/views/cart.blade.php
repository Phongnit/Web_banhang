@extends('layout.master')
@section('main')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>/</li>
                            <li>cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">
                <div class="row">
                    <div class="col-16">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Hình ảnh</th>
                                            <th class="product_name">Sản phẩm</th>
                                            <th class="product_name">Size</th>

                                            <th class="product_name">Color</th>

                                            <th class="product-price">Giá</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_total">Tổng</th>
                                            <th class="product_remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    @foreach($cart->items as $item)
                                    <tbody>
                                    <form action="{{route('cart.update',$item->id)}}">
                                        <tr>
                                            <td class="product_thumb"><a href="#"><img src="{{asset('uploads/'.'/'.$item->image)}}" alt=""></a></td>
                                            <td class="product_name"><a href="{{url('shop/product',$item->id)}}">{{$item->name}}</a></td>
                                            <td class="product_size">
                                                <select name="size">
                                                    <option value="{{$item->size->id}}">{{$item->size->name}}</option>
                                                </select>
                                            </td>
                                            <td class="product_color">
                                                <select name="color">
                                                    <option value="{{$item->color->id}}">{{$item->color->name}}</option>
                                                </select>
                                            </td>
                                            <td class="product-price">{{number_format($item->price),0,0}}đ</td>
                                            <td class="product_quantity">
                                                <input value="{{$item->quantity}}" min="1" max="100" name="quantity" type="number">
                                                <button class="btn btn-sm btn-danger" type="submit">Cập nhật</button>
                                            </td>
                                            <td class="product_total">{{number_format($item->quantity * $item->price),0,0}}đ</td>
                                            <td class="product_remove"><a href="{{route('cart.delete',['id'=>$item->id,'size'=>$item->size->id,'color'=>$item->color->id])}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    </form>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <form action="{{route('cart.clear')}}">
                                <div class="cart_submit">
                                    <button type="submit">Xóa giỏ hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Giỏ hàng</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Tổng hóa đơn tạm</p>
                                       <p class="cart_amount">{{{number_format($cart->totalAmount),0,0}}}đ</p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Vận chuyển</p>
                                       <p class="cart_amount"><span>Phí vận chuyển:</span>{{number_format($cart->shipping),0,0}}đ</p>
                                   </div>

                                   <div class="cart_subtotal">
                                       <p>Tổng hóa đơn</p>
                                       <p class="cart_amount">{{number_format($cart->totalAmount += $cart->shipping),0,0}}đ</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="{{url('checkout')}}">Tiếp tục thanh toán</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->

        </div>
    </div>
    <!-- shopping cart area end -->
@endsection
