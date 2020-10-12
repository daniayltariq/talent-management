@extends('web.layouts.app')

@section('styles')
<style type="text/css">
.slick-slide img {
    margin: auto;
    margin-top: -40px;
}

ul.testimonal__list.clearfix.testimonial-slider.slick-initialized.slick-slider {
    height: 600px;
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
                <h1 class="page__title">TESTIMONIALS</h1>
            </div>
        </div>
    </div>
</section>



<section class="section testimonal bg-grey ">
		<div class="container">
			<div class="row">
				<h2 class="section__title"><span class="line"></span>Our Client Says</h2>
				<p>Simplify and streamline your casting process to find the perfect performers for your project.</p>
				<ul class="testimonal__list clearfix testimonial-slider">
					<li class="testimonal__list-item col-md-4">
						<div class="single-testimonial">
							<div class="border-1">
								<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo.png') }}" alt=""></div>
								<div class="date testimonal__date">02 Jul 2016</div>
								<div class="text testimonal__text">“ We as a family, rejoice in victories and share the failures of our actors and models! We believe in everyone who is willing to change, grow! ”</div>
								<div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div>
								<div class="testimonal__name">Carolyn Potter</div>
							</div>
						</div>
					</li>
					<li class="testimonal__list-item col-md-4">
						<div class="single-testimonial">
							<div class="border-1">
								<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo.png') }}" alt=""></div>
								<div class="date testimonal__date">02 Jul 2016</div>
								<div class="text testimonal__text">“ We as a family, rejoice in victories and share the failures of our actors and models! We believe in everyone who is willing to change, grow! ”</div>
								<div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div>
								<div class="testimonal__name">Carolyn Potter</div>
							</div>
						</div>
					</li>
					<li class="testimonal__list-item col-md-4">
						<div class="single-testimonial">
							<div class="border-1">
								<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo.png') }}" alt=""></div>
								<div class="date testimonal__date">02 Jul 2016</div>
								<div class="text testimonal__text">“ We as a family, rejoice in victories and share the failures of our actors and models! We believe in everyone who is willing to change, grow! ”</div>
								<div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div>
								<div class="testimonal__name">Carolyn Potter</div>
							</div>
						</div>
					</li>
					<li class="testimonal__list-item col-md-4">
						<div class="single-testimonial">
							<div class="border-1">
								<div class="testimonal__photo"><img src="{{ asset('web/img/testimonal-photo.png') }}" alt=""></div>
								<div class="date testimonal__date">02 Jul 2016</div>
								<div class="text testimonal__text">“ We as a family, rejoice in victories and share the failures of our actors and models! We believe in everyone who is willing to change, grow! ”</div>
								<div class="testimonal__photo"><img src="img/testimonal-photo.png" alt=""></div>
								<div class="testimonal__name">Carolyn Potter</div>
							</div>
						</div>
					</li>
					
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
@endsection