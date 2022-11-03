@extends('admin/index')
@section('title','Thêm thương hiệu mới')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo thương hiệu mới</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                                    class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
                        </div>
                    </div>
                    <form class="row" method="POST" action="{{route('brand_add')}}">
                        @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên thương hiệu</label>
                            <input class="form-control" name="name" type="text">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Trạng thái</label>
                            <select class="form-control" name="status" id="exampleSelect1">
                                <option>-- Chọn trạng thái --</option>
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm ẩn</option>
                                @error('status')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </select>
                        </div>
                        <button class="btn btn-save" type="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="{{route('brand')}}">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
