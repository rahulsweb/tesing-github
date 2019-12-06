<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPaymentDetail extends Model
{
    //


    protected $table ='order_payment_details';

    protected $fillable = ['order_id','payment_id','payment_type','status','rate','total'];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
    public function order_carts()
    {
        return $this->belongsToMany(Product::class,'order_cart_details');
    }
  
}
