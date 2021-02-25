@extends('backend.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.css" integrity="sha512-WfDqlW1EF2lMNxzzSID+Tp1TTEHeZ2DK+IHFzbbCHqLJGf2RyIjNFgQCRNuIa8tzHka19sUJYBO+qyvX8YBYEg==" crossorigin="anonymous" />
	<style>
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

		.disabled{
			pointer-events: none;
    		opacity: 0.6;
		}
	</style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Testimonials
				</h3>
				
			</div>
			<div class="kt-portlet__head-label" style="float: right">
				<a href="{{ route('backend.testimonial.create') }}" style="background-color: #0abb87;" class="btn btn-success btn-xs"><i class='fa fa-plus'></i>Create</a>
			</div>
		</div>
		<div class="kt-portlet__body">
			<!--begin::Section-->
			<div class="kt-section">
				 
				<div class="kt-section__content">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
								   <th>Name</th>
								   <th>Image</th>
								   <th>Content</th>
								   <th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($testimonials as $key => $test)
									<tr>
										<td>{{++$key}}</td>
										<td>{{ $test->name ?? '' }}</td>
										<td><img class="kt-media" style="max-width: 100px;height: 40px;" src="{{asset($test->image ?? '')}}" alt=""></td>
										<td style="width: 40%">{{printTruncated(160, $test->content, $isUtf8=true)}}</td>
										<td>
											<a href="{{route('backend.testimonial.edit',$test->id)}}" class="btn btn-primary btn-sm btn-bg-white" style="color: #5d78ff;" ><div class="kt-demo-icon__preview">
												<i style="color: #5d78ff;" class="fa fa-pencil-alt"></i>
											</div> </a>
											
											@include('components.delete' , ['data' => $test->id, 'route' => 'backend.testimonial.destroy'])
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<nav class="blog__pagination">
				@if ($testimonials->lastPage() > 1)
				 <ul class="pagination">
					 <li class="{{ ($testimonials->currentPage() == 1) ? ' disabled' : '' }}">
						 <a href="{{ $testimonials->url(1) }}">First</a>
					  </li>
					 @for ($i = 1; $i <= $testimonials->lastPage(); $i++)
						 <?php
						 $half_total_links = floor(5 / 2);
						 $from = $testimonials->currentPage() - $half_total_links;
						 $to = $testimonials->currentPage() + $half_total_links;
						 if ($testimonials->currentPage() < $half_total_links) {
							$to += $half_total_links - $testimonials->currentPage();
						 }
						 if ($testimonials->lastPage() - $testimonials->currentPage() < $half_total_links) {
							 $from -= $half_total_links - ($testimonials->lastPage() - $testimonials->currentPage()) - 1;
						 }
						 ?>
						 @if ($from < $i && $i < $to)
							 <li class="{{ ($testimonials->currentPage() == $i) ? ' active' : '' }}">
								 <a href="{{ $testimonials->url($i) }}">{{ $i }}</a>
							 </li>
						 @endif
					 @endfor
					 <li class="{{ ($testimonials->currentPage() == $testimonials->lastPage()) ? ' disabled' : '' }}">
						 <a href="{{ $testimonials->url($testimonials->lastPage()) }}">Last</a>
					 </li>
				 </ul>
			 @endif
			 </nav>
			<!--end::Section-->
		</div>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
<script type="text/javascript">

	// $("input[type=file]").change(function(){
	// 	changeImageView(this);
	// });

	$(document).ready(function(){
		$("[name='status']").bootstrapSwitch();

		$("[name='status']").on('switchChange.bootstrapSwitch',function (e, state) {
			/* console.log($(this).data('userid')); */
			const that=this;
			$.get("{{ route('backend.topic.updateStatus') }}",
			{
				topic_id: $(this).data('topicid'),
				status:state==true?1 : 0
			},
			function(status){
				
				if (status=="success") {
					$(that).bootstrapSwitch('state', state, true);
				} else {
					$(that).bootstrapSwitch('state', !state, true);
				}
			});
			
		});

		
	});
</script>
<script type="text/javascript">

	function changeImageView(input, id,max_size) {

		var FileUploadPath = input.value;

		if (FileUploadPath == '') {
			alert("Please upload an image");

		} 
		else 
		{
			var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			if (Extension == "jpg" || Extension == "png")
			{
				if (input.files && input.files[0]) {
					var size = input.files[0].size;
					
					if(size > max_size){
						alert("Maximum file size exceeds");
						return;
					}else{
						var reader = new FileReader();
						/* alert(input.files[0].size); */
						reader.onload = function (e) {
							$('#'+id).attr('src', e.target.result).fadeIn('slow');
						}
						reader.readAsDataURL(input.files[0]);
					}
				}
			}
			else{
				alert("Photo only allows file types of GIF, PNG");
			}
			
		}   
	// alert('');
	}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.js" integrity="sha512-+uGHdpCaEymD6EqvUR4H/PBuwqm3JTZmRh3gT0Lq52VGDAlywdXPBEiLiZUg6D1ViLonuNSUFdbL2tH9djAP8g==" crossorigin="anonymous"></script>
<script>
	$('.del_pl').on('click',function(e){
		var that=$(this);
		e.preventDefault();
		
		
		Swal.fire({
			title: 'Are you sure?',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
			}).then((result) => {
			if (result.isConfirmed) {
				
				that.parent('form').submit();
			}
		})
	})
</script>
@endsection