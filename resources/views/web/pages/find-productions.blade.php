@extends('web.layouts.app')

@section('content')
	<section class="page__img" style="background-image: url('img/page-img.jpg')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="{{-- page__subtitle --}} title__grey">Production Hub</div>
					<h1 class="page__title">Now Hiring</h1>
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Services Section Start -->
	<section class="section services">
		<div class="container">
			<div class="row">

					<div class="services__section clearfix">
						<div class="col-md-6 services__content services__content_left">
							<h3 class="services__title services__title_l">Now Hiring in New York: A Web Series Needs a Boom Op, DP for a Short Film + More Production Crew Jobs</h3>
							<div class="services__text">Paying production crew jobs that are now hiring in and around New York include videographers, hairstylists, post-production opportunities, and more.</div>
							<a href="{{ route('singleproduction')}}" class="more animation">Learn More</a>
						</div>
						<div class="col-md-6 services__photo"><img src="img/services__photo.jpg" alt=""></div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__photo"><img src="img/services__photo2.jpg" alt=""></div>
						<div class="col-md-6 services__content services__content_right">
							<h3 class="services__title services__title_r">Brand ambassadors</h3>
							<div class="services__text">We have many different tried and tested methods along with free advice to make your journey into modeling a safe and exciting opportunity.</div>
							<a href="services.html" class="more animation">Learn More</a>
						</div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__content services__content_left">
							<h3 class="services__title services__title_l">Timely delivery</h3>
							<div class="services__text">Our Agency offers you the chance to discover your modeling potential and equip you with the tools that can help you get signed and promoted professional </div>
							<a href="services.html" class="more animation">Learn More</a>
						</div>
						<div class="col-md-6 services__photo"><img src="img/services__photo3.jpg" alt=""></div>
					</div>
					<nav class="blog__pagination blog__pagination_full-w">
			  <ul class="pagination">
			    <!-- <li>
			      <a href="#" class="prev" aria-label="Previous">
			        <span aria-hidden="true">Previous</span>
			      </a>
			    </li> -->
			    <li class="active"><a href="#">01 <span class="sr-only">(current)</span></a></li>
			    <li><a href="#">02</a></li>
			    <li><a href="#">03</a></li>
			    <li><a href="#">04</a></li>
			    <li><a href="#">05</a></li>
			    <li><a href="#">...</a></li>
			    <li><a href="#">06</a></li>
			    <li>
			      <a href="#" class="next" aria-label="Next">
			        <span aria-hidden="true">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>
			</div>
		</div>
	</section><!-- Services Section End -->
@endsection