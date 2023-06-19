<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'total_payment',
        'delivery_service_id',
        'address',
        'photo_tranfer',
        'status'
    ];

    public function fkUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function fkDelivery(){
        return $this->belongsTo(DeliveryService::class,'delivery_service_id','id');
    }
}
