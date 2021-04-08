@extends('admin.layouts.main')
@section('content')

<section class="row" id="invoice-container">
	<div class="col-md-12 text-center"><h1 class="header-1">All invoice's</h1></div>
	 <ul class="invoice-ul">
		@foreach($orders as $order)
	 	<a href="{{route('invoice.view',['id'=>$order->id])}}"><li class="invoiceItem" data-id="{{$order->id}}">
	 		<h2>#{{$order->id}}</h2>
	 		<h3>{{$order->user->first_name.' '.$order->user->last_name}}</h3>
			<p>{{$order->created_at->format('d M Y')}}</p>
			<p class="total">{{$order->total}}<span class="taka">&#2547;</span></p>
	 	</li></a>
		@endforeach
	 </ul>
	 {{$orders->links()}}
</section>
@endsection