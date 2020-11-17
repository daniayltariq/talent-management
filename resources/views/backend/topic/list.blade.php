@extends('backend.layouts.app')

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Blog list
				</h3>
				
			</div>
			<div class="kt-portlet__head-label" style="float: right">
				<a href="{{ route('backend.topic.create') }}" style="background-color: #0abb87;" class="btn btn-success btn-xs"><i class='fa fa-plus'></i> New Blog</a>
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
								   <th>blog Title</th>
								   <th>blog Image</th>
								   <th>Categories</th>
								   <th>Details</th>
								   <th>Operation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($blog as $topic)
									<tr>
										<td>{{ $topic->title ?? '' }}</td>
										<td><img class="kt-media" style="max-width: 100px;height: 40px;" src="{{asset($topic->image ?? '')}}" alt=""></td>
										<td>
											 {{ $topic->category ? $topic->category->title : '' }}
												 
										</td>
										<td>{{ $topic->short_desc ?? '' }}</td>
										<td>
											<a href="{{route('backend.topic.edit',$topic->id)}}" class="btn btn-primary btn-sm btn-bg-white" style="color: #5d78ff;" ><div class="kt-demo-icon__preview">
												<i style="color: #5d78ff;" class="fa fa-pencil-alt"></i>
											</div> </a>
											{{-- <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-view btn-xs" style=" color:white" ><i class="fa fa-folder" ></i> View </a>
											<a href="{{ route('blog.updateStatus', $blog->id) }}" class="btn btn-pause btn-xs" style=" color:white" ><i class="fa fa-pause" ></i> Pause</a> --}}
											{{-- <a  href="#" class="btn btn-duplicate btn-xs" style=" color:white" ><i class="fa fa-copy" ></i> Duplicate</a> --}}
											{{-- <a  href="#" class="btn btn-pause btn-xs" style=" color:white" ><i class="fa fa-archive" ></i> Achive </a> --}}
											{{-- @include('components.delete' , ['data' => $blog->id, 'route' => 'superadmin.blog.destroy']) --}}
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
<script type="text/javascript">

// $("input[type=file]").change(function(){
// 	changeImageView(this);
// });

function formSubmitWithTextEditor(editorId,fieldToCopyIn,formId)
{
	console.log($('#'+editorId).html() );
	if ($('#'+editorId).html() !=='') {
		$('[name='+fieldToCopyIn+']').val($('#'+editorId).html());
		$('#'+formId).submit();
	} else {
		$('#'+formId).submit();
	}
}

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

function updateContent(content,formId)
	{
		//console.log(typeof(content.value));

		Object.keys(content.value).forEach(function(key) {
			console.log(key,': ', content.value[key]);

			if (key.includes('_image') || key.includes('_input')) {
				var img='{{URL::asset('')}}'+content.value[key];
				var elem =$('[name='+key+']').data('relatedimg');
				$('#'+elem).attr('src',img);

				$('[name='+key+'clone]').val(content.value[key]);
			}

			else{
				$('[name='+key+']').val(content.value[key]);
			}
		});

		$('#'+formId).attr('action','{{ url('/')}}'+'/content/'+content.id);
		$('#'+formId).append('@method('PATCH')');

	}

$(document).ready(function(){
	$('form a.btn-info').click(function(e){
		$(this).closest('form').find('.form-control').each(function(i){
			$(this).val('')
		})
		$(this).closest('form').find('img').each(function(i){
			$(this).attr('src','https://croply.croplytech.com/public/admin/images/rec2.jpg');
		})
		
	});
});
</script>
@endsection