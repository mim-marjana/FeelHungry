@extends('admin.layouts.main')
@section('content')
<section class="row dashboard" id="">
	<div class="col-md-8 col-sm-8 col-xs-12 dash-block ">
		<div class="row inner intro">
			<div class="col-md-4 col-sm-4 col-xs-4 img"><img src="{{URL::to('assets/img/admins/'. Auth::user()->avatar .'')}}" alt=""></div>
			<div class="col-md-8 col-sm-8 col-xs-8 details">
				<h1>Welcome back</h1>
				<h2>{{$admin->first_name}} {{$admin->last_name}}</h2>
				<h3>Welcome Back to your dashboard.You have <span style="font-weight:bold">{{$pendingOrders}}</span> Orders and <span style="font-weight:bold">{{$reservationsPending}}</span> Reservations pending for Confirmation. Have a Good Day</h3>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-4 hidden-xs dash-block">
		<div class="inner time">
			<h1>{{date('h')}}<span>:</span>{{date('i')}}</h1>
			<h2>{{date('d F Y')}}</h2>
		</div>
	</div>
</section>
<section class="row stats">
	<div class="col-md-12  section earnings">
		<ul>
			<li>
				<h2>Total Earnings</h2>
				<p>{{$totalEarning}}<span class="taka">&#2547;</span></p>
			</li>
			<li>
				<h2>Todays Earnings</h2>
				<p>{{$TodaysEarnings}}<span class="taka">&#2547;</span></p>
			</li>
			<li>
				<h2>Total Payments Today</h2>
				<p>{{$todaysPaymentsNumber}}</p>
			</li>
		</ul>
	</div>
	<div class="col-md-12 section orders-stats">
		<ul>
			<li>
				<h2>Orders Pending</h2>
				<p>{{$pendingOrders}}</p>
			</li>
			<li>
				<h2>Orders Confirmed Today</h2>
				<p>{{$successfullOrderToday}}</p>
			</li>
			<li>
				<h2>Total Successfull Orders</h2>
				<p>{{$successfullOrdersOverall}}</p>
			</li>
		</ul>
	</div>
	<div class="col-md-12 section dish-stats">
		<ul>
			<li>
				<h2>Total Dish Types</h2>
				<p>{{$totalCategory}}</p>
			</li>
			<li>
				<h2>Total Dishes</h2>
				<p>{{$totalDish}}</p>
			</li>
			<li>
				<h2>Pending Reservations</h2>
				<p>{{$reservationsPending}}</p>
			</li>
		</ul>
	</div>
</section>

@endsection