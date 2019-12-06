<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'user_wish_lists';
    //
    protected $fillable = ['user_id','product_id'];
}
