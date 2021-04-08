@extends('layouts.mainDark')


@section('title')
Reservation
@endsection

@section('content')


<!-- Reservation Page Full -->
<section class="row" id="reserve">

	<!-- Reservation Page Left Section -->
	<div class="col-md-6 col-sm-6 col-xs-12 reserve-text">
		<h1 class="">
			Book Your Table
		</h1>
		<p class="paragraph-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium illo perferendis autem dolorem, earum natus temporibus velit! Voluptates corporis illo aspernatur, incidunt quos cupiditate debitis molestias, aliquam ea quia nemo</p>
		<p> * For more than 10 Persons please contact Us for the Booking</p>
		<ul>
			<li>
				<a href="{{route('contact')}}"><button class="btn1">Contact Us</button></a>
			</li>
			<li>
				<p>Telephone</p>
				<a href="">+880173XXXXXXX</a>
			</li>
		</ul>
	</div>
	<!-- Reservation Page Left Section Ends -->


	<!-- Reservation Page Form Section -->
	<div class="col-md-6 col-sm-6 col-xs-12 reserve-form">
		<div class="row">

			@if(Session::has('success'))
				<div class="col-md-12">
					<p class="success-message">{{Session::get('success')}}</p>
				</div>
			@endif
			@if(Session::has('error'))
				<div class="col-md-12">
					<p class="error-message">{{Session::get('error')}}</p>
				</div>
			@endif

			<!-- Reservation Form-->
			<form action="{{route('reservation.submit')}}" method="POST" class="form">
				<div class="col-md-12">
					<label for="dob">Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name" required>
				</div>
				<div class="col-md-6">
					<label for="dob">Phone</label>
					<input type="tel" class="form-control" name="phone" placeholder="Phone" required>
				</div>
				<div class="col-md-6">
					<label for="dob">Pick Your Day</label>
					<input type="" class="form-control" name="date" id="datepicker" value="01 Jan 2021" data-date-format="dd M yyyy" required>
				</div>

				<div class="col-md-12">
					<label for="person">Number of Person</label>
					<select class="form-control" name="person" required>
					  <option value="">Number of Person</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="8">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					</select>
				</div>
				<div class="col-md-12">
					<label for="dob">Pick Your Time</label>
					<select class="custom-select form-control" name="time">
					  <option value="">Select Time Slot</option>
					  <option value="Breakfast">Breakfast</option>
					  <option value="Lunch">Lunch</option>
					  <option value="Dinner">Dinner</option>
					</select>
				</div>
				{{csrf_field()}}
				<div class="col-md-12">
					<button type="submit">Make Reservation <img src="assets/img/right-arrow.png" alt=""></button>
				</div>
			</form><!-- Reservation Form Ends-->

		</div>
	</div>
	<!-- Reservation Page Form Section Ends -->

</section>

@endsection