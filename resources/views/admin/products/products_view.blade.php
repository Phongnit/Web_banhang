@extends('admin/index')
@section('title','Xem sản phẩm')
@section('main')
<table class="table table-hover table-bordered" id="sampleTable">
<thead>
<tr>
    <th>Tên sản phẩm</th>
    <th>Ảnh</th>
    <th>Giá tiền</th>
    <th>Giảm giá</th>
    <th>Số lượng</th>
    <th>Thông tin mô tả</th>
    <th>Giới thiệu chi tiết</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>{{$product->name}}</td>
        <td>
            @foreach($img as $image)
                <img src="{{asset('uploads'.'/'.$image->path)}}" alt="" width="50px">
            @endforeach
        </td>
        <td>{{number_format($product->price)}}đ</td>
        <td>{{number_format($product->discount)}}đ</td>
        <td>{{$product->qty}}</td>
        <td>{!! $product->description !!}</td>
        <td>{!! $product->content !!}</td>
    </tr>
</tbody>
</table>
@endsection
