<?php
namespace App\Http\Controllers\frontend;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use URL;
use Session;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use App\Order;
use App\Cart;
use App\CartDetail;
use App\OrderCartDetail;
use App\OrderPaymentDetail;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class AddMoneyController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //   parent::__construct();
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        $oldCart=Session::get('cart');
            
        $cart=new Cart($oldCart);

        $customer=[
         'fullname'=>$request->fullname,   
         'address1'=>$request->address1,
         'address2'=>$request->address2,
         'country'=>$request->country,
         'state'=>$request->state,

         'pincode'=>$request->pincode,
         'user_id'=>auth()->user()->id,
         'payment'=>$request->paypal,
        'message'=>$request->message,
        ];

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));
          Session::put('customer',json_encode($customer));  
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
            DB::beginTransaction();
        try {
            
            $payment->create($this->_api_context);
       
            if(!Session::has('cart'))
            {
                    return view('frontend_theme.shop.shopping_cart',['product'=>null]);
            }
         
          
            $order=new Order;
         
            $order_data=[
                'order_code'=>'OD_'.now()->timestamp,
                'user_id'=>auth()->user()->id

            ];
            $order->create($order_data);
            //creating Order Payment Details Object
            $order_payment_details=new OrderPaymentDetail;
            $orders=$order->where('user_id',auth()->user()->id)->latest('id')->first();
               $status=($request->paypal == 'COD' ) ? 'Pending':'Processing'; 
            $order_payment_data=[
                'order_id'=> $orders->id,
                'payment_id'=> $payment->id,
                'payment_type'=>$request->paypal,
                'status'=>$status,

            ];
            $order_payment_details->create($order_payment_data);

          
            $order_payment  =$order_payment_details->where('order_id',$orders->id)->latest('id')->first();
           

            foreach($cart->items as $id=>$product)
            {

                $cartdetail=new OrderCartDetail;
                $cartdata=[
                    'order_id'=> $orders->id,
                    'product_id'=>$product['item']->id, 
               
                    'qty'=>$cart->totalQty,
                    'total'=> $cart->totalPrice
           
              
                ];

                 
               $cartdetail->create($cartdata);
               DB::commit();

            }
            
             Session::forget('cart');
         
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            DB::rollback();
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                DB::rollback();
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
     
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        DB::rollback();
        \Session::put('error','Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 
            
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            \Session::put('success','Payment success');
            return Redirect::route('addmoney.paywithpaypal');
        }
        \Session::put('error','Payment failed');
        return Redirect::route('addmoney.paywithpaypal');
    }




    public function cod( Request $request )
    {
       
        $oldCart=Session::get('cart');
            
        $cart=new Cart($oldCart);

        $customer=[
         'fullname'=>$request->fullname,   
         'address1'=>$request->address1,
         'address2'=>$request->address2,
         'country'=>$request->country,
         'state'=>$request->state,

         'pincode'=>$request->pincode,
         'user_id'=>auth()->user()->id,
         'payment'=>$request->paypal,
        'message'=>$request->message,
        ];
















        $order=new Order;
         
        $order_data=[
            'order_code'=>'OD_'.now()->timestamp,
            'user_id'=>auth()->user()->id

        ];
        $order->create($order_data);
        //creating Order Payment Details Object
        $order_payment_details=new OrderPaymentDetail;
        $orders=$order->where('user_id',auth()->user()->id)->latest('id')->first();
           $status=($request->paypal == 'COD' ) ? 'Pending':'Processing'; 
        $order_payment_data=[
            'order_id'=> $orders->id,
            
            'payment_type'=>$request->paypal,
            'status'=>$status,

        ];
        $order_payment_details->create($order_payment_data);

      
        $order_payment  =$order_payment_details->where('order_id',$orders->id)->latest('id')->first();
       
   
        foreach($cart->items as $id=>$product)
        {

            $cartdetail=new OrderCartDetail;
            $cartdata=[
                'order_id'=>  $orders->id,
                'product_id'=>$product['item']->id, 
  
                    'qty'=>$cart->totalQty,
               'total'=> $cart->totalPrice
       
          
            ];

             
           $cartdetail->create($cartdata);




        }



        Session::forget('cart');
        

        return redirect('paywithpaypal')->with('message','Your Cash on Delivery Payment Successfully');


        
    }
  }