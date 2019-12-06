<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WishList;
use App\Product;
use App\Address;
use Session;
use Auth;
use App\Cart;
use App\ProductImage;
use App\ProductAttribute;
use App\ProductCategory;
use App\Category;
;
class WishListController extends Controller
{
    //
    public function index()
    {


            
    
       


        $products= Product::with('users')->with('product_image')->with('product_attribute')->with('categories')->get();
      
        if(Auth::check())
        return view('frontend_theme.shop.wishlist',compact('products'));
       


      

      
    }
    public function store(Request $request)
    {
        
        $wishlist=new WishList;
        $wishlist_data=$wishlist->where('product_id',$request->wish)->where( 'user_id',auth()->user()->id)->pluck('id');
        
        if(!count($wishlist_data)){
        $data=[
          'user_id'=>auth()->user()->id,
             'product_id'=>$request->wish

        ];  
        $wishlist->create($data);
        $products=Product::find($request->wish);
    }
    return back()->with('wishlist_add',"disabled");   
    }
    





    public function deleteWish($id)
    {

               $wishlist=WishList::where('product_id',$id)->where('user_id',auth()->user()->id);
               $wishlist->delete();
        return back()->with('message',"WishList Remove Successfully"); 
    }




}
