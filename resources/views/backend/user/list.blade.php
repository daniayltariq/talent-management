@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend-assets/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
	<style>
		.bootstrap-switch-container{
			width: 160px !important;
		}

		.name-badge{
			position: relative;
    		min-width: 175px;
			font-size: 13px;
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
			<div class="kt-portlet__head-label" style="float: right">
				<a href="{{ route('backend.user.create') }}" class="btn btn-info btn-xs"><i class='fa fa-plus'></i> New User</a>
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
										<td class="name-badge p-3">{{ $user->f_name ?? '' }} {{ $user->l_name ?? '' }}
											@if ($user->referal_code()->exists() && $user->referal_code->points>1)
												<span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--outline kt-badge--pill kt-badge--rounded" style="position: absolute;top: 2%;margin-left: 2%;">Rewarded</span>
											@endif
											
										</td>
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
											
											@if ($user->hasActiveSubscription() && $user->getActivePlan()->training_invitation==1)
												<button data-user="{{$user->id}}" name="userInvite" class="btn btn-success btn-sm btn-bg-white" style="color: #5d78ff;" data-toggle="modal" data-target="#invite_modal">Invite</button>
											@endif
											

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
<div class="modal fade" id="invite_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="{{route('backend.user.invite')}}" method="GET" enctype="multipart/form-data" class="kt-form">
				@csrf
				<input type="hidden" name="user_id" >
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Invite User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-3 col-sm-3 col-xs-12">Subject</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input class="form-control " type="text" name="subject">
									@error('title')
										<div class="error">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-3 col-sm-3 col-xs-12">Message</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<textarea name="message" class="form-control "></textarea>
									@error('message')
										<div class="error">{{ $message }}</div>
									@enderror
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
	$("[name='featured']").bootstrapSwitch();

	@if ($errors->has('subject') || $errors->has('message'))
		$('#invite_modal').modal('show');
	@endif

	$('[name="userInvite"]').click(function(e){
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