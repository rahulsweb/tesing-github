<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['order_code','user_id'];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderPayment()
    {
        return $this->hasMany(OrderPaymentDetail::class,'order_id');
    }
    public function order_carts()
    {
        return $this->belongsToMany(Product::class,'order_cart_details')->withPivot('qty', 'total','created_at');
    }
}
