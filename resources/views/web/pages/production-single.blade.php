@extends('web.layouts.app')

@section('content')
	<!-- Slider Section Start -->
	<section class="page__img" style="background-image: url('/img/services_bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="page__subtitle title__grey">PRODUCTION HUB</div>
					<h1 class="page__title">Now Hiring</h1>
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Skills Section Start -->
	<section class="section services-page">
		<div class="container">
			<div class="row">
				<div class="col-md-4 services__double-img">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<img class="services__double-item img-responsive" src={{asset("img/service_1.jpg")}} alt="">
						</div>
						<div class="col-md-12 col-sm-6">
							<img class="services__double-item img-responsive" src={{asset("img/service_2.jpg")}} alt="">
						</div>
					</div>
				</div>
				<div class="services__single-img col-md-4 col-sm-6">
					<img class="img-responsive" src={{asset("img/service_3.jpg")}} alt="">
				</div>

				<div class="services-page__content services-page__content_right col-md-4 col-sm-6">
					<h3 class="services-page__title text__quote">Choose among different studios and locations</h3>
					<div class="services__text">Superior skills specific to the convention and tradeshow industry and provides you with quality interaction with potential customers. You only have four seconds to attract a visitor to your booth.</div>
					<a href="{{route('applyproduction')}}" class="more animation">apply</a>
				</div>
			</div>
			<div class="row services-page__skills">
				<div class="services-page__content col-md-3">
					<h3 class="services-page__title text__quote"><span class="line"></span>Make­up artists, stylists &amp; photo</h3>
					<div class="services-page__text">Backstage is proficient in the art of growing your booth’s traffic and executing your goal successfully. </div>
				</div>
				<div class="skills col-md-8 col-md-offset-1">
					<div class="skills__item">
						<span class="skills__icon flaticon-photo-camera"></span>
						<p class="skills__title">1 : photographer</p>
						<ul class="skills__list">
							<li class="skills__list-item">Develop skills</li>
							<li class="skills__list-item">Credibility as a fashion</li>
						</ul>
					</div>
					<div class="skills__item">
						<span class="skills__icon flaticon-shopping-bags"></span>
						<p class="skills__title">2 : MAKE UP</p>
						<ul class="skills__list">
							<li class="skills__list-item">Art of growing</li>
							<li class="skills__list-item">Quite simply</li>
						</ul>
					</div>
					<div class="skills__item">
						<span class="skills__icon flaticon-new-label"></span>
						<p class="skills__title">3 : studios</p>
						<ul class="skills__list">
							<li class="skills__list-item">Tradeshow</li>
							<li class="skills__list-item">Areas</li>
						</ul>
					</div>
					<div class="skills__item">
						<span class="skills__icon flaticon-mall-hanger"></span>
						<p class="skills__title">4 : professionals</p>
						<ul class="skills__list">
							<li class="skills__list-item">Workshops</li>
							<li class="skills__list-item">Photographers</li>
						</ul>
					</div>
					<div class="skills__item">
						<span class="skills__icon flaticon-bar-code"></span>
						<p class="skills__title">5 : locations</p>
						<ul class="skills__list">
							<li class="skills__list-item">Hire talent</li>
							<li class="skills__list-item">Spread your brand</li>
						</ul>
					</div>
					<div class="skills__item">
						<span class="skills__icon flaticon-store-mannequin"></span>
						<p class="skills__title">6 : stylists</p>
						<ul class="skills__list">
							<li class="skills__list-item">Creation Post</li>
							<li class="skills__list-item">Production</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- Skills Section End -->
@endsection