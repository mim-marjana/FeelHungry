@extends('layouts.main')


@section('title')
Our Menu
@endsection

@section('content')



<!-- Menu Page Top Header -->
<section class="row menu-header top-header">
	<div class="mask">
		<h1 class="heading1">Our Menu</h1>
	</div>
</section>

<!-- Menu Page Top Header Ends -->




<!-- Menu Page Fixed Navigation -->
<section class="" id="menu-navigation">
	<div class="menu-open">
		<img src="assets/img/nav-icon.png" alt="">
	</div>
	<div class="menu-close">
		<img src="assets/img/nav-close.png" alt="">
	</div>
	<ul>
		@foreach($categories as $category)
		<li><a href="#{{$category->category_id}}" onclick="$('#{{$category->category_id}}').animatescroll({padding:80});">{{$category->name}}</a></li>
		@endforeach
	</ul>
</section>
<!-- Menu Page Fixed Navigation Ends -->




<!-- Menu Page Dish Listing With Categories -->
<section class="row menu-wrapper">
	@if(Session::has('success'))
	<div class="col-md-12">
		<p class="success-message">{{Session::get('success')}}</p>
	</div>
	@endif
	
	@foreach($categories as $category)
	<div class="col-md-12 cat-block" id="{{$category->category_id}}">
		<h2 class="heading1">{{$category->name}}</h2>
		<ul>
			@foreach($category->dishes as $dish)
			<li>
				<h1>{{$dish->name}}</h1>
				<h2>{{$dish->price}}<span class="taka">&#2547;</span></h2>
				<p>{{$dish->details}}</p>
				<button class="cart addToCart" value="{{$dish->id}}">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</button>
			</li>
			@endforeach
		</ul>
	</div>
	@endforeach
</section>
<!-- Menu Page Dish Listing With Categories Ends -->


@endsection

@section('scripts')
<script src="{{URL::to('assets/js/dish.js')}}"></script>
<script>
	var token ='{{Session::token()}}';
   var postAddress ='{{route('addTocart')}}';
</script>
@endsection