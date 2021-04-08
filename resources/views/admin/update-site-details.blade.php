@extends('admin.layouts.main')
@section('content')
<section class="row admin-profile-update">
    <form class="form form-1 col-md-12" action="{{route('details.update.submit')}}" method="POST" enctype="multipart/form-data"> 

    	@if(Session::has('success'))
		<div class="col-md-12 t-center">
			<p class="success-message">{{Session::get('success')}}</p>
		</div>
		@endif

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 t-center">
                <h1 class="header-1">Update Website Details</h1>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<label for="">Name</label>
               <input type="text" name="name"  class="form-control"  value="{{$details->name}}"  >
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
            	<label for="">Email</label>
               <input type="email" name="email"  class="form-control" value="{{$details->email}}"  >
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
            	<label for="">Phone</label>
                <input type="text" name="phone" class="form-control"  value="{{$details->phone}}"  >
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<label for="">Website Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12">
            	<label for="">Location</label>
               <input type="text" name="location" class="form-control"  value="{{$details->location}}"  >
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <label for="">Dashboard Logo</label>
                <input type="file" name="dash_logo" class="form-control">
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
            	<label for="">Open Time</label>
               <input type="text" name="open_time" class="form-control" value="{{$details->open_time}}">
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
            	<label for="">Close Time</label>
               <input type="text" name="close_time"  class="form-control" value="{{$details->close_time}}" >
            </div>

            <div class="col-md-12 col-sm-4 col-xs-4">
            	<label for="">Map Link</label>
               <input type="text" name="map_link" class="form-control" value="{{$details->map_link}}" >
            </div>
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$details->id}}">
            <div class="col-md-12 col-sm-12 col-xs-12 t-center">
            	<button class="btn1" type="submit">Update Profile</button>
            </div>
        </div>

    </form>
</section>

@endsection