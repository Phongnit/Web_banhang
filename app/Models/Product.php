<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];

    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function ProductCategory() {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
    public function Detail() {
        return $this->belongsTo(Attribute::class,'product_id','id');
    }
    public function ProductImage() {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function Image() {
        return $this->hasOne(ProductImage::class,'product_id','id');
    }
    public function ProductComment() {
        return $this->hasMany(ProductComment::class,'product_id','id');
    }
    public function OrderDetail() {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    public function ProductSize() {
        return $this->belongsToMany(Attribute::class,'product_attribute','product_id','size_id')->distinct('size_id');
    }
    public function ProductColor() {
        return $this->belongsToMany(Attribute::class,'product_attribute','product_id','color_id')->distinct('color_id');
    }
    public function Attribute()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
    public function category_relate()
    {
        return $this->hasMany(Product::class,'product_category_id','product_category_id')->limit(5);
    }
    public function scopeSearch($query) {
        if(request('sort_by')) {
            $sort_by = request('sort_by');
            $arr = explode('-', $sort_by);
            $query = $query->orderBy($arr[0],$arr[1]);
        }
        if(request('show')) {
            $show = request('show');
            $query = $query->limit($show);
        }
        if(request('search')) {
            $search = request('search');
            $query = $query->where('name','like','%'.$search.'%');
        }
        if(request('status')) {
            $status = request('status');
            $query = $query->where('status','like','%'.$status.'%')->get();
        }
    }
}
