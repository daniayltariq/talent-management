@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend-assets/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
	<style>
		.bootstrap-switch-container{
			width: 160px !important;
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
					Picklist
				</h3>
				
			</div>
			{{-- <div class="kt-portlet__head-label" style="float: right">
				<a href="{{ route('backend.user.create') }}" class="btn btn-info btn-xs"><i class='fa fa-plus'></i> New User</a>
			</div> --}}
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
								   <th>Title</th>
								   <th>Description</th>
								   <th>Talent</th>
								   <th>Operation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($picklist as $key => $list)
									<tr>
										<td>{{++$key}}</td>
										<td>{{ $list->title ?? '' }}</td>
										<td>{{ $list->description ?? '' }}</td>
										<td>{{ count($list->items) }}</td>
										<td>
											<a href="{{route('backend.picklist.show',$list->id)}}" class="btn btn-primary btn-sm btn-bg-white" style="color: #5d78ff;" ><div class="kt-demo-icon__preview">View
											</div> </a>
											
											@include('components.delete' , ['data' => $list->id, 'route' => 'backend.picklist.destroy'])
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--end::Section-->
		</div>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
<script type="text/javascript">

// $("input[type=file]").change(function(){
// 	changeImageView(this);
// });

$(document).ready(function(){
	$("[name='status']").bootstrapSwitch();

	$('[name="userRole"]').click(function(e){
		$('[name="user_id"]').val($(this).data('user'));
		
	});

	$("[name='status']").on('switchChange.bootstrapSwitch',function (e, state) {
		/* console.log($(this).data('userid')); */
		const that=this;
		$.get("{{ route('backend.room.updateStatus') }}",
		{
			room_id: $(this).data('roomid'),
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
@endsection