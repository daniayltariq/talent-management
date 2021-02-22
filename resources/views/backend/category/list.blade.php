@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend-assets/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
	<style>
		.bootstrap-switch-container{
			width: 160px !important;
		}

		.btn-primary:hover,.btn-danger:hover{
			color: #fff !important;
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
					Categories
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
								   <th>Category</th>
								   <th>Slug</th>
								   <th>Active</th>
								   <th>Operation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $key => $room)
									<tr>
										<td>{{++$key}}</td>
										<td>{{ $room->title ?? '' }}</td>
										<td>{{ $room->slug ?? '' }}</td>
										<td>
											<input data-switch="true" name="status" type="checkbox" data-roomid="{{$room->id}}" data-on-text="Yes" data-off-text="No" data-on-color="success" data-off-color="warning" {{$room->status==1?"checked=checked":""}}>
										</td>
										<td>
											<a href="{{route('backend.category.edit',$room->id)}}" class="btn btn-primary btn-sm btn-bg-white" style="color: #5d78ff;" ><div class="kt-demo-icon__preview">Edit
											</div> </a>
											
											@include('components.delete' , ['data' => $room->id, 'route' => 'backend.category.destroy'])
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
{{-- <div class="modal fade" id="role_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="{{route('backend.user.assignRole')}}" method="POST" id="user-content-form" enctype="multipart/form-data" class="kt-form">
				@csrf
				<input type="hidden" name="user_id" >
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Assign Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-12">Add Name</label>
								<div class="col-md-12">
								<select class="form-control" name="role_id">
									<option value="">Select Role</option>
									@foreach ($roles as $role)
											<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
								</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save</button>
				</div>
			</form>
        </div>
    </div>
</div> --}}
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
		$.get("{{ route('backend.category.updateStatus') }}",
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