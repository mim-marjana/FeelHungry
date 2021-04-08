@extends('layouts.main')

@section('title')
Gallery
@endsection


@section('content')

<!-- Gallery Page Top Header -->
<section class="row galleries-header top-header">
	<div class="mask">
		<h1 class="heading1">Our Galleries</h1>
	</div>
</section>
<!-- Gallery Page Top Header Ends -->



<!-- Gallery Page Photos Section -->
<section class="row galleries-photo lightbox">

	@foreach($galleries as $gallery)
	<a class="col-md-3 col-sm-4 col-xs-6 photo" href="{{URL::to("assets/img/photos/$gallery->name")}}">
		<img src="{{URL::to("assets/img/photos/$gallery->name")}}" alt="Gallery Photo">
		<p class="caption">{{$gallery->caption}}</p>
	</a>
	@endforeach

</section>
<!-- Gallery Page Photos Section Ends -->

@endsection