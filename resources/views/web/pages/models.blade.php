@extends('web.layouts.app')

@section('content')
<section class="page__img" style="background-image: url('img/page-img.jpg')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="page__subtitle title__grey">Backstage</div>
					<h1 class="page__title">Our models</h1>
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Portfolio Section Start -->
	<div class="section portfolio">
		<div class="container">
			<div class="row">
				<div class="button-group filters-button-group">
					<button class="button title__grey is-checked" data-filter="*">all</button>
					<button class="button title__grey" data-filter=".women">WOMEN</button>
					<button class="button title__grey" data-filter=".men">MEN</button>
					<button class="button title__grey" data-filter=".stylists">Stylists</button>
					<button class="button title__grey" data-filter=".new-faces">New Faces</button>
					<button class="button title__grey" data-filter=".teenagers">Teenagers</button>
					<button class="button title__grey" data-filter=".lifestyle">Lifestyle</button>
				</div>

                <div class="col-md-12">
                	<div class="grid">
	               		<div class="grid-sizer"></div>
	               		<div class="grid-gutter"></div>
		            	<a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width1 grid-item__height1  lifestyle women" data-category="women">
			            	<img class="img-responsive" src="img/model1.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height2 new-faces lifestyle" data-category="women">
		                    <img class="img-responsive" src="img/model7.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height2 women" data-category="women">
		                    <img class="img-responsive" src="img/model8.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>

	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height2 new-faces stylists" data-category="men">
		                    <img class="img-responsive" src="img/model9.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width1 grid-item__height2 men " data-category="women">
		                    <img class="img-responsive" src="img/model10.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height1 stylists new-faces" data-category="men">
		                    <img class="img-responsive" src="img/model11.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height2 lifestyle teenagers men" data-category="men">
	                   		 <img class="img-responsive" src="img/model4.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height2 stylists teenagers" data-category="men">
		                    <img class="img-responsive" src="img/model14.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width1 grid-item__height1 new-faces" data-category="men">
		                    <img class="img-responsive" src="img/model12.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 grid-item__height2 new-faces teenagers women" data-category="men">
		                    <img class="img-responsive" src="img/model13.jpg" alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                </div>
	            </div>

			</div>
		</div>
	</div><!-- Portfolio Section End -->

	<!-- Call To Action Section Start -->
	<div class="section action no-margin">
		<div class="container">
			<div class="row">
				<div class="text__quote action__text">We have best of photographers from the fashion industry, who understands the current trend, style and format as required by clients </div>
				<a href="{{route('findtalent')}}" class="btn btn__red animation">Find Talent</a>
			</div>
		</div>
	</div>

@endsection