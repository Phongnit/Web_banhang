@extends('admin/index')
@section('title','Danh sách sản phẩm')
@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <h3 class="tile-title">Danh sách sản phẩm</h3>
                <form class="form-inline">
                    <div class="form-group">
                        <select class="form-control" name="sort_by" id="exampleSelect1">
                            <option selected value="">Tìm kiếm theo</option>
                            <option value="name-ASC">Tìm theo tên A-Z</option>
                            <option value="name-DESC">Tìm theo tên Z-A</option>
                            <option value="price-ASC">Tìm theo giá: thấp tới cao</option>
                            <option value="price-DESC">Tìm theo giá: cao tới thấp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" id="exampleSelect1">
                            <option selected value="">Trạng thái</option>
                            <option value="1">Hiển thị</option>
                            <option value="0">Tạm ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="search" class="form-control" id="">
                        <button class="btn btn-success"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="row element-button">
                    <div class="col-sm-2">

                      <a class="btn btn-add btn-sm" href="{{route('product_add')}}" title="Thêm"><i class="fas fa-plus"></i>
                        Tạo mới sản phẩm</a>
                    </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->ProductCategory->name}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td>
                            <form action="{{route('update_status', $product->id)}}">
                                <select name="status" onchange="this.form.submit();">
                                    <option {{$product->status == 1 ? 'selected' : ''}} value="1">Hiển thị</option>
                                    <option {{$product->status == 0 ? 'selected' : ''}} value="0">Tạm ẩn</option>
                                </select>
                            </form>
                            </td>
                            <td>
                                <a href="{{ route('product_edit', ['id' => $product->id]) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="{{ route('product_del', ['product' => $product->id]) }}"
                                    onclick="return confirm('Bạn có chắc muốn xoá nó khỏi thế giới hay không?');">
                                    <i class="fas fa-trash"></i></a>
                                <a href="{{ route('product_view', ['id' => $product->id]) }}">
                                    <i class="fa fa-eye"></i></a>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex">
                {!! $products->appends(['sort' => 'science-stream'])->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
