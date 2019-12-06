<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //

  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cart_details';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name',  'rate','color','image','qty','product_id'];
    

 
    public function product()
    {
        return $this->belongsToMany(Product::class,'product_id','id');
       
    }
 

}
