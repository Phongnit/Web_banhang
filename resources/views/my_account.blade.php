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
                        <li>Tài khoản của tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Bảng điều khiển</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn đặt hàng</a></li>
                            <li><a href="#address" data-toggle="tab" class="nav-link">Địa chỉ</a></li>
                            <li><a href="{{url('logout')}}" class="nav-link">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Bảng điều khiển </h3>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>Đơn hàng</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID Đơn hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Kích thước</th>
                                        <th>Màu sắc</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        @foreach($order->orders as $listord)
                                    <tr>
                                        <td>{{$listord->order_id}}</td>
                                        <td>{{$listord->name}}</td>
                                        <td>{{$listord->size->name}}</td>
                                        <td>{{$listord->color->name}}</td>
                                        <td>{{$listord->quantity}}</td>
                                        <td>{{$listord->amount}}</td>
                                        <td>@if($order->status == 0)
                                                <span>Đang xử lý</span>
                                                @elseif($order->status == 1)
                                                <span>Đang giao hàng</span>
                                                @elseif($order->status == 2)
                                                <span>Đã giao hàng</span>
                                                @else($order->status == 3)
                                                <span>Đã hủy đơn</span>
                                                @endif
                                        <td>{{number_format($order->getTotalAmount() + $order->price_shipping)}}đ</td>
                                        </td>
                                    </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            @foreach($user as $use)
                            <p>Địa chỉ mặc định khi thanh toán đơn hàng của bạn.</p>
                            <h4 class="billing-address">Địa chỉ thanh toán</h4>
                            <p><strong>{{$use->full_name}}</strong></p>
                                <p><strong>{{$use->phone}}</strong></p>
                            <address>
                                {{$use->address}}
                            </address>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->
@endsection
