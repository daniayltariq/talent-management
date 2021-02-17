@extends('web.layouts.app')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css" />

<style type="text/css">
    
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
        width: 85%;
        border-radius: 50%;
        padding: 5px;
        background: none;
    }

    .tal-profile{
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-top: 4px solid #df691a!important;
        background-color: #ececec;
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

    .profile-sec img {
        border-radius: 2%;
    }

    .middle-testimonial .border-1 {
        padding: 0;
    }

    .modal {
        text-align: left;
    }
    .modal-content {
        border: none;
        border-radius: 2px;
        box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);
        width: 100%;
    }
    .modal-header{
        border-bottom: 0;
        padding-top: 15px;
        padding-right: 26px;
        padding-left: 26px;
        padding-bottom: 0px;
    }
    .modal-title {
        font-size: 28px;
    }
    .modal-body{
        border-bottom: 0;
        padding-top: 5px;
        padding-right: 26px;
        padding-left: 26px;
        padding-bottom: 10px;
        font-size: 15px;
    }
    .modal-footer {
        border-top:0;
        padding-top: 0px;
        padding-right:26px;
        padding-bottom:26px;
        padding-left:26px;
    }

    .btn-default,.btn-primary {
        border: none;
        border-radius: 2px;
        display: inline-block;
        color: #424242;
        background-color: #FFF;
        text-align: center;
        height: 36px;
        line-height: 36px;
        outline: 0;
        padding: 0 2rem; 
        vertical-align: middle;
        -webkit-tap-highlight-color: transparent;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
        letter-spacing: .5px;
        transition: .2s ease-out;
    }
    .btn-default:hover{
    background-color: #FFF;
    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15);
    }
    .btn-primary {
    color: #FFF;
    background-color: #2980B9;
    }
    .btn-primary:hover{
    background-color: #2980B9;
    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15);
    }
    footer {
    text-align: center;
    margin: 15px;
    }
    footer h4{
    font-size: 2.92rem;
    font-weight:100;
        margin: 1.46rem 0 1.168rem; 
    }

    .picklist-btn{
        position: relative;
        z-index: 999999;
    }

    .new-picklist{
        display: none;
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
                <h1 class="page__title">Featured Talent</h1>
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
                                            {{-- <p>{{$talent->profile->address_1 ??$talent->profile->address_2 ?? ''}}</p> --}}
                                            <p><b>Age: </b> {{$talent->getAgeAttribute() ?? ''}}</p>
                                            <p><b>Height: </b>{{$talent->profile->feet ? \Str::finish($talent->profile->feet, "'") : ''}} {{$talent->profile->height ? \Str::finish($talent->profile->height,"''") : ''}}</p>
                                            <p>
                                                <a href="{{-- {{route('model.single',$talent->id)}} --}}{{route('model',$talent->profile->custom_link ?? $talent->profile->id)}}" class="profile-btn">Profile</a>
                                                <a href="#picklist-modal" class="profile-btn picklist-btn" data-memberid="{{$talent->id}}" role="button" data-toggle="modal"><i class="grid-item__contant-arrow mdi mdi-account-plus mdi-24px" ></i></a>
                                            </p>
                                        </div>
                                        {{-- <div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div> --}}
                                    </div>
                                </div>
                            </li>
                        @endif
                        
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.testimonial-slider').slick({
        	infinite: true,
            fade:true,
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

	/* $('.testimonial-slider').on('beforeChange', function (event, slick, direction){
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
		
		
	}); */

	

	

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

<script>
    $(document).ready(function() {
        @if($errors->has('member_id') || $errors->has('title') || $errors->has('description') )
            $('#picklist-modal').modal('toggle');
        @endif
    });
</script>

@endsection