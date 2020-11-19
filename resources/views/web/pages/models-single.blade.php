@extends('web.layouts.app')

@section('styles')
<style>
	.refer_code_div{
		display: none;
	}
</style>
	
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{asset('web/img/page-img.jpg')}}">
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
		<section class="section s-model">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
				<div class="row">
						<div id="model-slider" class="s-model__photos col-md-6">
							<div class="sp-slides">
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single1.jpg')}}"
										 alt="single1"
										data-src="{{asset('web/img/single1.jpg')}}"
										data-small="{{asset('web/img/single1.jpg')}}"
										data-medium="{{asset('web/img/single1.jpg')}}"
										data-large="{{asset('web/img/single1.jpg')}}"
						        		data-retina="{{asset('web/img/single1.jpg')}}"/>
								</div>
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single2.jpg')}}"
										 alt="single2"
										data-src="{{asset('web/img/single2.jpg')}}"
										data-small="{{asset('web/img/single2.jpg')}}"
										data-medium="{{asset('web/img/single2.jpg')}}"
										data-large="{{asset('web/img/single2.jpg')}}"
						        		data-retina="{{asset('web/img/single2.jpg')}}"/>
								</div>
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single3.jpg')}}"
										 alt="single3"
										data-src="{{asset('web/img/single3.jpg')}}"
										data-small="{{asset('web/img/single3.jpg')}}"
										data-medium="{{asset('web/img/single3.jpg')}}"
										data-large="{{asset('web/img/single3.jpg')}}"
						        		data-retina="{{asset('web/img/single3.jpg')}}"/>
								</div>
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single4.jpg')}}"
										 alt="single4"
										data-src="{{asset('web/img/single4.jpg')}}"
										data-small="{{asset('web/img/single4.jpg')}}"
										data-medium="{{asset('web/img/single4.jpg')}}"
										data-large="{{asset('web/img/single4.jpg')}}"
						        		data-retina="{{asset('web/img/single4.jpg')}}"/>
								</div>
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single5.jpg')}}"
										 alt="single5"
										data-src="{{asset('web/img/single5.jpg')}}"
										data-small="{{asset('web/img/single5.jpg')}}"
										data-medium="{{asset('web/img/single5.jpg')}}"
										data-large="{{asset('web/img/single5.jpg')}}"
						        		data-retina="{{asset('web/img/single5.jpg')}}"/>
								</div>
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single6.jpg')}}"
										 alt="single6"
										data-src="{{asset('web/img/single6.jpg')}}"
										data-small="{{asset('web/img/single6.jpg')}}"
										data-medium="{{asset('web/img/single6.jpg')}}"
										data-large="{{asset('web/img/single6.jpg')}}"
						        		data-retina="{{asset('web/img/single6.jpg')}}"/>
								</div>
								<div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single7.jpg')}}"
										 alt="single7"
										data-src="{{asset('web/img/single7.jpg')}}"
										data-small="{{asset('web/img/single7.jpg')}}"
										data-medium="{{asset('web/img/single7.jpg')}}"
										data-large="{{asset('web/img/single7.jpg')}}"
						        		data-retina="{{asset('web/img/single7.jpg')}}"/>
								</div>
							</div>
							<div class="sp-thumbnails">
								<h2 class="s-model__name">
								<span class="line"></span>Model Photos
							</h2>
								<img class="sp-thumbnail"  alt="thumb1" src="{{asset('web/img/thumb1.jpg')}}"/>
								<img class="sp-thumbnail" alt="thumb2" src="{{asset('web/img/thumb2.jpg')}}"/>
	 							<img class="sp-thumbnail" alt="thumb3" src="{{asset('web/img/thumb3.jpg')}}"/>
								<img class="sp-thumbnail" alt="thumb4" src="{{asset('web/img/thumb4.jpg')}}"/>
								<img class="sp-thumbnail" alt="thumb5" src="{{asset('web/img/thumb5.jpg')}}"/>
								<img class="sp-thumbnail" alt="thumb6" src="{{asset('web/img/thumb6.jpg')}}"/>
								<img class="sp-thumbnail" alt="thumb7" src="{{asset('web/img/thumb7.jpg')}}"/>

							</div>

						</div>

						<div class="s-model__contant col-sm-5">
							<h2 class="s-model__name">
								<span class="line"></span>Eliza Guerrero
							</h2>
							<div class="s-model__info clearfix">
								<ul class="s-model__list s-model__list_l">
									<li class="s-model__list-item">Height <span></span></li>
									<li class="s-model__list-item">Bust</li>
									<li class="s-model__list-item">Waist</li>
									<li class="s-model__list-item">Hips</li>
									<li class="s-model__list-item">Dress</li>
									<li class="s-model__list-item">Shoe W</li>
									<li class="s-model__list-item">Hair colour</li>
									<li class="s-model__list-item">Eyes</li>
								</ul>
								<ul class="s-model__list s-model__list_r">
									<li class="s-model__list-item s-model__list-item_r">5'8/173</li>
									<li class="s-model__list-item s-model__list-item_r">32 / 81 B</li>
									<li class="s-model__list-item s-model__list-item_r">24 / 61</li>
									<li class="s-model__list-item s-model__list-item_r">34 / 86</li>
									<li class="s-model__list-item s-model__list-item_r">8 / 36</li>
									<li class="s-model__list-item s-model__list-item_r">39 / 6</li>
									<li class="s-model__list-item s-model__list-item_r">Blonde</li>
									<li class="s-model__list-item s-model__list-item_r">Green</li>
								</ul>
							</div>
							<a href="" class="btn btn__red animation">Book this model</a><br><br>

							<div class="row">
								<div class="col-md-12">
									<button class="btn btn__red animation" id="refer-btn">Refer a Friend</button>
								</div>
								
							</div><br>
							<div class="row refer_code_div">
								<div class="col-md-12">
									<input class="form-control" type="text" name="refer_link">
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<br>
{{-- Vedio Elements --}}
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
				<div class="row">

						<div id="model-slider" class="s-model__photos col-md-6">
							<h2 class="s-model__name">
								<span class="line"></span>Model Videos
							</h2>
							<div class="sp-thumbnails">
								<video width="320" height="240" controls>
								  <source src="movie.mp4" type="video/mp4">
								  <source src="movie.ogg" type="video/ogg">
								  Your browser does not support the video tag.
								</video>	

								<video width="320" height="240" controls>
								  <source src="movie.mp4" type="video/mp4">
								  <source src="movie.ogg" type="video/ogg">
								  Your browser does not support the video tag.
								</video>	

								<video width="320" height="240" controls>
								  <source src="movie.mp4" type="video/mp4">
								  <source src="movie.ogg" type="video/ogg">
								  Your browser does not support the video tag.
								</video>	

								<video width="320" height="240" controls>
								  <source src="movie.mp4" type="video/mp4">
								  <source src="movie.ogg" type="video/ogg">
								  Your browser does not support the video tag.
								</video>

							</div>

						</div>

						
					</div>
				</div>
			</div>
<br>
		 {{-- Voiceovers --}}
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
				<div class="row">

						<div id="model-slider" class="s-model__photos col-md-6">
							<h2 class="s-model__name">
								<span class="line"></span>Model Voice
							</h2>
							<div class="sp-thumbnails">
								
<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">

</audio>	

<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">

</audio>
<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">

</audio>

							</div>

						</div>

						
					</div>
				</div>
			</div>
		</div>

	</section><!-- Portfolio Section End -->

	<!-- Call To Action Section Start -->

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/js/jquery.sliderPro.js" integrity="sha512-hPizGLCamPr5++t42ujZBs6RwziPxMDb40fcuSG8b2lnJLRPdAvcPTMy563keCr/lxPNBXgAuPmDL1WQ5FNRKg==" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('web/libs/model-slider/model-slider.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('web/libs/model-slider/slider-pro.css') }}" type="text/css" />
  <!-- Materialdesignicons CSS (icon) -->
  <link rel="stylesheet" href="{{ asset('web/libs/icons/materialdesignicons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('web/libs/icons/flaticon.css') }}">

<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click','#refer-btn',function(e){
		
		@if(\Auth::guest())
			window.location.replace("{{route('login')}}");
		@else
			$.ajax({
				url: "{{ route('account.generate_referal') }}",
				
				type: 'get',
				success: function(res) {
					console.log(res);
					$('[name="refer_link"]').val(res);
					$('.refer_code_div').show();
					/* if (res.alert_type) {
						toastr.success(res.message);
					} else {
						toastr.error(res.message);
					} */
				},
				error: function(error) {
				}
			});
		@endif

		
	});
</script>
@endsection