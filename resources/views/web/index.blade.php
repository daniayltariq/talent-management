@extends('web.layouts.app')

@section('styles')
	<style>
		.view__all {
			text-align: center;
			padding: 105px 0;
			/* background-color: #f6f6f6; */
		}

		.d-flex{
			display: flex;
		}

		.overflow__wrap_aw{
			overflow-wrap:anywhere;
		}
	</style>
	@if (\Auth::check() && auth()->user()->hasRole('candidate'))
		<script type="text/javascript">
			var email = "{{auth()->user()->email}}";
			var uid = {{auth()->user()->stripe_id}};
			if (window.$FPROM){
			$FPROM.trackSignup({email: email,uid: uid});
			} else {
			_fprom=window._fprom||[];window._fprom=_fprom;
			_fprom.push(["event","signup"]);
			_fprom.push(["email",email]);
			_fprom.push(["uid",uid]);
			}
		</script>
	@endif
	
@endsection

@section('content')
	
	<!-- Header Section Start -->
	
	<!-- Header Section End -->

	<!-- Slider Section Start -->
	<section class="cd-hero">
		<ul class="cd-hero-slider">
			<li class="selected"  style="background-image: url('{{ asset('web/img/banner/banner-3.jpg') }}')">
				<div class="cd-full-width">
					<div class="cd-full__contant">
						<p class="m-img__subtitle title__grey">we are Fashion Management agency</p>
						<h1 class="m-img__title">Model Managment<br>& Talent Agency</h1>
						<a href="{{route('register')}}" class="cd-btn btn btn__red secondary">Join Now</a>
					</div>
				</div> <!-- .cd-full-width -->
			</li>
			<li style="background-image: url('{{ asset('web/img/banner/banner-1.jpg') }}')">
				<div class="cd-full-width">
					<div class="cd-full__contant">
						<p class="m-img__subtitle title__grey">we are Fashion Management agency</p>
						<h1 class="m-img__title">Model Managment<br>& Talent Agency</h1>
						<a href="{{route('register')}}" class="cd-btn btn btn__red secondary">Join Now</a>
					</div>
				</div> <!-- .cd-full-width -->
			</li>
			<li style="background-image: url('{{ asset('web/img/banner/banner-2.jpg') }}')">
				<div class="cd-full-width">
					<div class="cd-full__contant">
						<p class="m-img__subtitle title__grey">we are Fashion Management agency</p>
						<h1 class="m-img__title">Model Managment<br>& Talent Agency</h1>
						<a href="{{route('register')}}" class="cd-btn btn btn__red secondary">Join Now</a>
					</div>
				</div> <!-- .cd-full-width -->
			</li>
			

		</ul> <!-- .cd-hero-slider -->

		<div class="cd-slider-nav">
			<nav>
				<ul>
					<li class="selected"><a href="#0"></a></li>
					<li><a href="#0"></a></li>
					<li><a href="#0"></a></li>
				</ul>
			</nav>
		</div> <!-- .cd-slider-nav -->
	</section> <!-- .cd-hero -->
	<!-- Slider Section End -->


	<!-- About Section Start -->
	<div class="section about">
		<div class="container">
			<div class="row">
				<div class="col-md-6 about__text-wrapp">
					<div class="about__title title__grey">Our Agency</div>
					<div class="about__big-tex text__quote"><span class="line__text"></span>Models from our agency are involved in the New York, Paris and Milan fashion weeks, working with the world's leading photographers</div>
				</div>
				<div class="col-md-6 about__text-wrapp">
					<div class="main__text main__text_about">We appear on the covers of sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae tae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </div>
					<a href="{{route('about-us')}}" class="more animation">Read more</a>
				</div>
			</div>
		</div>
	</div>
	<!-- About Section End -->

	<!-- Portfolio Section Start -->
@include('web.partials.models',['models'=>$models])
	<!-- Portfolio Section End -->

	<!-- Testimonal Section Start -->
	<section class="section testimonal bg-grey ">
		<div class="container">
			<div class="row">
				<h2 class="section__title"><span class="line"></span>Sucess Stories</h2>
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
	</section><!-- Testimonal Section End -->

	<!-- Services Section Start -->
	@include('web.partials.services')
<!-- Services Section End -->

	<!-- Call To Action Section Start -->
	<div class="section action">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text__quote action__text">We have best of photographers from the fashion industry, who understands the current trend, style and format as required by clients </div>
				<a href="{{ route('register') }}" class="btn btn__red animation">Join now</a>
			</div>
		</div>
	</div><!-- Call To Action Section End -->

	<!-- Last Post Section Start -->
	<section class="section last-posts">
		<div class="container">
			<div class="row">
				<h2 class="section__title"><span class="line line__right"></span>Latest Topics</h2>
				<div class="lp__wrapp clearfix">
					@foreach ($topics as $topic)
						<div class="col-md-4 col-sm-12 lp__content">
							<div class="lp__content-wrapp">
								<div class="date">{{$topic->created_at->diffForHumans()}}</div>
								<h4 class="lp__title"><a href="#0" class="animation">{{$topic->title}}</a></h4>
								<div class="text lp__text d-flex overflow__wrap_aw">{!!\Str::words(strip_tags($topic->content,60)) !!}</div>
								<a href="{{ route('single-post',['slug' => $topic->slug]) }}" class="more animation">read more</a>
							</div>
						</div>
					@endforeach
				</div>
				{{-- <a href="blog.html" class="btn btn__grey btn__grey_lg animation">Show all topics</a> --}}
			</div>
		</div>
	</section><!-- Last Post Section End -->

	<!-- Clients Section Start -->
	{{-- <div class="section clients">
		<div class="container">
			<div class="row">
				<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="img/brand1.jpg" alt=""></div>
				<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="img/brand2.jpg" alt=""></div>
				<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="img/brand3.jpg" alt=""></div>
				<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="img/brand4.jpg" alt=""></div>
				<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="img/brand5.jpg" alt=""></div>
				<div class="clients__img col-lg-2 col-md-4 col-sm-6 col-xs-12"><img src="img/brand6.jpg" alt=""></div>
			</div>
		</div>
	</div> --}}<!-- Clients Section End -->

	<!-- Footer Start -->
	
@endsection


	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->

	



