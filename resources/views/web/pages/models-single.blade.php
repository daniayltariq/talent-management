@extends('web.layouts.app')
@section('styles')
<style>
   .refer_code_div{
   display: none;
   }
</style>
@endsection
@section('content')
@include('web.partials.loader')
<section class="page__img" style="background-image: url('{{asset('web/img/page-img.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="title__wrapp">
            <div class="page__subtitle title__grey">Backstage</div>
            <h1 class="page__title">Our models</h1>
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
               <div id="model-slider" class="s-model__photos col-md-6">
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
								<img class="sp-thumbnail"  alt="thumb1" src="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}"/>
							@endforeach
						</div>
					@else
						<h4>No photos available</h4>
				   @endif
                  
               </div>
               <div class="s-model__contant col-sm-5">
                  <h2 class="s-model__name">
                     <span class="line"></span>Eliza Guerrero
                  </h2>
                  <div class="s-model__info clearfix">
                     <ul class="s-model__list s-model__list_l">
                        <li class="s-model__list-item">Height <span></span></li>
                        <li class="s-model__list-item">Bust</li>
                        <li class="s-model__list-item">Waist</li>
                        <li class="s-model__list-item">Hips</li>
                        <li class="s-model__list-item">Dress</li>
                        <li class="s-model__list-item">Shoe W</li>
                        <li class="s-model__list-item">Hair colour</li>
                        <li class="s-model__list-item">Eyes</li>
                     </ul>
                     <ul class="s-model__list s-model__list_r">
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->height ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->bust ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->waist ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->hips ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->dress ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->shoes ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->hairs ?? 'Nil'}}</li>
                        <li class="s-model__list-item s-model__list-item_r">{{$data['profile']->eyes ?? 'Nil'}}</li>
                     </ul>
                  </div>
                  <a href="" class="btn btn__red animation">Book this model</a><br><br>
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
</section>
<!-- Portfolio Section End -->
<!-- Call To Action Section Start -->
@endsection
@section('scripts')

<script>
	fullPageLoader(true);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/js/jquery.sliderPro.js" integrity="sha512-hPizGLCamPr5++t42ujZBs6RwziPxMDb40fcuSG8b2lnJLRPdAvcPTMy563keCr/lxPNBXgAuPmDL1WQ5FNRKg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('web/libs/model-slider/model-slider.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('web/libs/model-slider/slider-pro.css') }}" type="text/css" />
<!-- Materialdesignicons CSS (icon) -->
<link rel="stylesheet" href="{{ asset('web/libs/icons/materialdesignicons.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('web/libs/icons/flaticon.css') }}">
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
		setTimeout(function() { 
          fullPageLoader(false);
       }, 1500);
	})
</script>

@endsection