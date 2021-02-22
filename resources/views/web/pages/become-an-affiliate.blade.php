@extends('web.layouts.app')

@section('content')

<section class="page__img" style="background-image: url('{{ asset('web/img/page-img.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				{{-- <div class="page__subtitle title__grey">The Talent depot</div> --}}
				<h1 class="page__title">Become an Affiliate</h1>
			</div>
		</div>
	</div>
</section><!-- Slider Section End -->

<section class="section services">
	<div class="container">
		<div class="row">
			<div class="services__section clearfix">
				<div class="col-md-12">
					<h4 style="text-align: justify;">Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Doloribus impedit explicabo perferendis, ipsum aperiam. Fugiat id assumenda cum ab eius odit, numquam laboriosam, eveniet corrupti molestias suscipit amet debitis omnis placeat quibusdam. Commodi tempore iste qui corporis doloremque nesciunt quos nulla libero tenetur officia consequuntur vel provident, fugit voluptatem velit hic exercitationem rerum sapiente quia quae illo nisi quisquam, dolor debitis, perspiciatis. Sint ut velit nemo quaerat temporibus consequatur itaque distinctio reiciendis explicabo consequuntur dignissimos, et fugiat ad saepe aliquam magnam eum quibusdam obcaecati deleniti quod, illum, necessitatibus quis aspernatur. Iusto earum ullam tempore adipisci. Inventore, cum earum ut eveniet.</h4>
				</div>
			</div>
		</div>
	</div>
</section>

{{-- <section class="section services">
	<div class="container">
		<div class="row">

				<div class="services__section clearfix">
					<div class="col-md-6 services__content services__content_left">
						<h3 class="services__title services__title_l">Special events</h3>
						<div class="services__text">We encourage you to become acquainted including models and photo models also end to-end </div>
						<a href="#" class="more animation">Learn More</a>
					</div>
					<div class="col-md-6 services__photo"><img src="{{ asset('web/img/services__photo.jpg') }}" alt=""></div>
				</div>
				<div class="services__section clearfix">
					<div class="col-md-6 services__photo"><img src="{{ asset('web/img/services__photo2.jpg') }}" alt=""></div>
					<div class="col-md-6 services__content services__content_right">
						<h3 class="services__title services__title_r">Brand ambassadors</h3>
						<div class="services__text">We have many different tried and tested methods along with free advice to make your journey into modeling a safe and exciting opportunity.</div>
						<a href="#" class="more animation">Learn More</a>
					</div>
				</div>
				<div class="services__section clearfix">
					<div class="col-md-6 services__content services__content_left">
						<h3 class="services__title services__title_l">Timely delivery</h3>
						<div class="services__text">Our Agency offers you the chance to discover your modeling potential and equip you with the tools that can help you get signed and promoted professional </div>
						<a href="#" class="more animation">Learn More</a>
					</div>
					<div class="col-md-6 services__photo"><img src="{{ asset('web/img/services__photo3.jpg') }}" alt=""></div>
				</div>

		</div>
	</div>
</section>

<section class="section why-us bg-grey">
	<div class="container">
		<div class="row">
			<div class="why-us__contant col-md-6 col-sm-12">
				<div class="title__grey">LET’S WORK TOGETHER</div>
				<h2 class="why-us__title section__title">Why choose us</h2>
				<div class="why-us__text">Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior. </div>
				<a href="#" class="more animation">Learn More</a>
			</div>
			<div class="why-us__numbers col-md-6 col-sm-12">
				<div class="why-us__numbers-wrapp why-us__numbers_left">
					<div class="numbers__content numbers__content_f">
						<div class="numbers__title left-line">202</div>
						<div class="numbers__text">Website launched</div>
					</div>
					<div class="numbers__content">
						<div class="numbers__title left-line">348</div>
						<div class="numbers__text">Concepts created</div>
					</div>
				</div>
				<div class="why-us__numbers-wrapp why-us__numbers_right">
					<div class="numbers__content numbers__content_f">
						<div class="numbers__title left-line">1,241</div>
						<div class="numbers__text">Satisfied clients</div>
					</div>
					<div class="numbers__content">
						<div class="numbers__title left-line">48</div>
						<div class="numbers__text">Working hours</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section testimonal">
	<div class="container">
		<div class="row">
			<h2 class="section__title centered"><span class="line"></span>Sucess Stories</h2>
			<ul class="testimonal__list clearfix">
				<li class="testimonal__list-item col-md-4">
					<div class="date testimonal__date">02 Jul 2016</div>
					<div class="text testimonal__text">“ We as a family, rejoice in victories and share the failures of our actors and models! We believe in everyone who is willing to change, grow! ”</div>
					<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo.png') }}" alt=""></div>
					<div class="testimonal__name">Carolyn Potter</div>
				</li>
				<li class="testimonal__list-item col-md-4">
					<div class="date testimonal__date">04 Jan 2016</div>
					<div class="text testimonal__text">“ Always strive for excellence, to grow to such a level that the Agency was as respectable as possible in the fashion and modeling industry. ”</div>
					<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo2.png') }}" alt=""></div>
					<div class="testimonal__name">Raymond Kelly</div>
				</li>
				<li class="testimonal__list-item col-md-4">
					<div class="date testimonal__date">14 Feb 2016</div>
					<div class="text testimonal__text">“ Training allows you to meet with famous top models and photographers who will share secrets of success and valuable lessons. ”</div>
					<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo3.png') }}" alt=""></div>
					<div class="testimonal__name">Elijah Maxwell</div>
				</li>
			</ul>
		</div>
	</div>
</section> --}}


<!-- Clients Section Start -->
{{-- <section class="section clients">
	<div class="container">
		<div class="row">
			<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="{{ asset('web/img/brand1.jpg') }}" alt=""></div>
			<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="{{ asset('web/img/brand2.jpg') }}" alt=""></div>
			<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="{{ asset('web/img/brand3.jpg') }}" alt=""></div>
			<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="{{ asset('web/img/brand4.jpg') }}" alt=""></div>
			<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="{{ asset('web/img/brand5.jpg') }}" alt=""></div>
			<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="{{ asset('web/img/brand6.jpg') }}" alt=""></div>
		</div>
	</div>
</section> --}}

@endsection