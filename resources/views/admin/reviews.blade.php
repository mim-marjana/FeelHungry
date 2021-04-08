@extends('admin.layouts.main')
@section('content')
<section class="row admin-review">
 	<h1 class="header-1">
 		Customer Reviews
 	</h1>

	<ul>
		@foreach($reviews as $review)
		<li>
			<div class="admin-edit">
				<i title="Delete The Review" class="fa fa-times deleteReview" aria-hidden="true" data-id="{{$review->id}}"></i>
			</div>
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
@endsection

@section('scripts')
<script>
	var deleteReview = '{{route('delete.review')}}';
	var token = '{{Session::token()}}';
</script>
@endsection