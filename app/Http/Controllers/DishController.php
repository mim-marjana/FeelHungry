<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Session;
use \Cart as Cart;
use Stripe\Stripe;
use Stripe\Charge;
use \Cache;
use App\Order;
use App\Invoice;
use Auth;

class DishController extends Controller
{

  public function __construct(){
    $this->middleware('auth:web',['only' => ['checkoutInfo','postCheckoutInfo','getChecout','postCheckout']]);
  }
   public function addTocart(Request $request){
        $dishId = $request['dishId'];
        $dish = Dish::find($dishId);
        Cart::add([
            'id' => $dish->id,
            'name' => $dish->name,
            'details' => $dish->details,
            'qty' =>1,
            'price' => $dish->price,
            'options' => ['photo' => $dish->photo],
        ]);
        $cartQty = Cart::count();
        Session::put('cartQty',$cartQty);
        return response()->json(['cartQty' => $cartQty]);
    }



    public function updateCart(Request $request){

        $dishId = $request['dishId'];
        $dishQty = $request['dishQty'];
        Cart::update($dishId , ['qty' => $dishQty]);
        $cartQty = Cart::count();
        $cartTotal= Cart::subtotal(0, '.', '');
        Session::put('cartQty',$cartQty);
        return response()->json(['cartQty' => $cartQty,'cartTotal'=>$cartTotal]);
    } 

    public function deleteFromCart(Request $request){

        $dishId = $request['dishId'];
        Cart::remove($dishId);
        $cartQty = Cart::count();
        $cartTotal= Cart::subtotal(0, '.', '');
        Session::put('cartQty',$cartQty);
        return response()->json(['cartQty' => $cartQty,'cartTotal'=>$cartTotal]);
    }




    public function getCart()
    {
    	  $cart= Cart::content();
        $cartTotal= Cart::subtotal(0, '.', '');
        $cartQty= Cart::count();
        if($cartQty <=0){
            return redirect()->route('menu');
        }
        return view('cart',['cartItems'=>$cart,'cartTotal'=> $cartTotal]);
    }


   public function checkoutInfo(){

      if(Session::has('checkout_info')){
        return redirect()->route('checkout');
      }

      $user = Auth::user();
      return view('information',['user'=>$user]);
   


   }


   public function postCheckoutInfo(Request $request){	
   	$checkout_info= ([
	       'billing_fname' =>$request['billing_fname'],
	       'billing_lname' =>$request['billing_lname'],
         'billing_email' =>$request['billing_email'],
	       'billing_phone' =>$request['billing_phone'],
	       'billing_address' =>$request['billing_address'],
	       'billing_area' =>$request['billing_area'],
	       'billing_city' =>$request['billing_city'],
	       'billing_postCode' =>$request['billing_postCode'],

	       'shipping_fname' =>$request['shipping_fname'],
         'shipping_lname' =>$request['shipping_lname'],
	       'shipping_phone' =>$request['shipping_phone'],
	       'shipping_address' =>$request['shipping_address'],
	       'shipping_area' =>$request['shipping_area'],
	       'shipping_city' =>$request['shipping_city'],
	       'shipping_postCode' =>$request['shipping_postCode']
   	]);

   	Session::put('checkout_info',$checkout_info);

   	return redirect()->route('checkout');
   }

   public function UpdatecheckoutInfo(){  
      if(Session::has('checkout_info')){
        $checkout_info = Session::get('checkout_info');
        return view('information-update',['checkout_info' =>$checkout_info]);
      }
      return redirect()->route('checkout.info');

    
   }





   public function getChecout()
    {
    	if(!Session::has('checkout_info')){
   		return redirect()->route('checkout.info');
   	}
 		$cart= Cart::content();
      $cartTotal= Cart::subtotal(0, '.', '');
      $cartQty= Cart::count();
      if($cartQty <=0){
         return redirect()->route('menu');
      }
     return view('checkout',['cartItems'=>$cart,'cartTotal'=> $cartTotal]);
  }

 	public function postCheckout(Request $request){

		$cart = Cart::content();
    $qty = Cart::count();
    $total = Cart::subtotal(0, '.', '');
    $checkout_info = Session::get('checkout_info');
    $user = Auth::user();

    Stripe::setApiKey('sk_test_jTmcctGPqbYPKJ53JzidfZWW');

    try{
        $charge = Charge::create(array(
            'amount' => $total * 100,
            'currency' =>'BDT',
            'source' => $request->input('stripeToken'),
            'description' => 'Charged For '.$user->first_name.'',
        ));
        $payment_id = $charge->id;
    }
    catch(\Exception $e){
        return redirect()->route('checkout')->with('error',$e->getMessage());
    }

    

    $order = new Order();
    $order->user_id = $user->id;
    $order->cart = serialize($cart);
    $order->checkout_info = serialize($checkout_info);
    $order->qty = $qty;
    $order->total = $total;
    $order->payment_type = "Card";
    $order->payment_id = $payment_id;
    $order->payment_number = $request['card_number'];
    $order->save();
	

    Cart::destroy();
    Session::forget('cartQty');
    Session::forget('checkout_info');
    Cache::flush();

    return redirect()->route('menu')->with('success','Thank you for your Order. We will call you to confirm the order. have a nice meal');

  }


  public function checkoutWithBkash(Request $request){

    $cart = Cart::content();
    $qty = Cart::count();
    $total = Cart::subtotal(0, '.', '');
    $checkout_info = Session::get('checkout_info');
    $user = Auth::user();

    $order = new Order();
    $order->user_id = $user->id;
    $order->cart = serialize($cart);
    $order->checkout_info = serialize($checkout_info);
    $order->qty = $qty;
    $order->total = $total;
    $order->payment_type = "Bkash";
    $order->payment_id = $request->transection_id;
    $order->payment_number = $request->bkash_number;
    $order->save();

     Cart::destroy();
     Session::forget('cartQty');
     Session::forget('checkout_info');
     Cache::flush();

    return redirect()->route('menu')->with('success','Thank you for your Order. We will call you to confirm the order. have a nice meal');
  }

  public function checkoutWithCOD(Request $request){
    $cart = Cart::content();
    $qty = Cart::count();
    $total = Cart::subtotal(0, '.', '');
    $checkout_info = Session::get('checkout_info');
    $user = Auth::user();

    $order = new Order();
    $order->user_id = $user->id;
    $order->cart = serialize($cart);
    $order->checkout_info = serialize($checkout_info);
    $order->qty = $qty;
    $order->total = $total;
    $order->payment_type = "COD";
    $order->payment_id = ' ';
    $order->payment_number = $request->number;
    $order->save();

    Cart::destroy();
    Session::forget('cartQty');
    Session::forget('checkout_info');
    Cache::flush();

    return redirect()->route('menu')->with('success','Thank you for your Order. We will call you to confirm the order. have a nice meal');
  }
}
