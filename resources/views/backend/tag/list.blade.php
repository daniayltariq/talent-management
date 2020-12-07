@extends('backend.layouts.app')

@section('styles')
	<style>
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
					Roles list
				</h3>
				
			</div>
			<div class="kt-portlet__head-label" style="float: right">
				<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#tag_modal"><i class='fa fa-plus'></i> New Tag</button>
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
								   <th>Title</th>
								   <th>Slug</th>
								   <th>Operation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tags as $key => $tag)
									<tr>
										<td>{{++$key}}</td>
										<td>{{ $tag->title ?? '' }}</td>
										<td>{{ $tag->slug ?? '' }}</td>
										<td>
											<button class="btn btn-info btn-sm btn-bg-white" id="editTag" data-tag="{{$tag}}"><i class="fa fa-pencil-alt" style="color: #5578eb;"></i></button>
											@include('components.delete' , ['data' => $tag->id, 'route' => 'backend.tag.destroy'])
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
<div class="modal fade" id="tag_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="{{ route('backend.tag.store') }}" method="POST" id="tag-form" enctype="multipart/form-data" class="kt-form">
				@csrf
				<input type="hidden" name="user_id" >
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New Tag</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-3 col-sm-3 col-xs-12">Title</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input type="text" class="form-control" name="title" value="{{old('title')}}"/>
									@error('title')
										<div class="error">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-3 col-sm-3 col-xs-12">Slug</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input type="text" class="form-control" name="slug" value="{{old('slug')}}"/>
									@error('slug')
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
<script type="text/javascript">

// $("input[type=file]").change(function(){
// 	changeImageView(this);
// });
@if (count($errors) > 0)
	$('#tag_modal').modal('show');
@elseif(session()->has('upload_success'))
	toastr.success('{{ session('status') }}')
@endif

$(document).ready(function(){
	$('#editTag').click(function(e){
		var tag=$(this).data('tag');
		console.log(tag);
		$('[name="title"]').val(tag.title);
		$('[name="slug"]').val(tag.slug);
		
		$('#tag-form').attr('action','{{ url('/')}}'+'/backend/tag/'+tag.id);
		$('#tag-form').append('@method('PATCH')');
		$('#tag_modal').modal('toggle');
	});
});
</script>
@endsection