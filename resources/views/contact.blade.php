@extends('layouts.mainDark')

@section('title')
Contact
@endsection


@section('content')


<section class="row contact" id="contact">

	<!-- Contact Page Left Section -->
	<div class="col-md-6 col-sm-6 col-xs-12 contact-info">
		
		<div class="row address">
			
				<p>
				<i class="fa fa-location-arrow" aria-hidden="true"></i>
					Zindabazar,Sylhet
				</p>

				<p>
				<i class="fa fa-phone" aria-hidden="true"></i>
					017XXXXXXXX
				</p>

				<p>
				<i class="fa fa-envelope" aria-hidden="true"></i>
					feelhungry@gmail.com
				</p>

				<button class="btn1" id="openMap">Find us on google Map</button>

			
		</div>

		<div class="row openclose">
			<h1 class="heading2">Our Opening Time</h1><br>
			<p>We are Open at 10:00am</p>
			<p>We are closed at 11:30pm</p>
		</div>
		

	</div>

	<!-- Contact Page Left Section Ends -->

	<!-- Contact Page Form Section -->
	<div class="col-md-6 col-sm-6 col-xs-12 contact-form">
		<form class="row form-3" action="{{route('contact.submit')}}" method="POST">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h1 class="header-1">Contact Us</h1>
			</div>
			
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

			<div class="col-md-6 col-sm-6 col-xs-12">
				<label for="">Name</label>
				<input type="text" class="form-control" name="name" required>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label for="">Phone</label>
				<input type="tel" class="form-control" name="phone" required>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<label for="">Email</label>
				<input type="email" class="form-control" name="email" required>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<label for="">Message</label>
				<textarea name="message" class="form-control" id="" required></textarea>
			</div>
			{{csrf_field()}}
			<div class="col-md-12 col-sm-12 col-xs-12">
				<button class="btn1" type="submit">Leave a Message</button>
			</div>
		</form>
	</div>
	<!-- Contact Page Form Section Ends -->

</section>

<!-- Contact Page Map Starts -->
<section id="mapWrapper">
	<button class="btn2" id="closeMap" style="background-color: red">Close the Map</button>
	<div  id="map"></div>	
</section>
<!-- Contact Page Map Ends -->

@endsection
@section('scripts')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqISXnind4TIod7vADuXZOUPCrjyVQWCs"></script>
	<script src="{{URL::to('assets/js/map.js')}}"></script>
@endsection