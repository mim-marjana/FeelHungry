@extends('layouts.mainDark')
@section('title')
Reviews
@endsection
@section('content')
<!-- About Page All Reviews-->
<section class="row" id="search-reviews">
	<div class="search-rev" >
	 	<form  action="{{route('search.review')}}" method="POST" class="row">
			<label>Search reviews by name</label>
			<div class="input-group col-md-12 col-sm-12 col-xs-12">
	      	<input type="" class="form-control" name="name" required="required" value="{{$search_item}}">
				<div class="input-group-addon pad0">
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
				{{csrf_field()}}
			</div>
	 	</form>
	</div>

	@if($reviews->count() > 0)
		<div class="col-md-12 col-sm-12 t-center">
			<p class="search-hint">Search Results for <span>{{$search_item}}</span></p>
		</div>
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
	@else
	<div class="col-md-12 col-sm-12 t-center">
			<p class="search-hint">No Reviews Found for <span>{{$search_item}}</span></p>
		</div>
	@endif

	
</section>
<!-- About Page All Reviews Ends-->
@endsection