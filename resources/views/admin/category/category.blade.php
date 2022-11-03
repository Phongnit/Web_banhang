@extends('admin/index')
@section('title','Danh mục sản phẩm')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{route('category_add')}}" title="Thêm"><i
                                    class="fas fa-plus"></i>
                                Tạo mới danh mục phẩm</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{route('product_add')}}" title="Thêm"><i
                                    class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>Mã sản phẩm</th>
                                <th>Tên danh mục sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Tạo lúc</th>
                                <th>Cập nhật lúc</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><span class="{{$category->status == '1' ? 'badge bg-success' : 'badge bg-danger'}}">{{$category->status == '1' ? 'Hiển thị' : 'Tạm ẩn'}}</span></td>
                                    <td>{{ $category->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $category->updated_at->format('d-m-Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('category_edit', ['id' => $category->id]) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('category_del', ['id' => $category->id]) }}"
                                            onclick="return confirm('Bạn có chắc muốn đăng xuất nó khỏi thế giới hay không?');">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="d-flex">
{{--                    {!! $category->appends(['sort' => 'science-stream'])->links() !!}--}}
                </div>
            </div>
        </div>
    </div>
@endsection
