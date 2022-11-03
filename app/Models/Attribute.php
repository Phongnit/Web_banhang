<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attribute';
    protected $fillable = ['id','name','values'];
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function scopeColors($query) {
        return $query->where('values','color')->orderBy('name','ASC');
    }
    public function scopeSizes($query) {
        return $query->where('values','size')->orderBy('name','ASC');
    }
}
