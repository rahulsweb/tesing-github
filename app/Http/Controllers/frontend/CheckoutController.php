<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Auth;
use App\Product;
use App\ProductImage;
use App\ProductAttribute;
use App\ProductCategory;
use App\Category;
use App\Address;
use Session;
use App\Cart;

use DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $addresses=Address::all();

        if(!Session::has('cart'))
        {
                return view('frontend_theme.shop.shopping_cart',['product'=>null]);
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);

  //
        if(Auth::check())
         return view('frontend_theme.shop.checkout',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'addresses'=>$addresses]);
        
         return redirect('login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getAddress(Request $request,$id)
    {
        $address=Address::find($id);
        return response()->json(['success'=>$address]);
    }
     
    public function addWish(Request $request)
    {
      
          
          return view('frontend_theme.shop.wishlist',compact('products'));
    }
}
