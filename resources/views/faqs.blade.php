@extends('layouts.main')

@section('title')
Faqs
@endsection

@section('content')
  <section class="row galleries-header top-header faqsHeader">
    <div class="mask">
      <h1 class="heading1">FAQ's</h1>
    </div>
  </section>
	<section class="row faq">
      @foreach($faqs as $faq)
          <h2>{{$faq->question}}</h2>
          <p>{{$faq->answer}}</p>
      @endforeach
 </section>

	
@endsection