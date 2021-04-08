@extends('layouts.main')


@section('title')
About
@endsection


@section('content')



<!-- About Page Header Section -->
<section class="row about-header">
	<div class="mask">
		<h1>We are "Feel Hungry?"</h1>
		<p>Welcome to Feel Hungry! At Feel Hungry, We will provide you with an excellent option to avail fresh nutritious and cost effective meals for you and your family. We guarantee you will find taste and quality of the food to be sumptuous. Feel Hungry a friendly experience where the regulars greet each other with smiles and humor. The owners, MIM and MOUMITA , always have something special on the menu and it is served up with the most exceptional welcome drinks! So come or do order online and enjoy our premium quality food.</p>
		<a href="{{route('menu')}}"><button class="btn1">Order Now</button></a>
		<a href="{{route('reservation')}}"><button class="btn1">Book a table</button></a>
	</div>
</section>
<!-- About Page Header Section Ends -->




<!-- About Page Details Section -->
<section class="row about">
	<div class="col-md-5 about-left">
		<img src="assets/img/photos/7.jpg" alt="">
	</div>
	<div class="col-md-7 col-sm-12 col-xs-12 about-right">
		<h2>We are not just a regular restaurant</h2>
		<h1>We are the best you can find in town</h1>
		<p>'Feel Hungry' was first established in 2017. With the finest authentic Herbs and Spices and a true passion for Fast Food Restaurant, Feel Hungry had been offering the unique array of delightful dishes which we, in Stripe, have come to know today. It is the unique cooking style of Head Chef Mr. Suhan, which had been the foundation of Feel Hungry reputation for providing the finest Fast Food Restaurant in Stripe.</p>
		<a href="{{route('contact')}}"><button class="btn1">Contact Us</button></a>
	</div>
</section>
<!-- About Page Details Ends -->




<!-- About Page Reviews Sliders -->
<section class="row" id="reviews-small">
	<div class="col-md-12">
		<h1 class="heading1">Customer Reviews</h1>
	</div>
	@if(Session::has('success'))
		<div class="col-md-12">
			<p class="success-message">{{Session::get('success')}}</p>
		</div>
	@endif

    <div class="col-md-12">
        <div class="row review-slide" >

            @foreach($reviews_slides as $slide)

            <div class="col-md-4 col-sm-4 col-xs-12 review-box">
                <div class="mask"></div>
                <div class="details">
                    <h1>{{$slide->name}}</h1><br>
                    <h2>{{$slide->email}}</h2>
                    <p>“{{$slide->comment}}.”</p>
                    <div class="rating">
                    	@for ($i=1;$i<=$slide->rating;$i++)
                        <img src="{{URL::to('assets/img/star.png')}}" alt="">
                        @endfor
                    </div>
                </div>
            </div>

            @endforeach


        </div>
        <div class="row arrows">
            <span id="brand-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
            <span id="brand-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            <br>
            <button class="btn1" id="openReview" style="margin-top: 40px;">See All reviews</button><br>
            <button class="btn1" id="psotReview">Leave Your Feedback</button>
        </div>

    </div>
</section>
<!-- About Page Reviews Sliders Ends-->




<!-- About Page All Reviews-->
<section class="full-review" id="full-review">
	
	<div class="search-rev" >
	 	<form  action="{{route('search.review')}}" method="POST" class="row">
			<label>Search reviews by name</label>
			<div class="input-group col-md-12 col-sm-12 col-xs-12">
	      	<input type="" class="form-control" name="name" required="required">
				<div class="input-group-addon pad0">
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
				{{csrf_field()}}
			</div>
	 	</form>
	</div>

	<img src="assets/img/nav-close.png" alt="" id="closeReview">

	<ul>

      @foreach($reviews as $review)
		<li>
			<div class="rating">
            @for ($i=1;$i<=$review->rating;$i++)
         	<img src="{{URL::to('assets/img/star.png')}}" alt="">
            @endfor
         </div>
			<p>“{{$review->comment}}”</p>
         <h2>{{$review->name}}</h2>
		</li>
        @endforeach
	</ul>
</section>
<!-- About Page All Reviews Ends-->



<!-- About Page Team Section -->
<section class="row" id="team">
	<h1 class="heading1">Meet Our Team</h1>
	<ul class="team-list">
        
         @foreach($team as $member)
		<li>
			<div class="team-photo">
				<img src="{{URL::to("assets/img/team/$member->photo")}}" alt="">
			</div>
			<div class="content">
				<h3>{{$member->name}}</h3>
				<p>{{$member->designation}}</p>
			</div>
		</li>
        @endforeach
	</ul>
</section>
<!-- About Page Team Ends -->




<!-- About Page Review Form-->
	<div id="review-form">
		<img src="../assets/img/nav-close.png" id="close-rev-form" class="close-form" alt="">
		<h2 >Leave Your feedback</h2><br>
		<form class="row form-3 center" action="{{route('post.review')}}" method="POST">
			<div class="col-md-6">
				<input type="text" name="name" class="form-control" placeholder="Name" required>
			</div>
			<div class="col-md-6">
				<select name="rating" class="form-control" required>
					<option value="">Rating</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div class="col-md-12">
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="col-md-12">
				<textarea name="comment" class="form-control" placeholder="Write Your Comment" required></textarea>
			</div>
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Submit</button>
			</div>


		</form>
	</div>
<!-- About Page Review Form Ends -->

@endsection