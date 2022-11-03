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

<h2>Tổng hợp đơn hàng</h2>

<table style="width:100%">
    <tr>
        <th>Họ và tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    @foreach($data as $dt)
        @foreach($dt->orders as $listorder)
    <tr>
        <td>{{$dt->full_name}}</td>
        <td>{{$dt->address}}</td>
        <td>{{$dt->phone}}</td>
        <td>{{$listorder->name}}</td>
        <td>{{$listorder->quantity}}</td>
        <td>{{number_format($listorder->amount)}}đ</td>
    </tr>
        @endforeach
    @endforeach
</table>

</body>
</html>
