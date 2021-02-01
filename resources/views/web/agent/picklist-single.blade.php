@extends('web.layouts.app')


@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css" rel="stylesheet" />
<style type="text/css">
	.btn-share {
		padding: 16px 32px;
		font-size: 15px;
		margin-left: 10px;
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
   font-family: 'Roboto Slab', serif;
   font-weight: 700;
   }

   .popup-inner p {
      padding: 0px 27px;
   font-size: 19px;
   font-weight: 400;
   }

   .popup-contact-wrapper{
      border-radius: 8px;
      border: 2px solid #dadce0;
      border-top: 4px solid #e77826;
   }

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
   background: #f00;
   text-decoration: none;
   border-color: #f00;
   }

   .popup-close:hover:after,
   .popup-close:hover:before {
   background: #fff;
   }

	.d-none{
      display: none;
   	}
   .popup-form{
      text-align: left;
      padding: 28px;
   	}

	.tal-profile{
		height: 100%;
		width: 100%;
		object-fit: cover;
	}

	.text-red{
		color: red;
	}

	.del_pl{
		float: right;
		padding: 2px 10px;
	}

	.del_pl:hover{
		border: 1px solid #f75959;
		border-radius: 7px;
	}

	.d-inline{
		display: inline;
	}

	.select2-drop-active{
		z-index: 99999999 !important;
	}
</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">Picklist</h1>
			</div>
		</div>
	</div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog picklist">
	<div class="container">
		<div class="row">
			<div class="blog__posts col-md-12">
				<div class="blog__list">
					<h4 class="widget__title">{{$picklist->title}}</h4>

					{{-- <a href="">

						<h4 class="widget__title pull-right widget__titless" >Browse conversations from all topics </h4>
					</a> --}}

					<div class="row mb-5">
						<div class="col-sm-10 col-centered">
							<div class="pull-right">
								@if (count($items) > 0)
									<button class="btn btn-share" pd-popup-open="popupNew"><i class="mdi mdi-message-outline"></i>  Send Message</button>
								@endif
								
								{{-- <button class="btn btn-share"><i class="mdi mdi-email-outline"></i>  Share Picklist</button> --}}
							</div>
						</div>
					</div>

					


					<div class="row ">
						<div class="col-sm-10 col-centered">
							@forelse ($items as $item)
								@if ($item->member()->exists() && $item->member->profile()->exists())
									<div class="single-talent mb-5">
										<div class="row">
											<div class="col-sm-4">
												<div class="profile-sec ml-5 mb-4">
													<img src="{{ asset(is_null($item->member->profile) || is_null($item->member->profile->profile_img) ? 'web/img/user.png': ('storage/uploads/profile/'.$item->member->profile->profile_img)) }}" class="img img-responsive tal-profile">
												</div>
												<div class="ml-5 talent-specs">
													<table>
														<tr>
															<th>Height</th>
															<td>{{$item->member->profile->feet ? \Str::finish($item->member->profile->feet, "'") : ''}} {{$item->member->profile->height ? \Str::finish($item->member->profile->height,"''") : ''}}</td>
														</tr>
														<tr>
															<th>Weight</th>
															<td>{{$item->member->profile->weight ?? 0}} lbs</td>
														</tr>
														<tr>
															<th>Hair</th>
															<td>{{$item->member->profile->hairs ?? ''}}</td>
														</tr>
														<tr>
															<th>Eyes</th>
															<td>{{$item->member->profile->eyes ?? ''}}</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="talent-intro">
													<h2 class="d-inline">{{$item->member->profile->legal_first_name ?? $item->member->f_name }}
														{{$item->member->profile->legal_last_name ?? $item->member->l_name}}</h2>
													
													<a class="del_pl" href="{{route('agent.delete_picklist_user',$item->id)}}"><i class="fa fa-trash text-red"></i></a>
													
													<a target="_blank" href="{{!is_null($item->member->profile->custom_link) ? url('/').'/member/'.$item->member->profile->custom_link : '#'}}"><p>{{!is_null($item->member->profile->custom_link) ? url('/').'/member/'.$item->member->profile->custom_link : ''}}</p></a>
												</div>

												<div class="talent-skill">
													<p><b>Specials Skills</b></p>
													{{-- {{dd($item->member->skills)}} --}}
													@if ($item->member()->exists() && $item->member->skills()->exists())
														<p>
															@foreach ($item->member->skills as $skill)
																@if ($skill->skill()->exists())
																	<span>{{$skill->skill->title. (!$loop->last ?',':'')}} </span>
																@endif
															
															@endforeach
														</p>
													@endif
													
													{{-- <p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

													<p>Valid Driver’s License and U.S. Passport.</p> --}}
												</div>
											</div>
											
										</div>
									</div>
								@endif
								
							@empty
								<h4 style="text-align: center">No items!</h4>
							@endforelse
							
							{{-- <div class="single-talent mb-5">
								<div class="row">
									<div class="col-sm-4">
										<div class="profile-sec ml-5 mb-4">
											<img src="{{ asset('web/uploads/profile/talent-2.jpg') }}" class="img img-responsive">
										</div>
										<div class="ml-5 talent-specs">
											<table>
												<tr>
													<th>Height</th>
													<td>5.8</td>
												</tr>
												<tr>
													<th>Weight</th>
													<td>162 lbs</td>
												</tr>
												<tr>
													<th>Hair</th>
													<td>Brown</td>
												</tr>
												<tr>
													<th>Eyes</th>
													<td>Blonde</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="talent-intro">
											<h2>Sally J. Jones</h2>
											<p>www.thetalentdepot.com/johnmsmith</p>
										</div>

										<div class="talent-skill">
											<p><b>Specials Skills</b></p>
											<p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

											<p>Valid Driver’s License and U.S. Passport.</p>
										</div>
									</div>
									
								</div>
							</div>
							<div class="single-talent mb-5">
								<div class="row">
									<div class="col-sm-4">
										<div class="profile-sec ml-5 mb-4">
											<img src="{{ asset('web/uploads/profile/talent-3.jpg') }}" class="img img-responsive">
										</div>
										<div class="ml-5 talent-specs">
											<table>
												<tr>
													<th>Height</th>
													<td>5.8</td>
												</tr>
												<tr>
													<th>Weight</th>
													<td>162 lbs</td>
												</tr>
												<tr>
													<th>Hair</th>
													<td>Brown</td>
												</tr>
												<tr>
													<th>Eyes</th>
													<td>Blonde</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="talent-intro">
											<h2>Sally J. Jones</h2>
											<p>www.thetalentdepot.com/johnmsmith</p>
										</div>

										<div class="talent-skill">
											<p><b>Specials Skills</b></p>
											<p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

											<p>Valid Driver’s License and U.S. Passport.</p>
										</div>
									</div>
									
								</div>
							</div> --}}
							
						</div>
					</div>
					
					
				</div>
				<!-- end of blog__list -->
				<nav class="blog__pagination">
					@if ($items->lastPage() > 1)
					    <ul class="pagination">
					        <li class="{{ ($items->currentPage() == 1) ? ' disabled' : '' }}">
					            <a href="{{ $items->url(1) }}">First</a>
					         </li>
					        @for ($i = 1; $i <= $items->lastPage(); $i++)
					            <?php
					            $half_total_links = floor(5 / 2);
					            $from = $items->currentPage() - $half_total_links;
					            $to = $items->currentPage() + $half_total_links;
					            if ($items->currentPage() < $half_total_links) {
					               $to += $half_total_links - $items->currentPage();
					            }
					            if ($items->lastPage() - $items->currentPage() < $half_total_links) {
					                $from -= $half_total_links - ($items->lastPage() - $items->currentPage()) - 1;
					            }
					            ?>
					            @if ($from < $i && $i < $to)
					                <li class="{{ ($items->currentPage() == $i) ? ' active' : '' }}">
					                    <a href="{{ $items->url($i) }}">{{ $i }}</a>
					                </li>
					            @endif
					        @endfor
					        <li class="{{ ($items->currentPage() == $items->lastPage()) ? ' disabled' : '' }}">
					            <a href="{{ $items->url($items->lastPage()) }}">Last</a>
					        </li>
					    </ul>
					@endif
				</nav>
			</div>
			
		</div>
	</div>
</div>

<!-- Modal -->
<div class="popup" pd-popup="popupNew">
	<div class="popup-inner">
	   <div class="popup-contact-wrapper">
		  <h4 class="popup-header mx-auto">{{$picklist->title}} </h4>
		  
		  
		  <form method="POST" action="{{route('agent.send_text')}}" class="popup-form">
			 <hr>
			 @csrf
			 <input type="hidden" name="picklist_id" value="{{$picklist->id}}">
			 <div class="form-group">
				<label for="recipient-name" class="col-form-label">Select Recipient:</label><br>
				<input type="checkbox" id="select_all_btn" > Select All
				<select class="form-control" name="recipient[]" id="recipient" multiple="multiple">
					@forelse ($items as $item)
						@if ($item->member()->exists())
							<option value="{{$item->member->phone ?? '' }}">{{$item->member->profile->legal_first_name ?? $item->member->f_name}}
							{{$item->member->profile->legal_last_name ?? $item->member->l_name}}</option>
						@endif
						
					@endforeach
					
				</select>
			 </div>
			 <div class="form-group">
				<label for="message-text" class="col-form-label">Message:</label>
				<textarea class="form-control" name="message"></textarea>
			 </div>
			 <div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm" style="padding: 7px 22px;"><i class="fas fa-paper-plane"></i></button>
			 </div>
		  </form>


		  <a class="popup-close" pd-popup-close="popupNew" href="#"> </a>
	   </div>
	   
	</div>
</div>
<!-- Blog Section End -->
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script>

	$(document).ready(function() {
		$('#recipient').select2({closeOnSelect:false});
		$("#select_all_btn").click(function(){
			if($("#select_all_btn").is(':checked') ){
				$("#recipient > option").prop("selected","selected");
				$("#recipient").trigger("change");
			}else{
				$("#recipient > option").removeAttr("selected");
				$("#recipient").trigger("change");
			}
		});

		$("#button").click(function(){
			alert($("#recipient").val());
		});
	});

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
	
@endsection