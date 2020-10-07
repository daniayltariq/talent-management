@extends('web.layouts.app')

@section('styles')

 
<style type="text/css">
button.btn.btn__red.animation.btn-half.pull-right {
    margin-bottom: 20px;
}
.btn-half {
    width: 30%;
}

</style>
 
@endsection

@section('content')

<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="page__subtitle title__grey">Profile</div>
                    <h1 class="page__title">John carry</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                 
                <div class="col-sm-10 col-centered">
                    
                </div>

            </div>

        </div>
    </section><!-- Services Section End -->
    
@endsection
@section('scripts')
 

@endsection