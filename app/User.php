<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','status','google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function is_admin()
    {
       
        if($this->roles->pluck('name')[0] !== 'customer')
        return true;
        else
        return false;
    }
    public function customer()
    {
       
        if($this->roles->pluck('name')[0] == 'customer')
        return true;
        else
        return false;
    }

    public function product_user()
    {
        
        return $this->hasMany(CartDetail::class,'user_id','id');
       
    }


    public function user_address()
    {
        
        return $this->hasMany(Address::class);
       
    }
    public function orders()
    {
        
        return $this->hasMany(Order::class);
       
    }


    public function wishlists()
    {
        return $this->belongsToMany(Product::class,'user_wish_lists')->withTimestamps();
    }
}
