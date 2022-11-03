<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['user_id','full_name','address','email','phone','price_shipping','status','payment_id'];

    public function orders()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

//    public function Size()
//    {
//        return $this->belongsToMany(Attribute::class,'order_details','order_id','color_id');
//    }
//    public function Color()
//    {
//        return $this->belongsToMany(Attribute::class,'order_details','order_id','size_id');
//    }

    public function products() {
        return $this->belongsToMany(Product::class,'order_details','order_id', 'product_id');
    }

    public function getTotalAmount() {
        $t = 0;
        foreach ($this->orders as $dt ) {
            $t += $dt->amount * $dt->quantity;
        }
        $t += $this->price_shipping;
        return $t;
    }
    public function getTotalQtt() {
        $t = 0;
        foreach ($this->orders as $dt ) {
            $t += $dt->quantity;
        }
        return $t;
    }

}
