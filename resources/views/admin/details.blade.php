@extends('admin.layouts.main')
@section('content')
<section class="row" id="siteDetails">
	@if(Session::has('success'))
		<div class="col-md-12">
			<p class="success-message">{{Session::get('success')}}</p>
		</div>
	@endif
	@foreach($details as $info)
	<div class="col-md-12 detailsDiv">
		<h2>General Information</h2>
		<ul>
			<li><p class="title">Name</p> <p>{{$info->name}}</p></li>
			<li><p class="title">Email</p> <p>{{$info->email}}</p></li>
			<li><p class="title">Phone</p> <p>{{$info->phone}}</p></li>
			<li><p class="title">Location</p> <p>{{$info->location}}</p></li>
			<li><p class="title">Website logo</p> <img src="{{URL::to('assets/img/'.$info->logo.'')}}" alt="Website Logo"></li>
			<li><p class="title">Dashboard logo</p> <img src="{{URL::to('assets/img/'.$info->dash_logo.'')}}" alt="Deshboard Logo"></li>
			<li><p class="title">Open</p> <p>{{$info->open_time}}</p></li>
			<li><p class="title">Close</p> <p>{{$info->close_time}}</p></li>
		</ul>
		<a href="{{route('admin.details.update')}}"><button class="btn1 editDetails">Edit Information</button></a>
	</div>
	@endforeach


	<div class="col-md-12 detailsDiv">
		<h2>Social Links</h2>
		<ul>
			@foreach($socials as $social)
			<li><i  class="fa {{$social->icon_class}}" aria-hidden="true"></i><p><a href="{{$social->link}}" target="_blank">{{$social->name}}</a></p></li>
			@endforeach
		</ul>
		<button class="btn1">Edit Socials</button>
	</div>
</section>
@endsection