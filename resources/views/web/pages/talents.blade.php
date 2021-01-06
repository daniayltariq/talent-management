@extends('web.layouts.app')

@section('styles')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css" />

<style type="text/css">
    
    footer {
    text-align: center;
    margin: 15px;
    }
    footer h4{
    font-size: 2.92rem;
    font-weight:100;
        margin: 1.46rem 0 1.168rem; 
    }

    footer{
        margin: 30px 0px !important;
    }

    header.header{
        background: #000000cf !important;
    }

        .shadow-effect {
		    background: #fff;
		    padding: 20px;
		    border-radius: 4px;
		    text-align: center;
	        border:1px solid #ECECEC;
		    box-shadow: 0 19px 38px rgba(0,0,0,0.10), 0 15px 12px rgba(0,0,0,0.02);
		}
		#customers-testimonials .shadow-effect p {
		    font-family: inherit;
		    font-size: 17px;
		    line-height: 1.5;
		    margin: 0 0 17px 0;
		    font-weight: 300;
		}
		.testimonial-name {
		    margin: -17px auto 0;
		    display: table;
		    width: auto;
		    background: #3190E7;
		    padding: 9px 35px;
		    border-radius: 12px;
		    text-align: center;
		    color: #fff;
		    box-shadow: 0 9px 18px rgba(0,0,0,0.12), 0 5px 7px rgba(0,0,0,0.05);
		}
		#customers-testimonials .item {
		    text-align: center;
		    padding: 50px;
				margin-bottom:80px;
		    opacity: .2;
		    -webkit-transform: scale3d(0.8, 0.8, 1);
		    transform: scale3d(0.8, 0.8, 1);
		    -webkit-transition: all 0.3s ease-in-out;
		    -moz-transition: all 0.3s ease-in-out;
		    transition: all 0.3s ease-in-out;
		}
		#customers-testimonials .owl-item.active.center .item {
		    opacity: 1;
		    -webkit-transform: scale3d(1.0, 1.0, 1);
		    transform: scale3d(1.0, 1.0, 1);
		}
		.owl-carousel .owl-item img {
		    transform-style: preserve-3d;
		    max-width: 90px;
    		margin: 0 auto 17px;
		}
		#customers-testimonials.owl-carousel .owl-dots .owl-dot.active span,
        #customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {
                    background: #3190E7;
                    transform: translate3d(0px, -50%, 0px) scale(0.7);
                }
        #customers-testimonials.owl-carousel .owl-dots{
            display: inline-block;
            width: 100%;
            text-align: center;
        }
        #customers-testimonials.owl-carousel .owl-dots .owl-dot{
            display: inline-block;
        }
		#customers-testimonials.owl-carousel .owl-dots .owl-dot span {
		    background: #3190E7;
		    display: inline-block;
		    height: 20px;
		    margin: 0 2px 5px;
		    transform: translate3d(0px, -50%, 0px) scale(0.3);
		    transform-origin: 50% 50% 0;
		    transition: all 250ms ease-out 0s;
		    width: 20px;
		}
        .slick-slide img {
            margin: auto;
            margin-top: -40px;
        }

        ul.testimonal__list.clearfix.testimonial-slider.slick-initialized.slick-slider {
            height: 600px;
        }

        .profile-sec {
            display: inline-block;
            height: 180px;
            width: 180px;
            border-radius: 50%;
            padding: 5px;
            background: none;
        }

        .tal-profile{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .btn-td{
            padding: 13px 15px;
            color: #fff;
            background-color: #ee7322;
            transition: all .2s ease;
            border-radius: 6px;
            border-bottom-width: 2px;
            border: none;
            border-bottom: solid;
            border-color: #ec650c;
            font-size: 13px;
        }
        .btn-td:hover {
            background-color: #f18222 !important;
        }

        .profile-btn{
            font-size: 17px;
            line-height: 22px;
            border-radius: 6px;
            padding: 6px 14px 7px;
            color: #000;
            background-color: #fff;
            border: 1px solid #000;
            border-bottom-width: 3px;
        }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Looking for talent ?</div> --}}
                <h1 class="page__title">Featured Talents</h1>
                {{-- <a href="{{route('findtalent')}}" class="btn btn-td"> Search Talent</a> --}}
            </div>
        </div>
    </div>
</section>
    <!-- TESTIMONIALS -->
    <section class="section testimonal bg-grey ">
        <div class="container">
            <div class="row">
                <ul class="testimonal__list clearfix testimonial-slider">
                    @foreach ($featured as $talent)
                        @if ($talent->profile()->exists())
                            <li class="testimonal__list-item col-md-4">
                                <div class="single-testimonial">
                                    <div class="border-1" style="min-height: 434px">
                                        <div class="testimonal__photo profile-sec"><img class="tal-profile" src="{{ !is_null($talent->profile->profile_img) && file_exists(public_path().'/storage/uploads/profile/'.$talent->profile->profile_img) ? ('storage/uploads/profile/'.$talent->profile->profile_img) :'web/img/user.png' }}" alt=""></div>
                                        <div class="date testimonal__date" style="font-size: 15px;background-color: #f6f6f6;">{{$talent->f_name ?? ''}} {{$talent->l_name ?? ''}}</div>
                                        <div class="text testimonal__text" style="text-align: justify;margin-left: 31%;">
                                            <p>{{$talent->profile->address_1 ??$talent->profile->address_2 ?? ''}}</p>
                                            <p><b>Age: </b> {{$talent->getAgeAttribute() ?? ''}}</p>
                                            <p><b>Height: </b> {{$talent->profile->height ? \Str::finish($talent->profile->height, "'") : ''}} {{$talent->profile->feet ? \Str::finish($talent->profile->feet, "''") : ''}}</p>
                                            <p><a href="" class="profile-btn">Profile</a></p>
                                        </div>
                                        <div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </section>
{{-- <section class="testimonials" style="height: 100vh">
	<div class="container">

      <div class="row">
        <div class="col-sm-12" style="margin-top: 10rem;">
          <div id="customers-testimonials" class="owl-carousel">

            <!--TESTIMONIAL 1 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">EMILIANO AQUILANI</div>
            </div>
            <!--END OF TESTIMONIAL 1 -->
            <!--TESTIMONIAL 2 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">ANNA ITURBE</div>
            </div>
            <!--END OF TESTIMONIAL 2 -->
            <!--TESTIMONIAL 3 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">LARA ATKINSON</div>
            </div>
            <!--END OF TESTIMONIAL 3 -->
            <!--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">IAN OWEN</div>
            </div>
            <!--END OF TESTIMONIAL 4 -->
            <!--TESTIMONIAL 5 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">MICHAEL TEDDY</div>
            </div>
            <!--END OF TESTIMONIAL 5 -->
          </div>
        </div>
      </div>
      </div>
</section> --}}
    <!-- END OF TESTIMONIALS -->

@endsection
@section('scripts')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.testimonial-slider').slick({
        	infinite: true,
			slidesToShow: 3,
			// autoplay: true,
			// autoplaySpeed: 2000,
			slidesToScroll: 1,
			speed: 300,
			arrows: true,
            responsive: [{
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
	           breakpoint: 400,
	           settings: {
	              arrows: true,
	              slidesToShow: 1,
	              slidesToScroll: 1
	           }
	        },
	        {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }]
		});
    });


	$(document).ready(function(){
		$('.slick-current').next().addClass('middle-testimonial');
	});

	$('.testimonial-slider').on('beforeChange', function (event, slick, direction){
		console.log(event, slick, direction);
		$('.testimonal__list-item').removeClass('middle-testimonial');
		$('.slick-current').next().next().css('opacity', 0);
	});

	$('.testimonial-slider').on('afterChange', function (){
		
		$('.testimonal__list-item').removeClass('middle-testimonial');
		$('.slick-current').next().addClass('middle-testimonial');
		setTimeout(function(){ 
			$('.slick-current').next().animate({'opacity': 1}, 'slow');
		}, 400);

		$('.slick-active:not(.middle-testimonial)').css('opacity', 1);
		
		
	});

	

	

</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        "use strict";
        
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 0,
            autoplay: true,
            dots:true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                items: 1
                },
                768: {
                items: 2
                },
                1170: {
                items: 3
                }
            }
        });
    });
</script>

{{-- <script>
    
    var sickPrimary = {
        autoplay: true,
        autoplaySpeed: 2400,
        slidesToShow: 2,
        slidesToScroll: 1,
        speed: 1800,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        asNavFor: '.text-slider',
        centerMode: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next')
    }

    var sickSecondary = {
        autoplay: true,
        autoplaySpeed: 2400,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1800,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        asNavFor: '.image-slider',
        prevArrow: $('.prev'),
        nextArrow: $('.next')
    }

    $('.image-slider').slick(sickPrimary);
    $('.text-slider').slick(sickSecondary);

</script> --}}

@endsection