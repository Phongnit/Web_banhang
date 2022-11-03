<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-family: "DejaVu Sans";
        }
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>

<h2>Hóa đơn bán hàng</h2>
<p>Mã hóa đơn: {{$data->id}}</p>
<p>Họ và tên: {{$data->full_name}}</p>
<p>Địa chỉ: {{$data->address}}</p>
<p>Số điện thoại: {{$data->phone}}</p>
<table style="width:100%">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Size</th>
        <th>Color</th>
        <th>Đơn giá</th>
    </tr>
    @foreach($data->orders as $list)
    <tr>
        <td>{{$list->name}}</td>
        <td>{{$list->quantity}}</td>
        <td>{{$list->size->name}}</td>
        <td>{{$list->color->name}}</td>
        <td>{{number_format($list->amount)}}d</td>

    </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Phí ship</td>
        <td>30,000d</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Tổng</td>
        <td>{{number_format($data->getTotalAmount() + $data->getTotalQtt()),0,0}}d</td>
    </tr>
</table>
</body>
</html>
