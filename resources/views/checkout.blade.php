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
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Checkout page section-->
    <div class="Checkout_section" id="accordion">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Nếu chưa có tài khoản, bạn cần đăng ký?
                            <a class="Returning" href="{{route('register')}}">Ấn vào đây để đăng ký</a>

                        </h3>
                    </div>
                </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('order')}}" method="POST">
                            @csrf
                            <h3>Thông tin đơn hàng</h3>
                            <div class="row">
                                @auth
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="col-lg-12 mb-20">
                                    <label>Họ và Tên <span>*</span></label>
                                    <input type="text" value="{{Auth::user()->full_name}}" name="full_name" placeholder="Nguyễn Văn A">
                                </div>

                                <div class="col-12 mb-20">
                                    <label>Địa chỉ <span>*</span></label>
                                    <input type="text" value="{{Auth::user()->address}}" name="address" placeholder="Số nhà,đường,quận,huyện">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Điện thoại<span>*</span></label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="0972580430">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Địa chỉ Email<span>*</span></label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" placeholder="mail@gmail.com">
                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú đơn hàng</label>
                                        <textarea id="order_note"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mb-20">
                                        <label for="account" data-toggle="collapse" data-target="#collapseOne"
                                               aria-controls="collapseOne">Nếu chưa có tài khoản, bạn có thể tạo tại đây</label>
                                        <a class="Returning" href="{{url('register')}}">Đăng ký</a>
                                </div>
                            </div>
                            @endauth
                    </div>
                    @guest
                    <form action="#">
                            <div class="row">
                                    <input type="hidden" name="user_id" value="">
                                    <div class="col-lg-12 mb-20">
                                        <label>Họ và Tên <span>*</span></label>
                                        <input type="text" value="" name="full_name" placeholder="Nguyễn Văn A">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Địa chỉ <span>*</span></label>
                                        <input type="text" value="" name="address" placeholder="Số nhà,đường,quận,huyện">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Điện thoại<span>*</span></label>
                                        <input type="text" name="phone" value="" placeholder="0972580430">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label> Địa chỉ Email <span>*</span></label>
                                        <input type="email" name="email" value="" placeholder="mail@gmail.com">
                                    </div>
                                    <div class="col-12">
                                        <div class="order-notes">
                                            <label for="order_note">Ghi chú đơn hàng</label>
                                            <textarea id="order_note"
                                                      placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="account" data-toggle="collapse" data-target="#collapseOne"
                                               aria-controls="collapseOne">Nếu chưa có tài khoản, bạn có thể tạo tại đây</label>
                                        <a class="Returning" href="{{url('register')}}">Đăng ký</a>
                                    </div>
                            </div>
                    </form>
                    </div>
                @endguest
                    <div class="col-lg-6 col-md-6">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Kích thước</th>
                                            <th>Màu sắc</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    @foreach($cart->items as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->size->name}}</td>
                                            <td>{{$item->color->name}}</td>
                                            <td>x{{$item->quantity}}</td>
                                            <td>{{number_format($item->quantity * $item->price),0,0}}đ</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th>Tổng</th>
                                            <td>{{number_format($cart->totalAmount),0,0}}đ</td>
                                        </tr>
                                        <tr>
                                            <th>Phí vận chuyển</th>
                                            <td>{{number_format($cart->shipping),0,0}}đ</td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Tổng đơn hàng</th>
                                            <td><strong>{{number_format($cart->totalAmount += $cart->shipping)}}đ</strong></td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    @foreach($payments as $pay)
                                    <input name="payment_id" value="{{$pay->id}}" type="radio"
                                        data-target="createp_account" />
                                    <label>{{$pay->name}}</label>
                                    @endforeach
                                </div>
                                <div class="order_button">
                                    <button type="button" data-toggle="modal" data-target="#exampleModal">Đặt hàng</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><strong>Đặt Hàng</strong></h5>
                                            </div>
                                            <div class="modal-body">
                                                <p style="font-size:15px">Bạn đã kiểm tra đơn hàng đúng số lượng và loại mình đã đặt chưa?
                                                    Nếu đã đủ và đúng hãy ấn đặt hàng</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-success">Đặt hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->
@endsection
@section('js')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@stop
