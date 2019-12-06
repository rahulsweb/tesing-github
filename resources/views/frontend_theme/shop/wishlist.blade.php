@extends('frontend_theme.frontend_layout') 
@push('styles')

<style>
  .header
   {
       font-size: 20px;
       text-align: center !important;
   }
</style>

@endpush
@section('content')



<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>



  @if(isset($message))
        <strong class="text-center">{{ $message }}</strong>
        @endif
        <div class="table-responsive cart_info">

       
         
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                            <td class="image">name</td>
                            <td class="description">Price</td>
                        <td class="image">image</td>
                        <td class="image"></td>
                        <td class="image"></td>
          
                      
                       
                    </tr>
                </thead>
                <tbody>
@if(count($products->first()->users))
                    
                        @foreach($products as $key => $product)
                  

                        @if(count($product->users))
                       
                    <tr>
                        
                       <td>{{ $product->name }}</td>
                        <td>{{ $product->rate }}</td>
                        <td> <img src="{{ asset($product->product_image[0]->name) }}" width=100 height=100 ></td>      
                        <td>                            <a href="{{ url('cart/detail',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </td>
                        <td>
                         
                               <a class="btn btn-warning add-to-cart" href="{{ url('wishlist/delete', $product->id) }}"  >  Delete  </a>                        </td>
                    </tr>
                        @endif
                    @endforeach
            @else
            <tr >
                    <td class="text-danger" colspan="5"> <strong><h1 class="text-center">WishList Is Empty</strong></td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->



@endsection

@push('scripts') 

<script>

</script>
@endpush