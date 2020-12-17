@extends('backend.layouts.app')

@section('styles')
{{-- <link href="{{asset('backend-assets/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" /> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">
	<style>
		.bootstrap-switch-container{
			width: 160px !important;
		}

		.bootstrap-tagsinput .badge{
			margin: 2px 2px;
			background-color: #f2832c;
			border-radius: 4px;
		}

		.bootstrap-tagsinput {
			line-height: 28px;
		}

		.bootstrap-tagsinput .badge [data-role="remove"]:after {
			padding: 0px 5px 1px 5px;
		}

		.select2-container{
			width: 100% !important;
		}

		.overflow-in{
			overflow: inherit;
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
					<div class="table-responsive overflow-in">
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

											{{-- <button class="btn btn-success btn-sm btn-bg-white" name="sharePicklist" data-picklistid="{{$list->id}}"><i class="fa fa-paper-plane" style="color: #5578eb;"></i></button> --}}
											<div class="dropdown dropdown-inline">
												<button type="button" class="btn btn-default btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="flaticon-more"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="{{route('backend.picklist_share',$list->id)}}?q=talents"><i class="fa fa-paper-plane"></i>Email to all talents</a>
													<a class="dropdown-item" href="#"  name="sharePicklist" data-picklistid="{{$list->id}}"><i class="fa fa-paper-plane"></i> Email to agent</a>
													<a class="dropdown-item" href="#"  name="sharePicklist" data-picklistid="{{$list->id}}"><i class="fa fa-paper-plane"></i> Text to talents</a>
												</div>
											</div>
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

<div class="modal fade" id="share_picklist_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="#" method="GET" id="share_picklist_form" enctype="multipart/form-data" class="kt-form">
				@csrf
				
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Share Picklist</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-3 col-sm-3 col-xs-12">Recipient</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<select class="form-control js-example-basic-multiple" name="recipients[]" multiple>
										@foreach ($agents as $agent)
											<option value="{{$agent->email ?? ''}}">{{$agent->email ?? ''}}</option>
										@endforeach
										
									</select>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Send</button>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script> --}}
{{-- <script src="{{ asset('js/tagsinput.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">

// $("input[type=file]").change(function(){
// 	changeImageView(this);
// });

$(document).ready(function(){
	/* $(".taginput").tagsinput({
		maxTags: 5,
	}) */

	$('.js-example-basic-multiple').select2();

	/* $("[name='status']").bootstrapSwitch();

	$('[name="userRole"]').click(function(e){
		$('[name="user_id"]').val($(this).data('user'));
		
	});

	$("[name='status']").on('switchChange.bootstrapSwitch',function (e, state) {
		console.log($(this).data('userid'));
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
		
	}); */


	$('[name="sharePicklist"]').click(function(e){
		var picklist_id=$(this).data('picklistid');
		console.log(picklist_id);
		
		$('#share_picklist_form').attr('action','{{ url('/')}}'+'/backend/picklist_share/'+picklist_id);
		$('#share_picklist_modal').modal('toggle');
	});

	
});
</script>
@endsection