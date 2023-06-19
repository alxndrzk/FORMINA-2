<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    use HasFactory;

    protected $table = 'shoping_carts';
    protected $fillable = [
        'quantity',
        'user_id',
        'product_id'
    ];

    public function fkProduct(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
