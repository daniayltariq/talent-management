@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend-assets/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.css" integrity="sha512-WfDqlW1EF2lMNxzzSID+Tp1TTEHeZ2DK+IHFzbbCHqLJGf2RyIjNFgQCRNuIa8tzHka19sUJYBO+qyvX8YBYEg==" crossorigin="anonymous" />
	<style>
		.bootstrap-switch-container{
			width: 160px !important;
		}

		.name-badge{
			position: relative;
    		min-width: 175px;
			font-size: 13px;
		}
		.btn-primary{
			color: #5d78ff;
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


		.new-picklist{
			display: none;
		}

		.error{
			color: red;
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
			<div class="kt-portlet__head-label" style="float: right">
				<form action="{{route('backend.user.search')}}" method="GET">
					<div class="form-group mb-0">
					<div class="input-group">
						<input type="text" class="form-control" name="search_text" placeholder="Search for...">
						<div class="input-group-append">
							<button class="btn btn-secondary" type="submit">Go!</button>
						</div>
					</div>
				</div>
				</form>
				
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
								   <th>Membership</th>
								   <th>Active</th>
								   <th>Feature</th>
								   <th>Operation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $key => $user)
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
												{{ ucfirst($role->alias ?? '') }}
												<br>
											@endforeach
										</td>
										<td>
											@if ($user->hasRole('candidate') && $user->hasActiveSubscription())
												<span>{{$user->getActivePlan()->name ?? ''}}</span>
											@else
												<em>N/A</em>
											@endif
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
											<a href="{{route('backend.user.edit',$user->id)}}" class="btn btn-primary btn-sm btn-bg-white" ><div class="kt-demo-icon__preview">Edit
											</div> </a>
											
											@if ($user->hasActiveSubscription() && $user->getActivePlan()->training_invitation==1)
												<button data-user="{{$user->id}}" name="userInvite" class="btn btn-primary btn-sm btn-bg-white" data-toggle="modal" data-target="#invite_modal">Invite</button>
											@endif
											

											<a href="{{route('backend.user.impersonate',$user->id)}}" class="btn btn-primary btn-sm btn-bg-white" ><div class="kt-demo-icon__preview">Impersonate
											</div> </a>
											
											@if ($user->hasRole('candidate'))
												<button data-target="#picklist-modal" class="profile-btn picklist-btn btn btn-primary btn-sm btn-bg-white" data-memberid="{{$user->id}}" role="button" data-toggle="modal" title="Add to picklist"><i class="fas fa-plus" ></i></button>
											@endif
											
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

			<nav class="blog__pagination">
				@if ($users->lastPage() > 1)
				 <ul class="pagination">
					 <li class="{{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
						 <a href="{{ $users->url(1) }}">First</a>
					  </li>
					 @for ($i = 1; $i <= $users->lastPage(); $i++)
						 <?php
						 $half_total_links = floor(5 / 2);
						 $from = $users->currentPage() - $half_total_links;
						 $to = $users->currentPage() + $half_total_links;
						 if ($users->currentPage() < $half_total_links) {
							$to += $half_total_links - $users->currentPage();
						 }
						 if ($users->lastPage() - $users->currentPage() < $half_total_links) {
							 $from -= $half_total_links - ($users->lastPage() - $users->currentPage()) - 1;
						 }
						 ?>
						 @if ($from < $i && $i < $to)
							 <li class="{{ ($users->currentPage() == $i) ? ' active' : '' }}">
								 <a href="{{ $users->url($i) }}">{{ $i }}</a>
							 </li>
						 @endif
					 @endfor
					 <li class="{{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
						 <a href="{{ $users->url($users->lastPage()) }}">Last</a>
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

<div id="picklist-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="picklist-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add to Picklist</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
            </div>
            @php
                $route="#";
                if (\Auth::check() && auth()->user()->hasRole('superadmin')) {
                    $route=route('backend.picklist.store');
                } 
                elseif(\Auth::check() && auth()->user()->hasRole('agent')) {
                    $route=route('agent.picklist.store');
                }
                
            @endphp
            
            <form action="{{$route}}" method="POST">
                @csrf
                <div class="modal-body">
                    <button type="button" class="btn btn-primary btn-sm btn-bg-white" id="create-picklist-btn">
                        <i class="fa fa-plus"></i> Create new
                    </button>
					<hr>
                    <input type="hidden" name="member_id" value="{{old('member_id')}}">
                    @if (count(auth()->user()->picklist) > 0 )
                        <div class="form-group" id="picklist-select">
                            <label for="exampleFormControlSelect1">Select Picklist</label>
                            <select class="form-control" name="picklist_id" required="required" id="exampleFormControlSelect1">
                                <option value="" disabled selected>Select</option>
                                @foreach (auth()->user()->picklist as $picklist)
                                    <option value="{{$picklist->id}}">{{$picklist->title}}</option>
                                @endforeach
                            </select>
                            @error('member_id')
                                <div class="error">Talent already exists</div>
                            @enderror
                        </div>
                    @endif
                    
                    <div id="new-picklist" class="new-picklist">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Title">
                            @error('title')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Description</label>
                            <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Enter Description">
                            @error('description')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                        Close
                    </button>
                    <button class="btn btn-primary btn-sm btn-bg-white" type="submit">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
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

	@if($errors->has('member_id') || $errors->has('title') || $errors->has('description') )
		$('#picklist-modal').modal('show');
	@endif
	
});
</script>

<script>
	$(document).on('click','#create-picklist-btn',function(){
		$('[name="picklist_id"]').val('');

		if ($('[name="picklist_id"]').prop('required')==true) {
			$('[name="picklist_id"]').prop('required',false);

			$('[name="title"]').prop('required',true);
			$('[name="description"]').prop('required',true);
		} else {
			$('[name="picklist_id"]').prop('required',true);
			$('[name="title"]').prop('required',false);
			$('[name="description"]').prop('required',false);
		}
		
		$('div#picklist-select').toggleClass('new-picklist');

		$('div#new-picklist').toggleClass('new-picklist');
		/* $(this).text('Add to picklist'); */
	})

	$(document).on('click','.picklist-btn',function(){
		var member=$(this).data('memberid');
		$('[name="member_id"]').val(member);
	})
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