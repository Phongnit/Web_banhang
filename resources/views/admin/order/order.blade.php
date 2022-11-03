@extends('admin/index')
@section('title','Danh sách đơn hàng')
@section('main')
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                        class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                        class="fas fa-print"></i> In dữ liệu</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-excel btn-sm" href="{{route('export')}}" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm pdf-file" href="{{route('PDF')}}" type="button" title="In" onclick="myFunction(this)"><i
                                        class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>ID đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>SDT</th>
                                <th>Tình trạng</th>
                                <th>Tổng SL</th>
                                <th>Tổng tiền</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td width="10"><input type="checkbox" id="all"></td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->full_name}}</td>
                                <td>{{$order->phone}}</td>
                                <td>
                                    <form action="{{route('order.update',$order->id)}}">
                                        <select name="status" onchange="this.form.submit();">
                                                <option {{$order->status == 0 ? 'selected' : ''}} value="0">Chờ xử lý</option>
                                                <option {{$order->status == 1 ? 'selected' : ''}} value="1">Đang giao hàng</option>
                                                <option {{$order->status == 2 ? 'selected' : ''}} value="2">Đã giao hàng</option>
                                                <option {{$order->status == 3 ? 'selected' : ''}} value="3">Hủy đơn hàng</option>
                                        </select>
                                    </form>
                                </td>
                                <td>{{$order->getTotalQtt()}}</td>
                                <td>{{number_format($order->getTotalAmount())}}đ</td>

                                <td>
                                    <a class="btn btn-primary btn-sm view" href="{{route('order.show', $order->id)}}" title="Xem"><i class="fa fa-eye"></i></a>
                                </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{ $orders->appends(['sort' => 'science-stream'])->links()}}
                </div>
            </div>
        </div>
@endsection
