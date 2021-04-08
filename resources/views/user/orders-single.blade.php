@extends('layouts.mainDark')
@section('content')
<section class="row" id="cart">
    <div class="col-md-12 cart-wrapper">
        <h1 class="heading1">Order #{{$order->id}}</h1>
        <div class="row order-details">
            <div class="col-md-4 col-sm-4 col-xs-12 details-block">
              <div class="inner">
                  <h2>Payment Information</h2>
                  <p><span>Date : </span> {{$order->created_at->format('d M Y')}}</p>
                  <p><span>Type : </span>{{$order->payment_type}}</p>
                  <p><span>Number : </span> {{$order->payment_number}}</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 details-block billing">
                <div class="inner">
                    <h2>Billing</h2>
                    <p>{{$information['billing_fname'].' '.$information['billing_lname']}}</p>
                    <p>{{$information['billing_email']}}</p>
                    <p>{{$information['billing_phone']}}</p>
                    <p>{{$information['billing_address']}}</p>
                    <p>{{$information['billing_city'].', '.$information['shipping_postCode']}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 details-block shipping">
                <div class="inner">
                    <h2>Shipping</h2>
                    <p>{{$information['shipping_fname'].' '.$information['shipping_lname']}}</p>
                    <p>{{$information['shipping_phone']}}</p>
                    <p>{{$information['shipping_address']}}</p>
                    <p>{{$information['shipping_city'].', '.$information['shipping_postCode']}}
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="dish-name-head">Dish Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart_items as $cart)
                <tr>
                    <td class="dish-name-body">
                        <img src="{{URL::to('assets/img/dish/'.$cart->options->photo.'')}}" alt="">
                        <p>{{$cart->name}}</p>
                    </td>
                    <td>
                        {{$cart->qty}}
                    </td>
                    <td class="dishPrice">{{$cart->price}}<span class="taka">&#2547;</span></td>
                    <td class="dishTotalPrice">{{$cart->price * $cart->qty}}<span class="taka">&#2547;</span></td>
                </tr>
                @endforeach

            </tbody>
         </table>
    </div>
    <div class="col-md-12 cart-tatals">
        <p>Subtotal : <span class="cartSubTotal">{{$order->total}}</span><span class="taka">&#2547;</span></p>
        <p>Discount : 0<span class="taka">&#2547;</span></p>
        <p class="total ">Total : <span class="cartTotal">{{$order->total}}</span><span class="taka">&#2547;</span></p><br>
    </div>
</section>
@endsection