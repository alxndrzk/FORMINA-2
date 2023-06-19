<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'user_id',
        'product_name',
        'stock',
        'price',
        'photo',
        'description'
    ];

    public function fkShopcart(){
        return $this->hasMany(ShopCart::class);
    }

    public function fkDetailTransaction(){
        return $this->hasMany(DetailTransaction::class,'product_id','id');
    }
}
