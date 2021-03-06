@extends('web.layouts.app')


@section('title', '403')
@section('styles')
<style type="text/css">

</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">403</h1>
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
					<h4>Forbidden</h4>
					<img style="margin: auto;width: 25%" src="{{ asset('web/img/errors/403.jpeg') }}" class="img img-responsive img-fluid">
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<!-- Blog Section End -->
@endsection