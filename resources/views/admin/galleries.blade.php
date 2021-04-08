@extends('admin.layouts.main')
@section('content')
<section class="row galleries-photo admin-galleries-photo">

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

	@foreach($photos as $photo)
	<div class="col-md-3 col-sm-4 col-xs-6 photo">
		<img src="{{URL::to('assets/img/photos/'.$photo->name.'')}}" alt="">
		<p class="caption">{{$photo->caption}}</p>
		<div ><div class="admin-edit">
			<a href="{{route('delete.photo',['id'=>$photo->id])}}"><i title="Delete Photo" class="fa fa-times" aria-hidden="true"></i></a>
			<i title="Delete Photo" class="fa fa-pencil editPhoto" aria-hidden="true" data-id="{{$photo->id}}"></i>
		</div></div>
	</div>
	@endforeach

	<div class="col-md-12 col-sm-12 t-center">
		<button class="btn1" id="addPhoto" >Add New Photo</button>
	</div>


	<!-- The Form for Adding Gallery photo -->
		<div class="form-3-wrapper" id="add-photo-form">
			<img src="../assets/img/nav-close.png" id="close-cat-form" class="close-form" alt="">
			<h2>Add New Photo</h2>
			<form class="row form-3" enctype="multipart/form-data" method="POST" action="{{route('add.new.photo')}}">
				<label>Photo</label>
				<input type="file" name="photo" class="form-control" placeholder="Category Name">
				<label>Caption</label>
				<input type="text" name="caption" class="form-control" placeholder="Category Name">
				{{csrf_field()}}
				<div class="col-md-12 text-center">
					<button class="btn1 text-left">Submit</button>
				</div>
			</form>

		</div>
	<!-- The Form for Adding Gallery photo -->



	<!-- The Form for Editing Gallery photo -->
		<div class="form-3-wrapper" id="photo-edit-form">
			<img src="../assets/img/nav-close.png" id="close-cat-form" class="close-form" alt="">
			<h2>Edit the Photo</h2>
			<form class="row form-3" method="POST" action="{{route('edit.photo.submit')}}" enctype="multipart/form-data"  >
				<label>Photo</label>
				<input type="file" name="photo" class="form-control" placeholder="Category Name">
				<label>Caption</label>
				<input type="text" name="caption" class="form-control caption" placeholder="Category Name">
				{{csrf_field()}}
				<input type="hidden" name="id" class="id" value="">
				<div class="col-md-12 text-center">
					<button class="btn1 text-left">Submit</button>
				</div>

			</form>
		</div>
	<!-- The Form for Editing Gallery photo -->

</section>

@endsection

@section('scripts')
	<script>
		var token = '{{Session::token()}}';
		var editPhoto = '{{route('edit.photo')}}';
	</script>
@endsection