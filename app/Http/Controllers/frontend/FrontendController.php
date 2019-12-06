<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use App\Category;
use App\Product;
use App\ProductCategory;
use App\User;
use Session;
use App\Cart;
use App\Banner;
class FrontendController extends Controller
{


    
    public function index()
    { 
        $banners=Banner::all();
        $products=Product::GetProduct();
        $categories=Category::all();
        $carts = isset(session('cart')->items) ? session('cart')->items:NULL;
    
        return view('frontend_theme.index',compact('products','categories','banners','carts'));
    }
    public function subcategory($id)
    {
      
        $banners=Banner::all(); 
        $categories=Category::all();
       $products =  Product::with('categories')->whereHas(
        'categories',  function($q) use($id) { $q->where('category_id', $id);
   })->get();
  
    // $products=Product::whereHas('product_category')->get();

 
  return view('frontend_theme.frontend_index.subcategory',compact('products','categories','banners'));
    }


   
}
