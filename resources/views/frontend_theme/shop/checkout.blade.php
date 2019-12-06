@extends('frontend_theme.frontend_layout') 
@push('styles')

<style>
  .header
   {
       font-size: 20px;
       text-align: center !important;
   }
   .check_out
   {
	   margin-top: 0px;
   }
</style>

@endpush
@section('content')






















<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
	
			<div class="step-one">
				<h2 class="heading">Step1</h2>
					
			</div>
			
			<div class="form-group">
						<div class="order-message">
							<h3 class="text-info"><b>Shipping Order</b></h3>
							<label><input type="checkbox" id="shipping"><strong class="text-warning"> Shipping Address is Same as Billing Address to bill address</strong></label>
						</div>	
					</div>
			<div class="checkout-options" id="address" style="display:none;">
				<h2 class="text-info">{{ Auth()->user()->first_name." ".Auth()->user()->last_name }} Addresses</h2>
				<p>Checkout options</p>

				<ul class="list-group">

		
			  @if(Auth()->user())
				@foreach($addresses->where('user_id',Auth()->user()->id) as $address)		
					<li class="list-group-item">
						<strong class="text-info"><input type="checkbox"  class="addresses" style="margin:20px;" value="{{ $address->id }}">{{ $address->fullname }}, {{ $address->address1 }}, {{ $address->state }},{{ $address->country }},{{ $address->pincode }}  </strong>
					</li>
				@endforeach
				@endif
				</ul>
			</div><!--/checkout-options-->
			@if(isset($totalPrice) && $totalPrice!=0)
			<div class="review-payment">
					<h2>Review & Payment</h2>
				</div>
			
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
				<div class="row">
						<div class="col-sm-6">
								{{--  <div class="chose_area">
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
								</div>  --}}
						</div>
						<div class="col-sm-6">
							<div class="total_area">
								<ul>
									<li>Cart Sub Total <span>{{ isset($totalPrice) ? $totalPrice:'' }}</span></li>
									<li>Eco Tax <span>$2</span></li>
									<li>Shipping Cost <span>Free</span></li>
									<li>Total <span>{{ isset($totalPrice) ? $totalPrice:'' }}</span></li>
								</ul>
									
							</div>
						</div>
					</div>
			<div class="register-req">
				<p>Please  Register And Checkout to easily get access to your order history, or  Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-7	 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
					
							<div class="form-two">
									<form action="{!! URL::route('addmoney.paypal') !!}" method="POST">
											{{ csrf_field() }}
										<input type="text" id="fullname" name="fullname" placeholder="Full Name *">
								
									<input type="text" id="address1" name="address1" placeholder="Address 1 *">
									<input type="text" id="address2"  name="address2" placeholder="Address 2">
									<input type="text" id="pincode"  name="pincode" placeholder="Zip / Postal Code *">
									<select id="country" name="country">
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option value="india">India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select id="state" name="state">
										<option>-- State / Province / Region --</option>
										<option value="maharashtra">Maharashtra</option>
										
									</select>
									{{--  <input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">  --}}
							
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			
			<div class="payment-options">
				
		
				<span>
						<label><input type="radio" id="cod"  name="paypal" value="COD"> COD</label>
					</span>
				
					<span>
						<label><input type="radio" id="paypal" name="paypal" value="Paypal"> Paypal</label>
					</span>
					 <input id="amount" type="hidden" class="form-control" name="amount" value="{{ $totalPrice }}" autofocus>
				
	      <button type="submit" id="submit" formaction="{{ url('cod') }}" >
                             
                                </button>
			
				</div>
		</div>
	{{-- </form>
				 <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
  --}}
                               
                              
                        
                        
                          
                           
                    </form>



       
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
            
                
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

	</section> <!--/#cart_items-->

    @endsection

    @push('scripts') 
    
    <script>
	$(function(){
      $("#submit").hide() // try to hide google navigation bar
   });

$(document).ready(function(){






    $(document).on('click', '.addresses', function() {      
    $('.addresses').not(this).prop('checked', false);  
	 id=$('.addresses').val();


	 $.ajax({
 
		type:"GET",
		url:"{{url('checkout/address')}}/"+id,
		success: function(data) {
		$('#fullname').val(data.success.fullname);
		$('#address1').val(data.success.address1);
		$('#address2').val(data.success.address2);
		$('#country ').val(data.success.country);
		$('#state ').val(data.success.state);
	
		$('#pincode').val(data.success.pincode);

	}
	});












	
});


$('#cod').click(function(){
	$('#submit').show();
$('#submit').removeClass('btn btn-info btn-lg');

$('#submit').addClass('btn btn-danger btn-lg').html("Cash on Delivery");
$('#submit').attr('formaction',"{{ url('cod') }}");
});

$('#paypal').click(function(){
		$('#submit').show();
$('#submit').removeClass('btn btn-danger btn-lg');

$('#submit').addClass('btn btn-info btn-lg').html("Paypal Payment");
$('#submit').attr('formaction',"{{ route('addmoney.paypal') }}");

});
$('#submit').hide();





        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
              $("#address").removeAttr("style");
			   $("#address").show();
            }
            else if($(this).is(":not(:checked)")){
	 $("#address").hide();
            }
        });



});


</script>
    @endpush