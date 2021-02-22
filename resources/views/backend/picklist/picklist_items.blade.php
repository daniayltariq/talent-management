@extends('backend.layouts.app')

@section('styles')
 <style>
	 .kt-widget5 .kt-widget5__item .kt-widget5__content .kt-widget5__pic img {
    	max-width: 4.5rem !important;
	 }

	 .pagination {
			display: inline-block;
			padding-left: 0;
			margin: 20px 0;
			border-radius: 4px;
		}

		.pagination>li {
			display: inline;
		}

		.blog__pagination {
			margin: 0;
			text-align: center;
		}

		.blog__pagination .pagination {
			padding: 60px 0 0;
			margin: 0;
			border-top: 1px solid #ddd;
		}

		.pagination>li:last-child>a, .pagination>li:last-child>span, .pagination>li:first-child>a, .pagination>li:first-child>span, .pagination>li>a, .pagination>li>span {
			border-radius: 0;
		}

		.pagination>li>a, .pagination>li>span {
			position: relative;
			float: left;
			padding: 6px 12px;
			margin-left: -1px;
			line-height: 1.42857143;
			color: #337ab7;
			text-decoration: none;
			background-color: #fff;
			border: 1px solid #ddd;
		}
		.pagination>li>a, .pagination>li>span {
			border: none;
			color: #3a3a54;
			font-weight: 600;
			text-transform: uppercase;
			background: #F6F6F6;
			margin-left: 17px;
			font-size: 15px;
			padding: 8px 16px;
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
									@if ($item->member()->exists())
										<div class="kt-widget5__item">
											<div class="kt-widget5__content">
												<div class="kt-widget5__pic">
													<img class="kt-widget7__img" src="{{ asset(!is_null($item->member->profile) ? (!is_null($item->member->profile->profile_img) && \Storage::exists('public/uploads/profile/'.$item->member->profile->profile_img)? 'storage/uploads/profile/'.$item->member->profile->profile_img: 'web/img/default.jpg') : 'web/img/default.jpg') }}" alt="">
												</div>
												<div class="kt-widget5__section">
													<a href="#" class="kt-widget5__title">
													{{$item->member->profile->legal_first_name?? $item->member->f_name ?? ''}} {{$item->member->profile->legal_last_name?? $item->member->l_name ?? ''}}
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
												<a href="{{route('backend.delete_picklist_item',$item->id)}}" class="btn btn-sm btn-label-danger btn-bold">Delete</a>
											</div>
										</div>
									@endif
									
								@endforeach
								
							</div>
						</div>
					</div>
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