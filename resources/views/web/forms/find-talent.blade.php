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
        bottom: 4%;
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


    /* End Slider css */

</style>
@endsection

@section('content')
<div class="slider-custom-container">
<div class="text-slider-wrapper">
    <div class="text-slider">
          <div class="text-slide"><h1>A blessing for <br> every skin.</h1></div>
          <div class="text-slide"><h1>The perfect mix of <br> old & new.</h1></div>
          <div class="text-slide"><h1>A journey over borders <br> & generations.</h1></div>
          <div class="text-slide"><h1>Your are the <br> stylist.</h1></div>
          <div class="text-slide"><h1>To be on the <br> forerfront.</h1></div>
    </div>
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
    <div class="image-slide" id="one" style="background: url(https://images.unsplash.com/photo-1519011985187-444d62641929?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2452&q=80) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="two" style="background: url(https://images.unsplash.com/photo-1509679708047-e0e562d21e44?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="three" style="background: url(https://images.unsplash.com/photo-1508215302842-8a015a452a20?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="four" style="background: url(https://images.unsplash.com/photo-1537510929030-2ffb7888f379?ixlib=rb-1.2.1&auto=format&fit=crop&w=2378&q=80) no-repeat 50% 50%; background-size: cover;"></div>
    <div class="image-slide" id="five" style="background: url(https://images.unsplash.com/photo-1552793084-49132af00ff1?ixlib=rb-1.2.1&auto=format&fit=crop&w=2953&q=80) no-repeat 50% 50%; background-size: cover;"></div>
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

    @if (\Auth::check() && auth()->user()->hasRole('superadmin'))
        <div class="container mt-3">
            {{-- <div class="row">
                <a href="#save-search-modal" role="button" data-toggle="modal" class="btn-ss" >
                    <span>Save search</span>
                    <i class="fa fa-plus"></i>
                </a>
            </div> --}}
            <div class="dropdown f-r">
                <button class="btn btn-default dropdown-toggle btn-dd" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-plus"></i>
                </button>
                <ul class="dropdown-menu mt-3" aria-labelledby="dropdownMenu1">
                    @if (session('old_query'))
                        <li class="p-5-0">
                            <a href="#save-search-modal" role="button" data-toggle="modal" class="btn-talent" >
                                Save search
                            </a>
                        </li>
                    @endif
                    @if (count(auth()->user()->saved_search)>0)
                        <li><a class="btn-talent" href="{{route('backend.view_save_search')}}">View Search</a></li>
                    @endif
                    
                    
                    <li class="p-5-0"><a class="btn-talent" href="{{route('backend.picklist.index')}}">View Picklist</a></li>
                    <li><a class="btn-talent" href="{{route('backend.dashboard')}}">Dashboard</a></li>
                </ul>
              </div>
        </div>
    @endif

    <!-- Example single danger button -->    

    <section class="section apply pt-0">
        <div class="container">
            <div class="row">
                <!-- <h3 class="text__quote centered">Find Actors and Talents for Hire</h3> -->
                <div class="col-lg-12 col-md-12 ">
                    <form class="apply-form form-horizontal" method="GET" action="{{route('search_talent')}}" id="talent-search-form">
                       @csrf
                        <div class="row form-block pb-0">
                            {{-- <div class="form-group col-sm-6 mb-0">
                                <label for="f_name" class="col-sm-4 control-label">Search by names</label>
                                 <div class="col-sm-8">
                                   <input class="form-control taginput" name="name" value="{{ (session('old_query')['name']) ?? ''}}" id="form-size" type="text" aria-label="Search">
                                </div> 
                            </div> --}}

                            <div class="form-group col-sm-4 mb-0">
                                <label for="f_name" class="col-sm-4 lh-23">Search by First Name {{-- <span class="req">*</span> --}}</label>
                                 <div class="col-sm-8">
                                   <input class="form-control" name="f_name" value="{{ (session('old_query')['f_name']) ?? ''}}" id="form-size" type="text" aria-label="Search">
                                </div> 
                            </div>

                            <div class="form-group col-sm-4 mb-0">
                                <label for="f_name" class="col-sm-4 lh-23">Search by Last Name {{-- <span class="req">*</span> --}}</label>
                                 <div class="col-sm-8">
                                   <input class="form-control" name="l_name" value="{{ (session('old_query')['l_name']) ?? ''}}" id="form-size" type="text" aria-label="Search">
                                </div> 
                            </div>

                            {{-- <div class="form-group col-sm-6 mb-0">
                                <label for="state" class="col-sm-4 control-label">Profile Type</label>
                                <div class="col-sm-8">
                                    @include('components.multiselect', ['options' => ['Regular','Voiceover'],'name'=>'profile_type'])
                                </div>
                            </div> --}}
                            <div class="form-group col-sm-4 mb-0">
                                <label for="gender" class="col-sm-4 lh-23">Gender </label>
                                <div class="col-sm-8">

                                    @include('components.multiselect', ['options' => ['Female','Male','Transgender'],'name'=>'gender'])
                                    
                                 </div>
                             </div>
                        </div>

                        <div class="row form-block pb-0">

                             <div class="form-group col-sm-6">
                                <label for="ethnicity" class="col-sm-4 control-label">Ethnicity</label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Asian','Black / African Descent','Ethnically Ambiguous / Multiracial','Indigenous Peoples','Latino / Hispanic','South Asian / Indian','Southeast Asian / Pacific Islander'],'name'=>'ethnicity'])
                                
                                </div>
                            </div> 

                            <div class="form-group col-sm-6 mb-0">
                                <label for="age" class="col-sm-4 control-label">Age </label>
                                <div class="col-sm-8">
                                    <div class="d-flex justify-content-center mb-4">
                                        <input type="text" id="age" name="age" value="{{ (session('old_query')['new_age']) ?? ''}}" class="form-control js-range-slider" data-type="double" data-min="0">
                                        <input type="hidden" name="new_age" value="{{ (session('old_query')['new_age']) ?? ''}}">
    							    </div>
                                </div>
                            </div>
                        </div>
                              
                        <div class="row form-block">
                            <div class="form-group col-sm-6">
                                <label for="location" class="col-sm-4 control-label">Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="location" id="location" value="{{ (session('old_query')['location']) ?? ''}}">
                                </div>
                            </div>

                           <div class="form-group col-sm-6">
                                <label for="skills" class="col-sm-4 control-label">Skills </label>
                                <div class="col-sm-8">
                                    @include('components.multiselect', ['options' => $skills,'option_value'=>'id','option_text'=>'title','name'=>'skills'])
                                    
                                 </div>
                             </div>

                            <div class="form-group col-sm-6">
                                <label for="unionstatus" class="col-sm-4 control-label">Union Status</label>
                                <div class="col-sm-8">
                                    @include('components.multiselect', ['options' => ['Yes','No'],'name'=>'union'])
    							
                                </div>
                            </div>  

                            {{-- <div class="form-group col-sm-6">
                                <label for="assets" class="col-sm-4 control-label">Availible Assets </label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Image','Video','Audio','Document','Reels'],'name'=>'assets'])
                                
                                </div>
                            </div>  --}}


                            <div class="form-group col-sm-6">
                                <label for="haircolor" class="col-sm-4 control-label">Select Hair Color</label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Brown','Blond','Black','Red','Gray'],'name'=>'hair_color'])
                                    
                                </div>
                            </div>  

                            <div class="form-group col-sm-6">
                                <label for="eyecolor" class="col-sm-4 control-label">Select Eye Color</label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Brown','Blond','Black','Red','Gray'],'name'=>'eye_color'])
                                    
                                 </div>
                            </div>  

                            <div class="form-group col-sm-6">
                                <label for="bodytype" class="col-sm-4 control-label">Body Type</label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Average','Slim','Muscular','Curvy'],'name'=>'body_type'])
                                
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="checkbox"  class="form-check-input" id="hasDrivingLicense">
                                <label class="form-check-label" for="hasDrivingLicense">Have Driver's License</label>
                                <input type="checkbox"  class="form-check-input" id="hasPassport">
                                <label class="form-check-label" for="hasPassport">Have Passport</label>
                                <input type="checkbox"  class="form-check-input" id="selfRecord">
                                <label class="form-check-label" for="selfRecord">Self-record</label>              
                            </div>


                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn__red animation btn-half pull-right ">Search</button>   
                            </div>
                          
                        </div>

                        

          
                        
                    </form>
                </div>

            </div>

        </div>
    </section>
    
    <section>
        <div class="section portfolio">
            <div class="container">
                <div class="row">
                    {{-- <div class="button-group filters-button-group">
                        <button class="button title__grey is-checked" data-filter="*">all</button>
                        <button class="button title__grey" data-filter=".women">WOMEN</button>
                        <button class="button title__grey" data-filter=".men">MEN</button>
                        <button class="button title__grey" data-filter=".stylists">Stylists</button>
                        <button class="button title__grey" data-filter=".new-faces">New Faces</button>
                        <button class="button title__grey" data-filter=".teenagers">Teenagers</button>
                        <button class="button title__grey" data-filter=".lifestyle">Lifestyle</button>


                    </div> --}}

                    <div class="col-md-12" >
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            <div class="grid-gutter"></div>

                            @foreach ($members as $member)
                                <div class="effect-bubba grid-item grid-item__width2 new-faces women" data-category="women">
                                    <img class="img-responsive" src="{{ asset(!is_null($member->profile) ? (!is_null($member->profile->profile_img) && \Storage::exists('public/uploads/profile/'.$member->profile->profile_img)? 'storage/uploads/profile/'.$member->profile->profile_img: 'web/img/default.jpg') : 'web/img/default.jpg') }} " alt="sample image">
                                    <div class="grid-item__contant-info">
                                        <div class="grid-item__contant-name">{{!is_null($member->profile) ? $member->profile->legal_first_name.' '.$member->profile->legal_last_name : $member->f_name.' '.$member->l_name}} </div>
                                        <div class="grid-item__contant-place title__grey">{{!is_null($member->profile) ?$member->profile->address_1 : ''}} {{!is_null($member->profile) ?$member->profile->country : ''}} {{!is_null($member->profile) ?$member->profile->city : ''}}</div>
                                        <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                        <div class="grid-item__contant-place title__grey">Height: {{!is_null($member->profile) ?$member->profile->height : ''}}</div>
                                        <a href="{{route('model.single',$member->id)}}" class="picklist-btn"><i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i></a>
                                        {{-- <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                        <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i> --}}

                                        @hasanyrole('agent|superadmin')
                                            <a href="#picklist-modal" class="picklist-btn" data-memberid="{{$member->id}}" role="button" data-toggle="modal">
                                        @endhasanyrole

                                        @guest
                                            <a href="{{route('login')}}">
                                        @endguest
                                        
                                            <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px" style="color: white" ></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            
                            {{-- <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-5.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 new-faces stylists" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-6.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 women" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-4.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 women" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-7.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 teenagers lifestyle " data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-3.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 new-faces stylists " data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-2.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 lifestyle men" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-8.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 lifestyle men" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-9.jpg') }} " alt="sample image">
                                <div class="grid-item__contant-info">
                                    <div class="grid-item__contant-name">Kate Farmer</div>
                                    <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                    <div class="grid-item__contant-place title__grey">Manchester City</div>
                                    <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                    <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                    <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                    <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                    <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<div id="save-search-modal" class="modal" style="z-index: 9999;" data-easein="swoopIn"  tabindex="-1" role="dialog" aria-labelledby="save-search-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" style="cursor: pointer" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title">
                    Save Search
                </h4>
            </div>
            
            <form action="{{route('backend.save_search')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <hr>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" name="ss_title" required id="exampleFormControlInput1" placeholder="Enter Title">
                        @error('ss_title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                        Close
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>
<script src="{{ asset('js/tagsinput.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {

        @if($errors->has('ss_title'))
            $('#save-search-modal').modal('toggle');
        @endif

        @if($errors->has('picklist_id'))
            $('#picklist-modal').modal('toggle');
        @endif

        $('.js-example-basic-multiple').select2();
        
        @if(session()->has('old_query.gender'))
            var gender={!!json_encode(session('old_query')['gender'])!!};
            
            $('[name="gender[]"]').val(gender);
            $('[name="gender[]"]').trigger('change');
        @endif

        @if(session()->has('old_query.eye_color'))
            var eye_color={!!json_encode(session('old_query')['eye_color'])!!};
            
            $('[name="eye_color[]"]').val(eye_color);
            $('[name="eye_color[]"]').trigger('change');
        @endif

        @if(session()->has('old_query.hair_color'))
            var hair_color={!!json_encode(session('old_query')['hair_color'])!!};
            
            $('[name="hair_color[]"]').val(hair_color);
            $('[name="hair_color[]"]').trigger('change');
        @endif

        @if(session()->has('old_query.skills'))
            var skills={!!json_encode(session('old_query')['skills'])!!};
            
            $('[name="skills[]"]').val(skills);
            $('[name="skills[]"]').trigger('change');
        @endif

        @if(session()->has('old_query.assets'))
            var assets={!!json_encode(session('old_query')['assets'])!!};
            
            $('[name="assets[]"]').val(assets);
            $('[name="assets[]"]').trigger('change');
        @endif

        $(".taginput").tagsinput({
			maxTags: 5,
		})

        $(".js-range-slider").ionRangeSlider({
            skin: "round",
            onChange: function (data) {
                // Called every time handle position is changed
                $('[name="new_age"]').val(data.from+';'+data.to);
                console.log(data);
            },
        });
        /* $('#talent-search-form').on('submit',function(e){
            e.preventDefault();
            
            $('#talent-search-form *').filter(':input').each(function () {
                
                if ( $(this).val()=='') {
                    console.log($(this).attr('name'));
                    $(this).addClass( "custom-border" );
                    if (! $(this).next().is('.custom-error')) {
                        $(this).after( "<div class='custom-error'>This field is required.</div>" );
                    }
                    
                }
                else{
                    $(this).css( "border-color", "#dddddd" );
                    $(this).next( ".custom-error" ).remove();
                }
            });
        }) */
    });

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