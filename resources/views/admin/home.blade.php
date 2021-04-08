@extends('admin.layouts.main')
@section('content')

<section class="row" id="admin-slider">
	<h1 class="header-1">Home page Slider</h1>

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

	<div class="slider-container fulscreen-slider" id="admin-slider-container">
		<div class="swiper-wrapper">

		@foreach($slider as $slide)
			<div class="swiper-slide carousel-slide" style="background-image:url({{URL::to('assets/img/slider/'.$slide->slide.'')}})">
				<div class="admin-edit">
					<i title="Edit The Slide" class="fa fa-pencil editSlide" aria-hidden="true" data-id="{{$slide->id}}"></i>
					<i title="Delete The Slide" data-id="{{$slide->id}}" class="fa fa-times deleteSlide" aria-hidden="true"></i>
				</div>
				<div class="mask"></div>
				<div class="content">
					<h1>{{$slide->heading}}</h1><br>
					<p>{{$slide->slide_text}}</p><br>
					<a href="{{$slide->button_link}}" target="_blank"><button class="btn1">{{$slide->button_text}}</button></a>
				</div>
			</div>
		@endforeach
		</div>

		<!-- Pagination -->
		<div class="swiper-pagination"></div>

		<!-- Navigation buttons -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>


	<button class="btn1 addSlide">Add New Slide</button>


	<!-- Add New Slide Form -->
	<div class="form-3-wrapper" id="add-Slide-form">
		<img src="../assets/img/nav-close.png" id="close-add-slide-form" class="close-form" alt="">
		<h2>Add New Slide</h2>
		<form class="row form-3" action="{{route('add.new.slide')}}" method="POST" enctype="multipart/form-data">
			<div class="col-md-3">
				<label for="name">Slide Photo</label>
				<input type="file" name="slide" class="form-control" required>
			</div>
			<div class="col-md-9">
				<label for="name">Slide Heading</label>
				<input type="text" name="heading" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="name">Button Text</label>
				<input type="text" name="button_text" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="name">Button Link</label>
				<input type="text" name="button_link" class="form-control" required>
			</div>
			<div class="col-md-12">
				<label for="slide-description">Slide Description</label>
				<textarea name="slide_text" class="form-control" required></textarea>
			</div>
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Add Slide</button>
			</div>
		</form>
	</div>
	<!-- Add New Slide Form -->



	<!-- Edit The Slide -->
	<div class="form-3-wrapper" id="edit-Slide-form">
		<img src="../assets/img/nav-close.png" id="close-slide-form" class="close-form" alt="">

		<h2>Update The Slide</h2>

		<form class="row form-3 left" method="POST" action="{{route('edit.slide.submit')}}" enctype="multipart/form-data">
			<div class="col-md-9">
				<label for="name">Slide Heading</label>
				<input type="text" name="heading" class="form-control heading" >
			</div>
			<div class="col-md-3">
				<label for="name">Slide Photo</label>
				<input type="file" name="slide" class="form-control">
			</div>

			<div class="col-md-6">
				<label for="name">Button Text</label>
				<input type="text" name="button_text" class="form-control button_text" >
			</div>

			<div class="col-md-6">
				<label for="name">Button Link</label>
				<input type="text" name="button_link" class="form-control button_link" >
			</div>
			<div class="col-md-12">
				<label for="slide_text">Slide Description</label>
				<textarea name="slide_text" class="form-control slide_text"></textarea>
			</div>
			{{csrf_field()}}
			<input type="hidden" value="" name="slide_id" class="slide_id">

			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Update Slide</button>
			</div>
		</form>
	</div>
	<!-- Edit The Slide -->
</section>

<!-- Home Page Slider Ends -->






<section class="row admin-home-section">
	<h1 class="header-1">Short Navigation</h1>
	<ul>
		@foreach($homeNav as $nav)
		<li>
			<img src="{{URL::to("assets/img/ctg/$nav->photo")}}" alt="">
			<h2>{{$nav->nav_text}}</h2>
			<div class="admin-edit">
				<i title="Edit Navigation" class="fa fa-pencil editShortNav" aria-hidden="true" data-id="{{$nav->id}}"></i>
			</div>
		</li>
		@endforeach
	</ul>

	<div class="form-3-wrapper" id="edit-short-nav-form">
		<img src="../assets/img/nav-close.png" id="close-short-nav-form" class="close-form" alt="">

		<h2>Update The Navigation</h2>

		<form class="row form-3 left" method="POST" action="{{route('edit.nav.submit')}}" enctype="multipart/form-data">
			<div class="col-md-12">
				<label for="name">Navigation Photo</label>
				<input type="file" name="photo" class="form-control">
			</div>
			<div class="col-md-12">
				<label for="name">Navigation Heading</label>
				<input type="text" name="nav_text" class="form-control heading" value="">
			</div>
			<div class="col-md-12">
				<label>Navigation Anchor</label>
				<input type="text" name="nav_link" class="form-control link" value="">
			</div>
			{{csrf_field()}}
			<input type="hidden" name="id" class="id" value="">
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit"> Update Navigation</button>
			</div>
		</form>
	</div>
</section>




<section class="row admin-home-section">
	<h1 class="header-1">Most Loved Dish</h1>
	<ul>
		@if($loved_dish->count()>0)
			@foreach($loved_dish as $dish)
			<li>
				<img src="{{URL::to('assets/img/photos/'.$dish->photo.'')}}" alt="">
				<h3>{{$dish->name}}</h3>
				<div class="admin-edit">
					<a href="{{route('remove.lovedDish',['dish_id'=>$dish->id])}}"><i title="Remove from this List" class="fa fa-times" aria-hidden="true" style="background:#b50505"></i></a>
				</div>
			</li>
			@endforeach
		@else
			<p>There are No Dish Available for this Category</p>
		@endif

	</ul>

	<button class="btn1 addLovedDish">Add New Dish to the List</button>
	<div class="form-3-wrapper" id="add-loved-dish-form">
		<img src="../assets/img/nav-close.png" id="close-loved-dish-form" class="close-form" alt="">

		<h2>Add Dish to Most Loved Dish</h2>

		<form class="row form-3 left" method="POST" action="{{route('add.to.lovedDish')}}">
			<div class="col-md-12">
				<label for="name">Select The Dish</label>
				<select name="dish_id" class="form-control">
					<option value="">Select A Dish</option>
					@foreach($dishes as $dish)
					<option value="{{$dish->id}}">{{$dish->name}}</option>
					@endforeach
				</select>
			</div>
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Add to the list</button>
			</div>
		</form>
	</div>
</section>






<section class="row admin-home-section" id="admin-chef-special">
	<h1 class="header-1">Chef Special Dish</h1>
	<ul>
		@if($chef_dishes->count()>0)
			@foreach($chef_dishes as $dish)
			<li>
				<img src="{{URL::to('assets/img/photos/'.$dish->photo.'')}}" alt="">
				<h3>{{$dish->name}}</h3>
				<div class="admin-edit">
					<a href="{{route('remove.chefSpecial',['dish_id'=>$dish->id])}}"><i title="Remove from this List" class="fa fa-times" aria-hidden="true" style="background:#b50505"></i></a>
				</div>
			</li>
			@endforeach
		@else
			<p>There are No Dish Available for this Category</p>
		@endif
	</ul>

	<button class="btn1 addChefDish">Add New Dish to the List</button>
	<div class="form-3-wrapper" id="add-chef-dish-form">
		<img src="../assets/img/nav-close.png" id="close-chef-dish-form" class="close-form" alt="">

		<h2>Add Dish to Chef Special</h2>

		<form class="row form-3 left" method="POST" action="{{route('add.to.chefspecial')}}">
			<div class="col-md-12">
				<label for="name">Select The Dish</label>
				<select name="dish_id" class="form-control">
					<option value="">Select A Dish</option>
					@foreach($dishes as $dish)
					<option value="{{$dish->id}}">{{$dish->name}}</option>
					@endforeach
				</select>
			</div>
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Add to the list</button>
			</div>
		</form>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var deletSLideRoute = '{{route('delete.slide')}}';
	var EditSlide = '{{route('edit.slide')}}';
	var EditNav = '{{route('edit.nav')}}';
	var token = '{{Session::token()}}';
</script>
@endsection