@extends('layouts.main')

@section('title')
Restaurant & Take away
@endsection
@section('content')


<!-- Home Page Slider Starts -->
<section class="row slider-wrapper" id="header">
	<div class="mask"></div>
	<div class="slider-container fulscreen-slider" id="main-slider">
		<div class="swiper-wrapper">

		@foreach($slider as $slide)

			<div class="swiper-slide carousel-slide" style="background-image:url({{URL::to("assets/img/slider/$slide->slide")}})">
				<div class="mask"></div>
				<div class="content">
					<h1>{{$slide->heading}}</h1><br>
					<p>{{$slide->slide_text}}</p><br>
					<a href="{{$slide->button_link}}"><button class="btn1">{{$slide->button_text}}</button></a>
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
</section><!-- Home Page Slider ends -->





<!-- Homapage Box navigation -->
<section class="row" id="home-nav">

	@foreach($homeNav as $nav)
	<a href="{{$nav->nav_link}}">
		<div class="col-md-3 col-sm-6 col-xs-6 hn-block">
			<div class="image">
				<img src="{{URL::to("assets/img/ctg/$nav->photo")}}" alt="">
			</div>
			<h2>{{$nav->nav_text}}</h2>
		</div>
	</a>

	@endforeach
</section>

<!-- Homapage Box navigation Ends -->




<!-- Homapage Quotes -->
<section class="row" id="quotes">
	<div class="mask">
	<p>A great restaurant is one that just makes you feel like you're not sure whether you went out or you came home and confuses you. If it can do both of those things at the same time, you're hooked.</p>
	<a href="{{route('reservation')}}"><button class="btn1">Book a table</button></a>
	<a href="{{route('menu')}}"><button class="btn1">Order now</button></a>
	</div>
</section>
<!-- Homapage Quotes -->



<!-- Homapage Most Loved Dish -->
@if($loved_dish->count()>0)
<section class="row home-dish loved-dish">
	<div class="mask"></div>

	<div class="col-md-3 col-sm-4 col-xs-12 dish-heading">
		<h1>Most Loved Dish</h1>
	</div>
	@foreach($loved_dish as $dish)
	<div class="col-md-3 col-sm-4 col-xs-6 dish-block">
		<div class="row dish-image">
			<img src="{{URL::to('assets/img/dish/'.$dish->photo.'')}}" alt="">
			<button class="btn1 addToCart" value="{{$dish->id}}">Add to cart</button>
		</div>
		<div class="row dish-title">
			<h2>{{$dish->name}}</h2>
			<p>{{$dish->price}}<span class="taka">&#2547;</span></p>
		</div>
	</div>
	@endforeach
</section>
@endif

<!-- Homapage Most Loved Dish Ends -->



<!-- Homapage Chef Special Dish -->
@if($chef_dishes->count()>0)
<section class="row home-dish chef-dish">
	<div class="mask"></div>

	<div class="col-md-3 col-sm-4 col-xs-12 dish-heading">
		<h1>Chef Special Dish</h1>
	</div>

	@foreach($chef_dishes as $dish)
	<div class="col-md-3 col-sm-4 col-xs-6 dish-block">
		<div class="row dish-image">
			<img src="{{URL::to('assets/img/dish/'.$dish->photo.'')}}" alt="">
			<button class="btn1 addToCart"  value="{{$dish->id}}">Add to cart</button>
		</div>
		<div class="row dish-title">
			<h2>{{$dish->name}}</h2>
			<p>{{$dish->price}}<span class="taka">&#2547;</span></p>
		</div>
	</div>
	@endforeach

</section>
@endif
<!-- Homapage Chef Special Dish Ends -->
@endsection



@section('scripts')
<script src="{{URL::to('assets/js/dish.js')}}"></script>
<script>
	var token ='{{Session::token()}}';
   var postAddress ='{{route('addTocart')}}';
</script>
@endsection
