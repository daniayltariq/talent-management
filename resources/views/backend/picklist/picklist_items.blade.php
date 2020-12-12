@extends('backend.layouts.app')

@section('styles')
 <style>
	 .kt-widget5 .kt-widget5__item .kt-widget5__content .kt-widget5__pic img {
    	max-width: 4.5rem !important;
	 }
 </style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<!--begin::Portlet-->
	<div class="row">
		<div class="col-xl-12 col-lg-12 order-lg-12 order-xl-1">
			<!--begin:: Widgets/Best Sellers-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Picklist: <span>{{$picklist->title ?? ''}}</span> 
						</h3>
					</div>
					{{-- <div class="kt-portlet__head-toolbar">
						<ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
								Latest
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
								Month
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
								All time
								</a>
							</li>
						</ul>
					</div> --}}
				</div>
				<div class="kt-portlet__body">
					<div class="tab-content">
						<div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
							<div class="kt-widget5">
								@foreach ($items as $item)
									<div class="kt-widget5__item">
										<div class="kt-widget5__content">
											<div class="kt-widget5__pic">
												<img class="kt-widget7__img" src="{{ asset(!is_null($item->member->profile) ? (!is_null($item->member->profile->profile_img) && \Storage::exists('public/uploads/profile/'.$item->member->profile->profile_img)? 'storage/uploads/profile/'.$item->member->profile->profile_img: 'web/img/default.jpg') : 'web/img/default.jpg') }}" alt="">
											</div>
											<div class="kt-widget5__section">
												<a href="#" class="kt-widget5__title">
												{{$item->member->profile->legal_first_name?? ''}} {{$item->member->profile->legal_last_name?? ''}}
												</a>
												<p class="kt-widget5__desc">
													Gender: {{ $item->member->gender ?? ''}}
												</p>
												<p class="kt-widget5__desc">
													Age: {{ $item->member->age.' yrs'?? ''}}
												</p>
												<div class="kt-widget5__info">
													<span>Email:</span>
													<span class="kt-font-info">{{$item->member->profile->email ?? ''}}</span>
													<span>Phone:</span>
													<span class="kt-font-info">{{$item->member->profile->telephone ?? ''}}</span>
												</div>
											</div>
										</div>
										<div class="kt-widget5__content">
											<a href="{{route('backend.delete_picklist_item',$item->id)}}" class="btn btn-sm btn-label-danger btn-bold">Follow</a>
										</div>
									</div>
								@endforeach
								
							</div>
							{{$items->render()}}
						</div>
					</div>
				</div>
			</div>
			<!--end:: Widgets/Best Sellers-->
		</div>
	</div>
	<!--end::Portlet-->
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">

// $("input[type=file]").change(function(){
// 	changeImageView(this);
// });

$(document).ready(function(){
	
});
</script>
@endsection