
<div class="row mt-5">
    <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
            {{-- <span aria-hidden="true"><i class="fa fa-exclamation-triangle"></i></span> --}}
            
            <ul>
                <li>You are allowed to add <span id="allowed_pics">{{$data['plan']->videos}}</span> Videos</li>
                <li>Supported formats i.e .mp4 .mkv .avi .mov .wmv</li>
                <li>Allowed max file size of 12mb</li>
            </ul>
        </div>
    </div> 
    <div class="col-md-12 mt-5">
        <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="videoDropzone">
            @csrf
        </form> 
    </div>
    
    <div class="col-md-12 mt-5">
        <h4 class="mb-4 upload-head heading">My Videos</h4>
    </div>
    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
        <div class="row">
            <div class="sp-thumbnails d-flex">
                @forelse ($data['video'] as $vid)
                    <div class="audio__container">
                        <video width="320" height="240" controls disablepictureinpicture  controlsList="nodownload">
                            <source src="{{ asset('storage/uploads/uploadData/' . $vid->file ?? '') }}" type="video/mp4">
                        </video>
                        <a type="button" class="content-title remove-img-btn text-center remove_audio" data-type="video" data-img="{{$vid->file}}" >Remove</a>
                    </div>
                @empty
                    <h4 class="text-center">No videos found</h4>
                @endforelse
                    

            </div>
        </div>
    </div>
</div>

