@extends('web.layouts.app')
@section('loader')
@include('web.partials.loader',['show'=> true])
@endsection
@section('styles')
<style>
   .refer_code_div{
   display: none;
   }

   .pad-txt-email{
      padding: 13px 11px !important;
      font-size: 13px !important;
   }

   /* Book talent modal */
   .popup {
      
      overflow-x: hidden;
      overflow-y: auto;
      font-family: "Google Sans",Roboto,Arial,sans-serif;
      width: 100%;
      height: 100%;
      display: none;
      position: fixed;
      top: 0px;
      left: 0px;
      background: rgba(0, 0, 0, 0.75);
   }

   .popup {
      z-index: 999999;
      text-align: center;
   }

   .popup:before {
      content: '';
      display: inline-block;
      height: 100%;
      margin-right: -4px;
      vertical-align: middle;
   }

   .popup-header {
      color: white;
      font-family: "Google Sans",Roboto,Arial,sans-serif;
      width: fit-content;
      background-color: #e77826;
      border-radius: 0px 0px 6px 6px;
      margin-top: 0;
      padding: 0px 11px;
   }

   .popup-inner {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
      position: relative;
      max-width: 700px;
      width: 90%;
      padding: 40px;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
      border-radius: 3px;
      background: #fff;
      text-align: center;
   }

   .popup-inner h1 {
      font-weight: 700;
   }

   .popup-inner p {
      padding: 0px 27px;
      font-size: 19px;
      font-weight: 400;
   }

   /*.popup-contact-wrapper{
      border-radius: 8px;
      border: 2px solid #dadce0;
      border-top: 4px solid #e77826;
   }*/

   .popup-close {
      width: 34px;
      height: 34px;
      padding-top: 4px;
      display: inline-block;
      position: absolute;
      top: 20px;
      right: 20px;
      -webkit-transform: translate(50%, -50%);
      transform: translate(50%, -50%);
      border-radius: 100%;
      background: transparent;
      border: solid 4px #808080;
   }

   .popup-close:after,
   .popup-close:before {
      content: "";
      position: absolute;
      top: 11px;
      left: 5px;
      height: 4px;
      width: 16px;
      border-radius: 30px;
      background: #808080;
      -webkit-transform: rotate(45deg);
      transform: rotate(45deg);
   }

   .popup-close:after {
      -webkit-transform: rotate(-45deg);
      transform: rotate(-45deg);
   }

   .popup-close:hover {
      -webkit-transform: translate(50%, -50%) rotate(180deg);
      transform: translate(50%, -50%) rotate(180deg);
      text-decoration: none;
      background: #df691a !important;
      border-color: #ffffff !important;
   }

   .popup-close:hover:after,
   .popup-close:hover:before {
      background: #fff;
   }

   .popup-close {
      border: solid 4px #ffffff !important;
   }

   .color-td{
      color: #e77826;
   }

   .color-td-2{
      color: rgb(9, 51, 83);
      font-weight: 550;
   }

   .text-left{
      text-align: left;
   }

   #send_mail:hover{
      color: #404040;
      text-decoration: underline;
   }

   .d-none{
      display: none;
   }
   .popup-form{
      text-align: left;
      padding: 28px;
   }

   .social_links{
      padding-left: 0;
      display: flex
   }

   .social_links li{
      list-style: none;
      font-size: 3rem;
   }

   .social_links li:hover{
      color: #e77826;
   }

   .social_links li:not(:last-child){
      margin-right: 16px;
      list-style: none;
   }
   /* End book talent modal */

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

    .z-0{
       z-index: 0;
    }
</style>
@endsection
@section('content')

<section class="page__img" style="background-image: url('{{asset('web/img/page-img.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="title__wrapp">
            {{-- <div class="page__subtitle title__grey">Backstage</div> --}}
            <h1 class="page__title">{{$data['profile']->legal_first_name ?? $data['profile']->user->f_name}} {{$data['profile']->legal_last_name ?? $data['profile']->user->l_name}}</h1>
         </div>
      </div>
   </div>
</section>
<!-- Slider Section End -->
<!-- Portfolio Section Start -->
<section class="section s-model">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
            <div class="row">
              <div class="element-loading"></div>
               <div id="model-slider-single" class="s-model__photos col-md-6">
    				   @if (count($data['images'])>0)
    					   <div class="sp-slides">
    							@foreach ($data['images'] as $img)
    								<div class="sp-slide">
    									<img class="sp-image" src="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"
    									alt="single1"
    									data-src="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"
    									data-small="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"
    									data-medium="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"
    									data-large="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"
    									data-retina="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"
    									style="object-fit: cover;"/>
    								</div>
							@endforeach
							
								{{-- <div class="sp-slide">
									<img class="sp-image" src="{{asset('web/img/single2.jpg')}}"
									alt="single2"
									data-src="{{asset('web/img/single2.jpg')}}"
									data-small="{{asset('web/img/single2.jpg')}}"
									data-medium="{{asset('web/img/single2.jpg')}}"
									data-large="{{asset('web/img/single2.jpg')}}"
									data-retina="{{asset('web/img/single2.jpg')}}"/>
								</div> --}}
						</div>
						<div class="sp-thumbnails">
							<h2 class="s-model__name">
								<span class="line"></span>Model Photos
							</h2>
							@foreach ($data['images'] as $img)
								<img class="sp-thumbnail" style="object-fit: cover;"  alt="thumb1" src="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"/>
							@endforeach
						</div>
					@else
						<h4>No photos available</h4>
				   @endif
                  
               </div>
               <div class="s-model__contant col-sm-5">
                  <h2 class="s-model__name">
                     <span class="line"></span>{{$data['profile']->legal_first_name ?? ''}} {{$data['profile']->legal_last_name ?? ''}}
                  </h2>
                  <div class="s-model__info clearfix">
                     <ul class="social_links">
                        @if (!is_null($data['social_links']))
                            @foreach ($data['social_links'] as $item)
                              <li><a href="{{$item->link}}" target="_blank"><i class="fab fa-{{$item->source}}"></i></a></li>
                           @endforeach
                        @endif
                        
                        
                     </ul>
                     <ul class="s-model__list s-model__list_l">
                        <li class="s-model__list-item">Height <span></span></li>
                        {{-- <li class="s-model__list-item">Bust</li> --}}
                        <li class="s-model__list-item">Waist</li>
                        {{-- <li class="s-model__list-item">Hips</li> --}}
                        {{-- <li class="s-model__list-item">Dress</li> --}}
                        <li class="s-model__list-item">Shoe </li>
                        <li class="s-model__list-item">Hair colour</li>
                        <li class="s-model__list-item">Eyes</li>
                     </ul>
                     <ul class="s-model__list s-model__list_r">
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->feet ? \Str::finish($data['profile']->feet, "'") : ''}} {{$data['profile']->height ? \Str::finish($data['profile']->height,"''") : ''}}</li>
                        {{-- <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->bust ?? 'Nil'}}</li> --}}
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->waist ?? 'Nil'}}</li>
                        {{-- <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->hips ?? 'Nil'}}</li> --}}
                        {{-- <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->dress ?? 'Nil'}}</li> --}}
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->shoes ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{\Str::ucfirst($data['profile']->hairs ?? 'Nil')}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{\Str::ucfirst($data['profile']->eyes ?? 'Nil')}}</li>
                     </ul>
                  </div>

                  @role('agent')
                     <div class="row d-flex">
                        <div class="m-3">
                           <a href="#" class="btn btn__red animation pad-txt-email" pd-popup-open="popupNew">Contact</a>
                        </div>
                        <div class="m-3">
                           <a href="#picklist-modal" data-memberid="{{$data['profile']->user->id}}" role="button" data-toggle="modal" class="btn btn__red animation pad-txt-email picklist-btn z-0">Add to Picklist</a>
                        </div>
                     </div>
                  @endrole
                  
                  
                  
                  {{-- 
                  <div class="row">
                     <div class="col-md-12">
                        <button class="btn btn__red animation" id="refer-btn">Refer a Friend</button>
                     </div>
                  </div>
                  <br>
                  <div class="row refer_code_div">
                     <div class="col-md-12">
                        <input class="form-control" type="text" name="refer_link">
                     </div>
                  </div>
                  --}}
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
					@forelse ($data['video'] as $vid)
						<video width="320" height="240" controls>
							<source src="{{ asset('storage/uploads/uploadData/' . $vid->file ?? '') }}" type="video/mp4">
						</video>
					@empty
						<h4 class="text-center">No videos found</h4>
					@endforelse
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
					@forelse ($data['audio'] as $audio)
						<audio controls>
							<source src="{{ asset('storage/uploads/uploadData/' . $audio->file ?? '') }}" type="audio/mpeg">
						</audio>
					@empty
						<h4 class="text-center">No audio found</h4>
					@endforelse
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="popup" pd-popup="popupNew">
      <div class="popup-inner">
         <div class="popup-contact-wrapper">
            <h4 class="popup-header mx-auto">{{$data['profile']->legal_first_name ?? ''}} {{$data['profile']->legal_last_name ?? ''}}</h4>

            {{-- <p class="text-left mt-5">
               <i class="far fa-address-card color-td"></i>
               <span class="color-td-2"> {{$data['profile']->address_1 ?? $data['profile']->address_2 ?? ''}} {{$data['profile']->city ?? ''}} {{$data['profile']->state ?? ''}} {{$data['profile']->country ?? ''}}<br>{{$data['profile']->zip ?? ''}} </span> 
            </p> --}}
            <p class="text-left"><i class="fas fa-phone-square color-td"></i><span class="color-td-2"> {{-- {{$data['profile']->telephone .',' ?? ''}} {{$data['profile']->mobile.',' ?? ''}} --}} {{$data['profile']->user->phone ?? ''}}</span> </p>
            <p class="text-left"><i class="fas fa-envelope-open-text color-td"></i> 
               <span class="color-td-2">{{$data['profile']->email ?? $data['profile']->user->email ?? ''}}.</span>
               @if ($data['plan']->agent_contact==1)
                  <a href="#" class=" color-td" type="button" id="send_mail">Send mail?</a>
               @endif 
            </p>
            
            
            <form method="POST" action="{{route('agent.mail_talent')}}" class="popup-form d-none">
               <hr>
               @csrf
               <input type="hidden" name="recipient" value="{{$data['profile']->email ?? $data['profile']->user->email ?? ''}}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Subject:</label>
                  <input type="text" class="form-control" name="subj" required>
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" name="message" required></textarea>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-sm" style="padding: 7px 22px;"><i class="fas fa-paper-plane"></i></button>
               </div>
            </form>


            <a class="popup-close" pd-popup-close="popupNew" href="#"> </a>
         </div>
         
      </div>
  </div>
</section>
<!-- Portfolio Section End -->
<!-- Call To Action Section Start -->
@endsection
@section('scripts')
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/js/jquery.sliderPro.js" integrity="sha512-hPizGLCamPr5++t42ujZBs6RwziPxMDb40fcuSG8b2lnJLRPdAvcPTMy563keCr/lxPNBXgAuPmDL1WQ5FNRKg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('web/libs/model-slider/model-slider.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('web/libs/model-slider/slider-pro.css') }}" type="text/css" />
<!-- Materialdesignicons CSS (icon) -->
<link rel="stylesheet" href="{{ asset('web/libs/icons/materialdesignicons.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('web/libs/icons/flaticon.css') }}">

<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>

<script>
  
  $(document).ready(function() {
  // model slider
    if ($("div").is("#model-slider-single")){
        $( '#model-slider-single' ).sliderPro({
        width: 500,
        height: 760,
        fade: true,
        arrows: true,
        buttons: false,
        fullScreen: true,
        shuffle: true,
        smallSize: 500,
        mediumSize: 1000,
        largeSize: 3000,
        thumbnailArrows: true,
        autoplay: false
      });
    }
    $('.element-loading').remove();
  });

</script>

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
   
	$(document).ready(function(){
    fullPageLoader(false);
		// setTimeout(function() { 
  //         fullPageLoader(false);
  //      }, 2000);
	})
</script>

<script>
   $(function() {
    //----- OPEN
      $('[pd-popup-open]').on('click', function(e)  {
         var targeted_popup_class = jQuery(this).attr('pd-popup-open');
         $('[pd-popup="' + targeted_popup_class + '"]').fadeIn(100);
   
         e.preventDefault();
      });
   
      //----- CLOSE
      $('[pd-popup-close]').on('click', function(e)  {
         var targeted_popup_class = jQuery(this).attr('pd-popup-close');
         $('[pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
   
         e.preventDefault();
      });

      $('#send_mail').on('click', function(e)  {
         $('.popup-form').toggleClass( "d-none" );
      });
   });
</script>

<script>
   $(document).ready(function() {
        @if($errors->has('member_id') || $errors->has('title') || $errors->has('description') )
            $('#picklist-modal').modal('toggle');
        @endif
    });
</script>

@endsection