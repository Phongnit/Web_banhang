@extends('admin/index')
@section('title','Danh sách đơn hàng')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm pdf-file" href="{{route('PDF_Export',$order->id)}}"
                               type="button" title="In" onclick="myFunction(this)"><i
                                    class="fas fa-file-pdf"></i> Xuất hóa đơn PDF</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID SP</th>
                            <th>Tên SP</th>
                            <th>Số lượng</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orders as $orderdt)
                            <tr>
                                <td width="10"><input type="checkbox" id="all"></td>
                                <td>{{$orderdt->product_id}}</td>
                                <td>{{$orderdt->prod->name}}</td>
                                <td>{{$orderdt->quantity}}</td>
                                <td>{{$orderdt->size->name}}</td>
                                <td>{{$orderdt->color->name}}</td>
                                <td>{{number_format($orderdt->quantity * $orderdt->amount)}}đ</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Tổng tiền:</strong></td>
                        <td><strong>{{number_format($order->getTotalAmount())}}đ</strong></td>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
