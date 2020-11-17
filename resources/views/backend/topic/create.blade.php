@extends('backend.layouts.app')
{{-- {{ dd($contents) }} --}}
@section('styles')
<!--Third party Styles(used by this page)--> 
<link href="{{asset('backend-assets/assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('backend-assets/assets/css/tagsinput.css') }}">
<style>
   .form-group label {
   font-size: 1.2rem;
   }

   .bootstrap-tagsinput{
        color: #495057 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #e2e5ec !important;
        border-radius: 4px !important;
	}

    .bootstrap-tagsinput input{
        width: 100% !important;
    }
	
   .bootstrap-tagsinput .badge{
		margin: 2px 2px;
		background-color: #5969ff;
		border-radius: 4px;
	}
</style>
@endsection
@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   <div class="row">
      <div class="col-md-12">
         <!--begin::Portlet-->
         <div class="kt-portlet">
            <div class="kt-portlet__head">
               <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                     Create Topic
                  </h3>
               </div>
            </div>
            <!--begin::Form-->
            @php 
            $route = route('backend.topic.store');
            if(isset($blog)){
            $route = route('backend.topic.update',$blog->id);
            }
            @endphp
            <form action="{{$route}}" method="POST" id="blog-content-form" enctype="multipart/form-data" class="kt-form">
               @csrf
               @if(isset($blog))
               {{ method_field('PATCH') }}
               @endif
               <input type="hidden" name="page" value="blog">
               <div class="kt-portlet__body">
                  <div class="row">
                     <div class="col-md-9 col-sm-12 col-xs-12">
                        <br />
                        <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Add Title</label>
                           <div class="col-md-11 col-sm-11 col-xs-12">
                              <input type="text" class="form-control" name="title" value="{{isset($blog)?$blog->title : ''}}"/> 
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Add Slug</label>
                           <div class="col-md-11 col-sm-11 col-xs-12">
                              <input type="text" class="form-control" name="slug" value="{{isset($blog)?$blog->slug : ''}}"/> 
                           </div>
                        </div>
                     
                        {{-- <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Add Video Link</label>
                           <div class="col-md-11 col-sm-11 col-xs-12">
                              <input type="url" class="form-control">
                           </div>
                        </div> --}}
                        <div class="form-group">
                           <div class="col-md-11 col-sm-11 col-xs-12">
							         <textarea name="content" id="summernote" class="summernote">{!!isset($blog)?html_entity_decode($blog->content) : ''!!}</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-12 col-xs-12">
                        
                     <div class="form-group">
                        <select name="topic_category_id" id="" class="form-control">
                           @foreach($categories as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                           @endforeach
                           
                        </select>
                     </div>
						{{-- <div class="form-group">
							<h3 class="col-md-12 col-sm-3 col-xs-12">Seo Tags</h3>
							<div class="col-md-12 col-sm-12 col-xs-12">
								@php
								$tags="";
								if (isset($blog)) {
								$tags=$blog->tags->pluck('tag')->toArray();
								$tags=implode(",",$tags);
								}
								@endphp
								<input type="text" name="blog_tags" class="taginput form-control" value="{{isset($blog)? $tags : ''}}" />
								<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
							</div>
						</div>
                         --}}
						<div class="form-group">
							<h3 class="col-md-12 col-sm-12 col-xs-12">Image</h3>
							<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
								<div class="row">
									<div class="col-xs-12 col-md-12">
										<a href="#" class="thumbnail">
										<img width="250" src="{{ asset(isset($blog) && $blog->image ? $blog->image : 'backend-assets/images/rec2.jpg') }}" id="cat_image" alt="...">
										</a>
									</div>
								</div>
								<input type="file" onchange="changeImageView(this, 'cat_image',250000)" name="image" class="form-control">
								<sm><code>Image size should be 720 x 660 Pixels</code></sm>
							</div>
							<br>
						</div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                           <div class="col-md-12 col-sm-9 col-xs-12">
                              <button type="submit" style="background-color: #5867dd;" class="btn btn-primary btn-xs" role="button" style="font-size:13px" ><b>Save</b></button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->			
         </div>
         <!--end::Portlet-->
      </div>
   </div>
</div>
@endsection
@section('scripts')
<!-- Third Party Scripts(used by this page)-->
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!--Page Active Scripts(used by this page)-->
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote.active.js')}}"></script>
<script src="{{ asset('backend-assets/assets/js/tagsinput.js') }}"></script>

<script type="text/javascript">
   
   $(document).ready(function(){
      @if (session('status'))
         toastr.success('{{session('status')}}', "Success");
      @endif
   })

   $(document).ready(function(){
		window.sidebar_search=function() {
			var input, filter, div, childdiv, label, i, txtValue;
			input = document.getElementById("admin_sidebar_search");
			filter = input.value.toUpperCase();
			div = document.getElementById("admin_sidebar");
			childdiv = div.getElementsByTagName("div");
			//console.log(childdiv);
			for (i = 0; i < childdiv.length; i++) {
				label = childdiv[i].getElementsByTagName("label");
				//console.log(a);
				if(label.length !=0)
				{
					label = childdiv[i].getElementsByTagName("label")[0]
					//console.log(label);
					txtValue = label.textContent || label.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						childdiv[i].style.display = "";
					} else {
						childdiv[i].style.display = "none";
					}
				}
			}
		}

		$(".taginput").tagsinput({
			maxTags: 5,
		})
		
	})
   
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
   
</script>
@endsection