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
        @if(isset($totalPrice) && $totalPrice!=0)
        @if(isset($message))
        <strong class="text-center">{{ $message }}</strong>
        @endif
        @if ($message = Session::get('message'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong class="text-center">{{ $message }}</strong>
        </div>
        @endif



        <div class="table-responsive cart_info">

            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                            <td class="image">name</td>
                        <td class="image">Item</td>
                        <td class="description">Discription</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                       
                    </tr>
                </thead>
                <tbody>
            
                        @foreach($products as $key => $product)
                   
  
              
            
         
                    <tr>
                        @foreach ( $product['item']->product_image as $image )
                            
                        @endforeach
                   
                        <td class="cart_product">
                            <a href=""><img src="{{ asset($image->name) }}" alt="" width=100 height=100></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""> <strong class="text-danger">{{ $product['item']->name }}</strong></a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_description">
                            <strong class="text-info">${{ $product['item']->rate }}</strong>
                        </td>
                        <td class="cart_total">
                                <p class="cart_total_price">${{ $product['item']->rate }}</p>
                            </td>
                       
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ url('cart/add', $product['item']->id) }}" id="up"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{ url('cart/minus', $product['item']->id) }}" id> - </a>
                            </div>
                        </td>
                       
                        <td class="cart_delete">
                                <form method="POST" action="{{ url('cart/delete', $product['item']->id) }}" accept-charset="UTF-8" style="display:inline">
                         
                                    {{ csrf_field() }}
                            <button type="submit" class="cart_quantity_delete" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-times"></i></button>
                        </form>
                        </td>
                  
                     
                    </tr>
               
                    @endforeach
            
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to  or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label> Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label> Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{ isset($totalPrice) ? $totalPrice:'' }}</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{ isset($totalPrice) ? $totalPrice:'' }}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{ url('checkout') }}">Check Out</a>
                </div>
            </div>
        </div>
    </div>








@else

    <div class="table-responsive cart_info">
			<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
								<td class="image">name</td>
							<td class="image">Item</td>
							<td class="description">Discription</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						   
						</tr>
					</thead>
					<tbody>
							<tr >
								<td class="text-danger" colspan="5"> <strong><h1 class="text-center">Cart Is Empty</strong></td>
							</tr>
					</tbody>
			</table>
	</div>


@endif
</section><!--/#do_action-->

@endsection

@push('scripts') 

<script>

</script>
@endpush