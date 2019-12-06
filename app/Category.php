<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';
 

   

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
    protected $fillable = ['name','parent_id','deleted_at'];



    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
       
    }
    public function child()
    {
        return $this->hasMany(Category::class,'parent_id');
       
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product')->withTimestamps();
       
    }

  

}
