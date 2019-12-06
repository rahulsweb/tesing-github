<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductImage;
use App\ProductAttribute;
use App\ProductCategory;
use App\Category;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{

    public function __construct()
    {
      
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $product = Product::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();   
        return view('admin.product.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductRequest $request)
    {

       
        $requestData = $request->all();
  

      $product=new Product;

      $product_attribute=new ProductAttribute;
      $product_category=new ProductCategory;

      $product->name=$request->name;
           $product->rate=$request->rate;
           if($product->save())
           {
            
               






            if($request->hasFile('image'))
            {
        
                $filename="";
            $files = $request->file('image');
            $location='Product Image/';
            foreach($files as $file){
            $filename = time()."_".$file->getClientOriginalName();
          
            $result=$file->move($location,$filename);
          
          $product_image=new ProductImage;
            $product_image->name=$location.$filename;
            $product_image->product_id=$product->id;
            $product_image->save();
            }
 
        }

// product attribte insert data 
        $product_attribute->color=$request->color;

 $product_attribute->quantity=$request->quantity;
 $product_attribute->product_id=$product->id;
 $product_attribute->save();
 

// product category table data  insert data 
 $product_category->product_id=$product->id;

 $product_category->category_id=$request->subcategory;
 $product_category->save();
//  
           }
          


        return redirect('admin/product')->with('flash_message', 'Product added!');
       
        
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Product $product) 
    {

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request ,Product $product)
    {
         
        
     
        $categories = Category::all(); 
         
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
  
     
    

        $products=array('name'=>$request->name,"rate"=>$request->rate);

        $product->update($products);
       

       
        $products_attributes=array('color'=>$request->color,"quantity"=>$request->quantity,'product_id'=>$product->id);
        $product_attribute=ProductAttribute::where('product_id',$product->id); 

        $product_attribute->update( $products_attributes);
        $products_categories=array('category_id'=>$request->subcategory,'product_id'=>$product->id);
        $category_product=ProductCategory::where('product_id', $product->id);
       $category_product->update($products_categories);
  
    
        if($request->hasFile('image'))
        {
         
            $filename="";
        $files = $request->file('image');
        $location='Product Image/';
     
        $imageName=ProductImage::where('product_id',$product->id)->get();
  
     
        foreach($files as $file){
        $filename = time()."_".$file->getClientOriginalName();
      
       
  

    
       
      
   
      $product_image=new ProductImage;
        $product_image->name=$location.$filename;
        $product_image->product_id=$product->id;
        $product_image->save();
        $result=$file->move($location,$filename);
        
    }
       
 }
  
        
        
                
 return redirect('admin/product')->with('flash_message', 'Product updated!');
        
        
        
        
        
        
        
        
}

 



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {
            $product->delete();
        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }







public function imageDelete($id)
{
    
    $imageName=ProductImage::where('id',$id)->get();

    foreach ($imageName as $img) {
     unlink(public_path($img->name));
    }
    ProductImage::where('id',$id)->delete();
    return back()->with('flash_message', 'Image deleted!');
}


}
