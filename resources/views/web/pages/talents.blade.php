@extends('web.layouts.app')

@section('styles')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
<style type="text/css">
    button.btn.btn__red.animation.btn-half.pull-right {
        margin-bottom: 20px;
    }
    .btn-half {
        width: 30%;
    }

    .btn {
        text-transform: capitalize;
        font-size: 14px;
    }

    span.multiselect-selected-text {
        font-size: 14px;
        font-weight: 500;
        color: #616161;
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

    .new-search-save{
        display: none;
    }

    .bootstrap-tagsinput .badge{
		margin: 2px 2px;
		background-color: #f2832c;
		border-radius: 4px;
	}

    .bootstrap-tagsinput {
        line-height: 28px;
    }

    .bootstrap-tagsinput .badge [data-role="remove"]:after {
        padding: 0px 5px 1px 5px;
    }

    .btn-talent{
        color:#e9862e !important;
    }

    .pt-0{
        padding-top: 2% !important;
    }

    .pb-0{
        padding-bottom: 0 !important;
    }

    .mb-0{
        margin-bottom: 0 !important;
    }
    
    .f-r{
        float: right;
    }

    .btn-dd{
        border-radius: 31px;
        height: 45px;
    }

    .btn-dd:hover{
        background-color: #f1a466;
        color: white;
    }

    .irs--round .irs-from, .irs--round .irs-to, .irs--round .irs-single {
        background-color: #ee7322;
    }

    .irs--round .irs-handle {
        border: 4px solid #ee7322;
    }

    .irs--round .irs-from:before, .irs--round .irs-to:before,.irs--round .irs-single:before {
        border-top-color: #ee7322;
    }

    .irs--round .irs-bar {
        background-color: #ee7322;
    }

    .select2-container{
        width: 100% !important;
    }

    .p-5-0{
        padding: 5px 0px;
    }

    .dropdown-menu>li>a:hover {
        border-left: 3px solid #f2832c;
    }

    .lh-23{
        line-height: 23px !important;
    }
    
    /* Slider css */

    .slider-custom-container {
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
        /* border: 1px solid rgba(255, 255, 255, .3); */
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
    }
    /* End Slider css */

</style>
@endsection

@section('content')
<div class="slider-custom-container">
<div class="text-slider-wrapper">
    <div class="text-slider">
        @foreach ($featured as $talent)
          <div class="text-slide"><h1>A blessing for <br> every skin.</h1></div>
        @endforeach
          {{-- <div class="text-slide"><h1>The perfect mix of <br> old & new.</h1></div>
          <div class="text-slide"><h1>A journey over borders <br> & generations.</h1></div>
          <div class="text-slide"><h1>Your are the <br> stylist.</h1></div>
          <div class="text-slide"><h1>To be on the <br> forerfront.</h1></div> --}}
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
    
    {{-- <div class="image-slide" id="two" style="background: url(https://images.unsplash.com/photo-1509679708047-e0e562d21e44?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="three" style="background: url(https://images.unsplash.com/photo-1508215302842-8a015a452a20?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="four" style="background: url(https://images.unsplash.com/photo-1537510929030-2ffb7888f379?ixlib=rb-1.2.1&auto=format&fit=crop&w=2378&q=80) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="five" style="background: url(https://images.unsplash.com/photo-1552793084-49132af00ff1?ixlib=rb-1.2.1&auto=format&fit=crop&w=2953&q=80) no-repeat 50% 50%; background-size: cover;"></div> --}}
</div>
</div>
    {{-- <section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="page__subtitle title__grey">Looking for talent ?</div>
                    <h1 class="page__title">Featured Talent</h1>
                    
                </div>
            </div>
        </div>
    </section> --}}<!-- Slider Section End -->

@endsection
@section('scripts')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

<script type="text/javascript">
    
</script>

<script>
    
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

</script>

@endsection