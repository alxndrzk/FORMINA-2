<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $table = 'detail_transactions';
    protected $fillable = [
        'product_id',
        'quantity',
        'transaction_id'
    ];

    public function fkProduct(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
