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
					User list
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
								   <th>Name</th>
								   <th>Email</th>
								   <th>Role</th>
								   <th>Active</th>
								   <th>Feature</th>
								   <th>Operation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $key => $user)
									<tr>
										<td>{{++$key}}</td>
										<td>{{ $user->f_name ?? '' }} {{ $user->l_name ?? '' }}</td>
										<td>{{ $user->email ?? '' }}</td>
										<td>
											@foreach ($user->roles as $role)
												{{ $role->alias ?? '' }}
												<br>
											@endforeach
										</td>
										<td>
											<input data-switch="true" name="status" type="checkbox" data-userid="{{$user->id}}" data-on-text="Yes" data-off-text="No" data-on-color="success" data-off-color="warning" {{$user->status==1?"checked=checked":""}}>
										</td>
										<td>
											@if ($user->hasRole('candidate'))
												<input data-switch="true" name="featured" type="checkbox" data-userid="{{$user->id}}" data-on-text="Yes" data-off-text="No" data-on-color="success" data-off-color="warning" {{$user->featured==1?"checked=checked":""}}>
											@else
												<em>N/A</em>
											@endif
											
										</td>
										<td>
											<a href="{{route('backend.user.edit',$user->id)}}" class="btn btn-primary btn-sm btn-bg-white" style="color: #5d78ff;" ><div class="kt-demo-icon__preview">Edit
											</div> </a>
											{{-- <button data-user="{{$user->id}}" name="userRole" class="btn btn-success btn-sm btn-bg-white" style="color: #5d78ff;" data-toggle="modal" data-target="#role_modal">Role</button> --}}

											<a href="{{route('backend.user.impersonate',$user->id)}}" class="btn btn-success btn-sm btn-bg-white" style="color: #5d78ff;" ><div class="kt-demo-icon__preview">Impersonate
											</div> </a>

											{{-- <a href="{{ route('user.show', $user->id) }}" class="btn btn-view btn-xs" style=" color:white" ><i class="fa fa-folder" ></i> View </a>
											<a href="{{ route('user.updateStatus', $user->id) }}" class="btn btn-pause btn-xs" style=" color:white" ><i class="fa fa-pause" ></i> Pause</a> --}}
											{{-- <a  href="#" class="btn btn-duplicate btn-xs" style=" color:white" ><i class="fa fa-copy" ></i> Duplicate</a> --}}
											{{-- <a  href="#" class="btn btn-pause btn-xs" style=" color:white" ><i class="fa fa-archive" ></i> Achive </a> --}}
											@include('components.delete' , ['data' => $user->id, 'route' => 'backend.user.destroy'])
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
	$("[name='featured']").bootstrapSwitch();

	$('[name="userRole"]').click(function(e){
		$('[name="user_id"]').val($(this).data('user'));
		
	});

	$("[name='status']").on('switchChange.bootstrapSwitch',function (e, state) {
		/* console.log($(this).data('userid')); */
		const that=this;
		$.get("{{ route('backend.user.updateStatus') }}",
		{
			user_id: $(this).data('userid'),
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

	$("[name='featured']").on('switchChange.bootstrapSwitch',function (e, state) {
		/* console.log($(this).data('userid')); */
		const that=this;
		$.get("{{ route('backend.user.markFeatured') }}",
		{
			user_id: $(this).data('userid'),
			feature_status:state==true?1 : 0
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