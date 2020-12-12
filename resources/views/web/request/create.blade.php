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
</style>

<link href="{{asset('backend-assets/assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
@endsection
@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                <h1 class="page__title">Submit your Request</h1>
            </div>
        </div>
    </div>
</section>

<section class="section apply">                    
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ">

                   @php 
                  $route = route('user_request.store');
                  @endphp

                    <form class="apply-form form-horizontal" method="POST" action="{{ $route }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-block p-5">

                            <div class="form-group">
                             
                                    <label for="name" class="control-label">Subject<span class="req">*</span></label>
                                    <input id="subject" type="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" value="" required autocomplete="subject" autofocus>

                                   @error('subject')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                
                            </div>
                            <div class="form-group">
                                    <label for="name" class="control-label">Message<span class="req">*</span></label>
                                    @error('message')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                    <textarea name="message" id="summernote" class="summernote"></textarea>
                                    
                              </div>
                          
                        
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-default btn__red animation btn-half pull-right">Send</button>
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
   
</script>

@endsection