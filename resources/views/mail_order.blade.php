<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-family: "Roboto";
        }
        table, th, td {
            border:1px solid black;
            font-size: 15px;
        }
    </style>
</head>
<body>
<h2>Xin chào bạn: {{$name}}</h2>
<h2>Cảm ơn bạn đã tin tưởng chúng tôi và đặt hàng tại shop, email này là hóa đơn bán hàng của bạn</h2>
<h2>Thông tin đơn hàng</h2>
<p style="font-size: 15px">Mã hóa đơn: {{$order->id}} </p>
<p style="font-size: 15px">Họ và tên: {{$name}} </p>
<p style="font-size: 15px">Địa chỉ: {{$order->address}}</p>
<p style="font-size: 15px">Số điện thoại: {{$order->phone}}</p>
<table style="width:100%">
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Kích thước</th>
        <th>Màu sắc</th>
        <th>Đơn giá</th>
    </tr>
    @php $n = 1; @endphp
    @php $ship = 30000 @endphp
    @foreach($items as $item)
        <tr>
            <td>{{$n}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->size->name}}</td>
            <td>{{$item->color->name}}</td>
            <td>{{$item->price * $item->quantity}}d</td>
        </tr>
        @php $n++ @endphp
    @endforeach
</table>
</body>
</html>
