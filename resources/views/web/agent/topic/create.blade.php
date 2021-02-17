@extends('web.layouts.app')


@section('styles')
<style type="text/css">
.btn-half {
    width: 50%;
    float: unset !important;
    margin: auto;
    margin-top: 15px !important;
    padding: 15px 30px;
}

.note-toolbar .btn{
   padding:10px 10px ; 
}

.invalid-feedback{
    color: red;
}

.z-0{
    z-index: 0;
}

.modal-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
}
</style>

<link href="{{asset('backend-assets/assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
@endsection
@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Post</div> --}}
                <h1 class="page__title">Create a Topic</h1>
            </div>
        </div>
    </div>
</section>

<section class="section apply">                    
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">Topic Form</h3>
                <div class="col-lg-12 col-md-12 ">

                  @php 
                    $route = route('agent.topic.store');
                  if(isset($blog)){
                    $route = route('agent.topic.update',$blog->id);
                  }
                  @endphp

                  <form class="apply-form form-horizontal" method="POST" action="{{ $route }}" enctype="multipart/form-data">
                  @csrf 
                  @if(isset($blog))
                  {{ method_field('PATCH') }}
                  @endif
                        <div class="form-block p-5">
                            <div class="form-group">
                             
                              <label for="name" class="control-label">Category<span class="req">*</span></label>
                              <input id="topic_category_id" readonly="" type="topic_category_id" class="form-control @error('topic_category_id') is-invalid @enderror readonly_normal" name="topic_category_id" value="Jobs & Castings" required autocomplete="topic_category_id" autofocus>

                             @error('topic_category_id')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                                
                            </div>

                            <div class="form-group">
                             
                              <label for="name" class="control-label">Title<span class="req">*</span></label>
                              <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $blog->title ?? '' }}" required autocomplete="title" autofocus>

                             @error('title')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                                
                            </div>

                            <div class="form-group">
                             
                                 <label for="name" class="control-label">URL<span class="req">*</span></label>
                                 <input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') ?? $blog->slug ?? ''}}" required autocomplete="slug" autofocus>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>

                            {{-- <div class="form-group">
                            <label for="">Image</label>
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
                           </div> --}}

                            <div class="form-group">
                                    <label for="name" class="control-label">Content<span class="req">*</span></label>
                                    @error('content')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                    <textarea name="content" id="summernote" class="summernote">{!! old('content') ?? html_entity_decode($blog->content ?? '') ?? ''!!}</textarea>
                                    
                              </div>
                          
                        
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-default btn__red animation btn-half pull-right z-0">{{ isset($blog) ? 'Update' : 'Create' }}</button>
                                </div>
                            </div>
                      
                         
                        </div>
                        
                        
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

<script src="{{asset('backend-assets/assets/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!--Page Active Scripts(used by this page)-->
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote.active.js')}}"></script>

<script>

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