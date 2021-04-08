@extends('admin.layouts.main')
@section('content')
<section id="orders-nav">
 	 <ul >
 	 	<li class="li-process">
 	 		<a href="#od-processed" onclick="$('#od-processed').animatescroll({padding:100});" >
 	 			Processed
 	 		</a>
 	 	</li>
 	 	<li class="li-pending">
 	 		<a href="#od-pending" onclick="$('#od-pending').animatescroll({padding:100});">
 	 			Pending
 	 		</a>
 	 	</li>
 	 </ul>
 </section>

<section class="row orders" id="od-processed">
 	<h1 class="header-1">Completed Orders</h1>
 	@if($complete_orders->count()>0)
	<table class="table">
	  <thead>
	    <tr>
	      <th>Date</th>
	      <th>Name</th>
			<th>qty</th>
			<th>Total</th>
	      <th>Type</th>
	      <th>Number</th>
	      <th>Manage</th>
	    </tr>
	  </thead>
	  <tbody class="table-hover">
	  	@foreach($complete_orders as $c_order)
 	    <tr>
 	      <td class="serial">{{$c_order->created_at->format('d M Y')}}</td>
 	      <td >{{$c_order->user->first_name.' '.$c_order->user->last_name}}</td>
 	      <td>{{$c_order->qty}}</td>
 	      <td>{{$c_order->total}}<span class="taka">&#2547;</span></td>
 	      <td>{{$c_order->payment_type}}</td>
 	      <td>{{$c_order->payment_number}}</td>
 	      <td>
 	      	<a href="{{route('admin-view-order',['order_id' => $c_order->id])}}"><i title="View Order" class="fa fa fa-eye" aria-hidden="true"></i></a>

	      	<a href="{{route('update-order-status',['order_id' => $c_order->id])}}"><i title="{{$c_order->status == 0 ? 'Confirm Order' : 'Cancel Order'}}" class="fa {{$c_order->status == 0 ? 'fa-check' : 'fa-times'}}" aria-hidden="true"></i></a>

	      	<a href="{{route('delete.order',['order_id' => $c_order->id])}}"><i title="Delete Order" class="fa fa-trash-o" aria-hidden="true" style="color:#af0202"></i></a>
 	      </td>
 	    </tr>
 	    @endforeach
	  </tbody>
	</table>
	@else
		<br><p class="info-message">There is No Orders Available</p>

	@endif
</section>


<section class="row orders" id="od-pending">
 	<h1 class="header-1">Pending Orders</h1>
 	@if($pending_orders->count()>0)
	<table class="table table-responsive">
	  <thead>
	    <tr>
	      <th>Date</th>
	      <th>Name</th>
			<th>qty</th>
			<th>Total</th>
	      <th>Type</th>
	      <th>Number</th>
	      <th>Manage</th>
	    </tr>
	  </thead>
	  <tbody class="table-hover">
	  
		@foreach($pending_orders as $p_order)
 	    <tr>
 	      <td class="serial">{{$p_order->created_at->format('d M Y')}}</td>
 	      <td >{{$p_order->user->first_name.' '.$p_order->user->last_name}}</td>
 	      <td>{{$p_order->qty}}</td>
 	      <td>{{$p_order->total}}<span class="taka">&#2547;</span></td>
 	      <td>{{$p_order->payment_type}}</td>
 	      <td>{{$p_order->payment_number}}</td>
 	      <td>
 	      	<a href="{{route('admin-view-order',['order_id' => $p_order->id])}}"><i title="View Order" class="fa fa fa-eye" aria-hidden="true"></i></a>

	      	<a href="{{route('update-order-status',['order_id' => $p_order->id])}}"><i title="{{$p_order->status == 0 ? 'Confirm Order' : 'Cancel Order'}}" class="fa {{$p_order->status == 0 ? 'fa-check' : 'fa-times'}}" aria-hidden="true"></i></a>

	      	<a href="{{route('delete.order',['order_id' => $p_order->id])}}"><i title="Delete Order" class="fa fa-trash-o" aria-hidden="true" style="color:#af0202"></i></a>
 	      </td>
 	    </tr>
 	    @endforeach
	  </tbody>
	</table>
	@else
		<br><p class="info-message">There is No Orders in Pending</p>
	@endif
</section>
@endsection