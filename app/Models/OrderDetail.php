<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['order_id','product_id','name','quantity','color_id','size_id','amount'];

    public function prod() {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function size() {
        return $this->hasOne(Attribute::class,'id','size_id');
    }
    public function color() {
        return $this->hasOne(Attribute::class,'id','color_id');
    }
}
