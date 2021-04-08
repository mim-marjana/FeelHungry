@extends('admin.layouts.main')
@section('content')
<section class="row view-invoice">
	<div class=" col-md-12 col-sm-12 col-xs-12 inv-options">
		<button class="btn1" onclick="printDiv('invoice')">Print the Invoice</button>
		<a href="{{route('send.invoice',['order_id' => $order->id])}}"><button class="btn1">Send Customer</button></a>
	</div>
	@if(Session::has('success'))
		<div class="col-md-12" style="text-align: center;">
			<p class="success-message">{{Session::get('success')}}</p>
		</div>
	@endif
	<div class=" col-md-12 col-sm-12 col-xs-12 ">
		<div class="invoice" id="invoice">
		 <div class="inv-header">
			 <p class="invNo">#invoice {{$order->id}}</p>
			 <p class="date">{{$order->created_at->format('d M Y')}}</p>
			 <div class="compInfo">
				 <h2>{{$details->name}}</h2>
				 <p>{{$details->location}}</p>
				 <p>{{$details->phone}}</p>
				 <p>{{$details->email}}</p>
			 </div>
			 <div class="logo">
				 <img src="{{URL::to('assets/img/'.$details->dash_logo.'')}}" alt="">
			 </div>
		 </div>

		 <div class="customerInfo">
			 <div class="billing">
				 <h2>Bill to</h2>
				 <p>{{$order->checkout_info['billing_fname']}} {{$order->checkout_info['billing_lname']}}</p>
				 <p>{{$order->checkout_info['billing_address']}}</p>
				 <p>{{$order->checkout_info['billing_area']}}, {{$order->checkout_info['billing_city']}}</p>
				 <p>{{$order->checkout_info['billing_postCode']}}</p>
			 </div>
			 <div class="shipping">
				 <h2>Ship to</h2>
				 <p>{{$order->checkout_info['shipping_fname']}} {{$order->checkout_info['shipping_lname']}}</p>
				 <p>{{$order->checkout_info['shipping_address']}}</p>
				 <p>{{$order->checkout_info['shipping_area']}}, {{$order->checkout_info['shipping_city']}}</p>
				 <p>{{$order->checkout_info['shipping_postCode']}}</p>
			 </div>
		 </div>
		 <div class="items">
			<table class="table">
				 <thead>
					  <tr>
							<th>Name</th>
							<th>Unit price</th>
							<th>Qty</th>
							<th>Total</th>
					  </tr>
				 </thead>
				 <tbody>
				 	@foreach($order->cart as $cart)
					<tr>
						<td class="name">{{$cart->name}}</td>
						<td>{{$cart->price}}<span class="taka">&#2547;</span></td>
						<td class="qty">{{$cart->qty}}</td>
						<td>{{$cart->price * $cart->qty}}<span class="taka">&#2547;</span></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
		<div class="totals">
			<p>Subtotal : <span>{{$order->total}}</span><span class="taka">&#2547;</span></p>
			<p>Due : <span>0</span><span class="taka">&#2547;</span></p>
			<p class="total ">Total : <span class="cartTotal">{{$order->total}}</span><span class="taka">&#2547;</span></p><br>
		</div>
	 </div>
	</div>
	
</section>
@endsection