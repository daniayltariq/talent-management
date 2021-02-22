@extends('web.layouts.app')


@section('styles')
<style type="text/css">
.section.blog{
	background: #fff;
}
</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">Welcome to The Talent Depot</h1>
			</div>
		</div>
	</div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog">
	<div class="container">
		<div class="row">
			<div class="blog__posts col-md-12">
				<div class="text-center">
					<h4>{{ $user->f_name }} has not setup their profile page yet.</h4>
					<p>Please check back later.</p>
					<img style="margin: auto;" src="{{ asset('web/img/img1.jpg') }}" class="img img-responsive img-fluid">
					
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<!-- Blog Section End -->
@endsection