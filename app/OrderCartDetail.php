<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCartDetail extends Model
{
    //
    protected $table = 'order_cart_details';
    protected $fillable = ['order_id','product_id','qty','total'];





  

}
