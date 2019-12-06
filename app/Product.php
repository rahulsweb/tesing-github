<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['name','rate'];

    
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_product')->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }
 
    public function product_image()
    {
        return $this->hasMany(ProductImage::class);
      
       
    }
    public function product_attribute()
    {
        return $this->hasOne(ProductAttribute::class);
       
    }



    public function product_cart()
    {
        
        return $this->hasMany(CartDetail::class,'product_id','id');
       
    }
    public function scopeGetProduct($query)
    {
            return $query->get();
    }    
    

    public function users()
    {
        return $this->belongsTo(User::class,'user_wish_lists')->withTimestamps();
       
    }
 
    public function order_carts()
    {
        return $this->belongsToMany(Order::class,'order_cart_details')->withTimestamps();
    }
}




