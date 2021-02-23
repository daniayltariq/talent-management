@extends('web.layouts.app')
@section('title', 'Testimonials')
@section('styles')
<style type="text/css">
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

	.profile-sec img {
		border-radius: 2%;
	}

	.tal-profile{
		height: 100%;
		width: 100%;
		object-fit: cover;
		border-top: 4px solid #df691a!important;
		background-color: #ececec;
	}

	.testscroll{
		max-height: 148px !important;
		overflow-y: /* auto */ hidden;
		display: inline-block;
	}

	.text__fullHeight{
		max-height: 100%;
	}

	.testscroll::-webkit-scrollbar
	{
		width: 4px;
		background-color: #F5F5F5;
	}

	.testscroll::-webkit-scrollbar-thumb
	{
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 6px #e6e6e6  ;
		background-color: #e6e6e6;
	}

	/* .slick-list {
		overflow: unset !important;
	} */

	.testimonal__text {
		margin: 20px 0 0px !important;
		text-align: center;
		font-style: italic;
		position: relative;
	}

	.testimonal__name:before {
		content: '“';
		display: flex;
    	color: #df691a;
		font-weight: 600;
    	font-size: 30px;
		margin-left: 2%;
	}

	.testimonal__text:after {
		content: '”';
		position: absolute;
    	right: 5px;
    	bottom: -12px;
		float: right;
    	color: #df691a;
		font-weight: 600;
    	font-size: 30px;
	}

	.tstm_readmore_btn{
		cursor: pointer;
	}

	body{
		background-color: #f6f6f6;
	}

	.m-7r{
		margin-bottom: 7rem !important;	
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
                <h1 class="page__title">Testimonials</h1>
            </div>
        </div>
    </div>
</section>



<section class="section testimonal bg-grey m-7r">
	<div class="container">
		<div class="row">
			<h2 class="section__title"><span class="line"></span>Our Clients Say</h2>
			{{-- <p class="text-center">Simplify and streamline your casting process to find the perfect performers for your project.</p> --}}
			<ul class="testimonal__list clearfix testimonial-slider">
				@foreach ($test as $testi)
					<li class="testimonal__list-item col-md-4">
						<div class="single-testimonial">
							<div class="border-1">
								<div class="testimonal__photo profile-sec"><img class="tal-profile" src="{{ asset(isset($testi) && $testi->image ? $testi->image : 'backend-assets/images/rec2.jpg') }}" alt=""></div>
								<div class="testimonal__name mb-2"> {!! $testi->name ?? '' !!}</div>
								{{-- <div class="date testimonal__date">{{$testi->created_at->diffForHumans()}}</div> --}}
								<div class="text testimonal__text testscroll read_more text__fullHeight" style="padding: 7%;"> {!! $testi->content ?? '' !!}</div>
								<div class="mb-4 mt-3" name="tstm_readmore_btn">Read more »</div>
								{{-- <div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div> --}}
								{{-- <div class="testimonal__name mb-2 mt-5"> {!! $testi->name ?? '' !!}</div> --}}
							</div>
						</div>
					</li>
					
				@endforeach
				
			</ul>
		</div>
	</div>
</section>

@endsection


@section('scripts')

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
		// console.log(event, slick, direction);
		// $('.testimonal__list-item').removeClass('middle-testimonial');
		// $('.slick-current').next().next().css('opacity', 0);
	});

	$('.testimonial-slider').on('afterChange', function (){
		
		// $('.testimonal__list-item').removeClass('middle-testimonial');
		// $('.slick-current').next().addClass('middle-testimonial');
		// setTimeout(function(){ 
		// 	$('.slick-current').next().animate({'opacity': 1}, 'slow');
		// }, 400);

		// $('.slick-active:not(.middle-testimonial)').css('opacity', 1);
		
		
	});

	$('[name="tstm_readmore_btn"]').on('click',function(){
		/* console.log($(this).siblings( ".testimonal__text" )); */
		$(this).siblings( ".testimonal__text" ).toggleClass('testscroll');
	})

	

</script>
@endsection