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

    
/* Slider css */

    /* .slider-custom-container {
        overflow: hidden !important;
        position: relative !important;
        width: 100% !important;
    }

    .dark-blocks {
        height: 100% !important;
        position: absolute !important;
        right: 0 !important;
        top: 0 !important;
    }

    .image-slider {
      z-index: 0;
      margin: 0 auto;
      padding: 0;
      width: 100%;
      height: 100vh;
    }

    .image-slide {
        height: 100vh;
        margin: 0 auto;
    }

    .slick-slide.slick-center {
        transform: scale(1.2);
        transition: transform .8s 1.4s cubic-bezier(.84, 0, .08, .99);
    }

    .slick-slide {
        transition: transform .7s cubic-bezier(.84, 0, .08, .99);
    }

    .slider-control {
        margin: 0%;
        position: absolute;
        z-index: 2;
        bottom: 0%;
        left: 15%;
        transform: translate(-50%, -50%);
        display: flex;
    }

    button.slider-btns {
        color: #fff;
        background: none;
        padding: 12px 19px;
        border: none;
        font-size: 16px;
        border-radius: 50%;
        margin: .4em;
        display: inline-block;
    }

    button.slider-btns:hover {
        background-color: #f2832c !important;
        color: #fff !important;
    }

    button.slider-btns:focus {
        outline: none;
    }

    .block-1 {
        z-index: 1;
        position: fixed;
        height: 100vh;
        width: 5%;
        left: 0%;
        background: #0f0f0f;
    }

    .block-2 {
        z-index: 1;
        position: fixed;
        height: 100vh;
        width: 25%;
        left: 25%;
        background: #0f0f0f;
    }

    .block-3 {
        z-index: 1;
        position: fixed;
        height: 100vh;
        width: 5%;
        right: 0%;
        background: #0f0f0f;
    }

    .overlay {
        z-index: 1;
        position: fixed;
        height: 100vh;
        width: 20%;
        left: 5%;
        background: rgba(0, 0, 0, .65);
    }

    .text-slider-wrapper {
        z-index: 2;
        position: absolute;
        width: 100%;
        top: 30%;
    }

    .text-slider {
        margin: 0%;
        padding: 0%;
        height: 100vh;
    }

    .text-slide h1 {
        color: #fff;
        font-size: 36px;
        font-family: "Cinzel";
        font-weight: lighter;
        text-transform: uppercase;
        padding-left: 10%;
    }

    @media(max-width: 990px) {
        .block-2, .overlay {
                display: none;
        }

        .block-1 {
                width: 50%;
        }

        .block-3 {
                width: 12%;
        }

        .slide-slick {
                display: none !important;
        }

        .text-slide h1 {
                font-size: 30px !important;
        }

        .text-slider-wrapper {
                position: absolute;
                top: 50% !important;
        }

        .slider-control {
                left: 22.5%;
        }
    }

    .slider-search-btn{
        bottom: 16%;
        left: 15%;
    }

    .btn-td{
        padding: 17px 17px;
        color: #fff;
        background-color: #ee7322;
        transition: all .2s ease;
        border-radius: 6px;
        border-bottom-width: 2px;
        border: none;
        border-bottom: solid;
        border-color: #ec650c;
    }

    .btn-td:hover {
        background-color: #f18222 !important;
    } */
/* End Slider css */
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
</style>
@endsection

@section('content')
    {{-- <div class="slider-custom-container">
        <div class="text-slider-wrapper">
            <div class="text-slider">
                @foreach ($featured as $talent)
                <div class="text-slide"><h1>A blessing for <br> every skin.</h1></div>
                @endforeach
            </div>
        </div>

        <div class="slider-control slider-search-btn">
            <a href="{{route('findtalent')}}" class="btn btn-td"> Search Talent</a>
        </div>
        <div class="slider-control">
            <div class="prev"><button class="slider-btns" type="button"><i class="fas fa-arrow-left"></i></button></div>
            <div class="next"><button class="slider-btns" type="button"><i class="fas fa-arrow-right"></i></button></div>
        </div>

        <div class="blocks">
            <div class="block-1 dark-blocks"></div>
            <div class="block-2 dark-blocks"></div>
            <div class="block-3 dark-blocks"></div>
        </div>

        <div class="overlay dark-blocks"></div>

        <div class="image-slider">
            @foreach ($featured as $talent)
                @php
                    $img=!is_null($talent->profile) ? (!is_null($talent->profile->profile_img) && \Storage::exists('public/uploads/profile/'.$talent->profile->profile_img)? 'storage/uploads/profile/'.$talent->profile->profile_img: 'web/img/default.jpg') : 'web/img/default.jpg';
                @endphp
                <div class="image-slide" id="one" style="background: url({{asset($img)}}) no-repeat 50% 50%; background-size: cover;"></div>
            @endforeach
        </div>
    </div> --}}
    <!-- TESTIMONIALS -->
<section class="testimonials" style="height: 100vh">
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
</section>
    <!-- END OF TESTIMONIALS -->

@endsection
@section('scripts')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        "use strict";
        //  TESTIMONIALS CAROUSEL HOOK
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