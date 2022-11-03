@extends('admin/index')
@section('title','Sửa sản phẩm')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới sản phẩm</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{route('category_add')}}"><i
                                    class="fas fa-folder-plus"></i> Thêm danh mục</a>
                        </div>
                    </div>
                </div>
                <form class="row" method="POST" enctype="multipart/form-data" action="{{route('product_edit',$product->id)}}">
                    @csrf
                    <div class="form-group col-md-3">
                        <label class="control-label">Tên sản phẩm</label>
                        <input class="form-control" value="{{$product->name}}" type="text" name="name">
                        @error('name')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleSelect1" class="control-label">Danh mục sản phẩm</label>
                        <select class="form-control" name="product_category_id" id="exampleSelect1">
                            <option>-- Chọn danh mục --</option>
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}" {{$cat->id = $product->product_category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleSelect1" class="control-label">Thương hiệu</label>
                        <select class="form-control" name="brand_id" id="exampleSelect1">
                            <option>-- Chọn thương hiệu --</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{$brands->id = $product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Giá bán</label>
                        <input class="form-control" value="{{$product->price}}" type="text" name="price">
                        @error('price')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Giảm giá</label>
                        <input class="form-control" value="{{$product->discount}}" type="text" name="discount">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Số lượng</label>
                        <input class="form-control" type="text" value="{{$product->qty}}" name="qty">
                        @error('qty')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleSelect1" class="control-label">Trạng thái</label>
                        <select class="form-control" name="status" id="exampleSelect1">
                            <option>-- Chọn trạng thái --</option>
                            <option value="1" {{$product->status == '1' ? 'selected' : ''}}>Hiển thị</option>
                            <option value="0" {{$product->status == '0' ? 'selected' : ''}}>Tạm ẩn</option>
                            @error('status')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success add-attr">Thêm</button>
                    </div>
                    <div id="attr_1">
                        <div class="row-attr">
                            <div class="form-group col-md-2">
                                <button class="btn btn-success pull-right remove-attr">Xóa</button>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleSelect" class="control-label">Kích thước</label>
                                <select style="width:300px" class="form-control" name="size_id[]" id="exampleSelect1">
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}" {{$size->id == $first_attr->size_id ? 'selected' : ''}}>{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleSelect1" class="control-label">Màu sắc</label>
                                <select style="width:300px" class="form-control" name="color_id[]" id="exampleSelect1">
                                    @foreach ($colors as $color)
                                        <option value="{{$color->id}}" {{$size->id == $first_attr->color_id ? 'selected' : ''}}>{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @foreach($product->Attribute as $attr)
                        <div class="row-attr">
                            <div class="form-group col-md-2">
                                <button class="btn btn-success pull-right remove-attr">Xóa</button>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleSelect" class="control-label">Kích thước</label>
                                <select style="width:300px" class="form-control" name="size_id[]" id="exampleSelect1">
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}" {{$size->id == $attr->size_id ? 'selected' : ''}}>{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleSelect1" class="control-label">Màu sắc</label>
                                <select style="width:300px" class="form-control" name="color_id[]" id="exampleSelect1">
                                    @foreach ($colors as $color)
                                        <option value="{{$color->id}}" {{$color->id == $attr->color_id ? 'selected' : ''}}>{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                    <div id="attr_2">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Ảnh mô tả sản phẩm</label>
                        <div id="myfileupload">
                            <input type="file" id="uploadfile" name="images[]" multiple/>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" name="description" id="content">{{$product->description}}</textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                    </div>
                    <button class="btn btn-save" type="submit">Lưu lại</button>
                    <a class="btn btn-cancel" href="{{url('admin/san-pham')}}">Hủy bỏ</a>
                </form>
            </div>
@endsection
