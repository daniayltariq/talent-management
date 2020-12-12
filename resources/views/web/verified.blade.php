
@extends('web.layouts.app')

@section('content')




<section class="page__img" style="background-image: url({{asset('web/img/apply_bg.jpg')}})">
   
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <h1 class="page__title">Email Verified</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->
    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered" style="font-family: 'Playfair Display', serif;">Welcome {{auth()->user()->f_name}}, your email is verified.<br> Thankyou for becoming a part of Talent Depot!</h3>
                
                </div>

            </div>
        </div>
    </section><!-- Services Section End -->
@endsection

