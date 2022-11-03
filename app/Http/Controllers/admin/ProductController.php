<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\Attribute;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $products = Product::search()->paginate(10);
        return view('admin/products/products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $colors = Attribute::colors()->get();
        $sizes = Attribute::sizes()->get();
        $category = ProductCategory::all();
        return view('admin/products/products_add',compact('category','brands','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Todo Code chỉ chạy được, sẽ cần sửa lại để tối ưu hơn
    public function store(ProductRequest $request)
    {
        //dd($request->all());
        $product = Product::create([
                'name'=>$request->name,
                'brand_id'=>$request->brand_id,
                'product_category_id'=>$request->product_category_id,
                'description'=>$request->description,
                'price'=>$request->price,
                'qty'=>$request->qty,
                'discount'=>$request->discount,
                'status'=>$request->status,
            ]);
        for($i = 0; $i < count($request->color_id); $i++) {
            ProductAttribute::create([
               'product_id'=>$product->id,
                'size_id'=>$request->size_id[$i],
                'color_id'=>$request->color_id[$i]
            ]);
        }
        if($product){
            $images = $request->images;
            if($images){
                $data = [];
                foreach($images as $file)
                {
                    // Lấy tên + thời gian
                    $name = time().'.'. $file->getClientOriginalName();
                    $file->move(public_path().'/uploads/', $name);
                    $data[] = $name;
                }
                // mã hoá sang strings và lưu vào database
                foreach($data as $values) {
                    $dataInsert['path'] = $values;
                    $dataInsert['product_id'] =  $product->id;
                    $dataInsert['status'] =  $product->status;
                    $imgs = ProductImage::create($dataInsert);
                }
            }
        }
        return redirect()->route('product')->with('thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product->load('ProductImage');
        $colors = Attribute::colors()->get();
        $sizes = Attribute::sizes()->get();
        $img = $product->ProductImage ?? [];
        return view('admin/products/products_view',compact('product','img','colors','sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $colors = Attribute::colors()->get();
        $sizes = Attribute::sizes()->get();
        $category = ProductCategory::all();
        $first_attr = $product->Attribute[0];
        unset($product->Attribute[0]);
        return view('admin.products.products_edit',
            compact('category','sizes','colors','brands','product','first_attr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Todo Code chỉ chạy được, sẽ cần sửa lại để tối ưu hơn
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'product_category_id'=>$request->product_category_id,
            'description'=>$request->description,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'discount'=>$request->discount,
            'status'=>$request->status
        ]);
        ProductAttribute::where('product_id',$product->id)->delete();
        for($i = 0; $i < count($request->color_id); $i++) {
            $data = [
                'product_id'=>$product->id,
                'size_id'=>$request->size_id[$i],
                'color_id'=>$request->color_id[$i]
            ];
            ProductAttribute::create($data);
        }
        if($product){
            $images = $request->images;
            if($images){
                $data = [];
                foreach($images as $file)
                {
                    // Lấy tên + thời gian
                    $name = time().'.'. $file->getClientOriginalName();
                    $file->move(public_path().'/uploads/', $name);
                    $data[] = $name;
                }
                ProductImage::where('product_id',$product->id)->delete();
                foreach($data as $values) {
                    $dataInsert['path'] = $values;
                    $dataInsert['product_id'] =  $product->id;
                    $dataInsert['status'] =  $product->status;
                    $imgs = ProductImage::create($dataInsert);
                }
            }
        }
        return redirect()->route('product');
    }

    public function update_status(Request $request,$id)
    {
        $data = $request->only('status');
        $product = Product::where('id',$id);
        $product->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product)
    {
        $del = ProductImage::where('product_id',$product->id)->first();
        foreach ($del as $img) {
            if(file_exists(asset('uploads/'.$img))) {
                $data = unlink(asset('uploads/'.$img));
            }
        }
        $data = ProductImage::where('product_id',$product->id)->delete();
        ProductAttribute::where('product_id',$product->id)->delete();
        $product->delete();
        return redirect()->route('product');
    }
}
