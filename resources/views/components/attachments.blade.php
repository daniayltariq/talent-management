<div class="row mt-5">
    <div class="col-md-12">
        <div class="alert alert-primary d-flex" role="alert">
            {{-- <span aria-hidden="true"><i class="fa fa-exclamation-triangle"></i></span> --}}
            <ul>
                <li>You are allowed to add <span id="allowed_pics">{{$data['plan']->pictures}}</span> Images.</li>
                <li>Supported formats i.e .jpeg .jpg .png</li>
                <li>Allowed max file size of 4mb</li>
            </ul>
            
        </div>
    </div>                 
    <div class="col-md-12 mt-5">
        <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="imageDropzone">
            @csrf
        </form> 
    </div>
    
    <div class="col-md-12 mt-5">
        <h4 class="mb-4 upload-head heading">My Images</h4>
    </div>
    
    <div class="col-md-12">
        <div class="container">
            <div class="gallery">
        
                @forelse($data['images'] as $img)
                    <div class="content">
                        <div class="content-overlay"></div>
                        <img class="content-image" src="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}">
                        <div class="content-details fadeIn-bottom">
                            <a type="button" class="content-title remove-img-btn" data-img="{{$img->file}}" >Remove</a>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">No images found</h4>
                @endforelse
                
        
            </div>
        
        </div>
    </div>
</div>

{{-- <br><hr class="hr-style">

<div class="row mt-5">
    <div class="col-md-12 mt-5">
        <h4 class="mb-4 upload-head heading">Your Videos</h4>
    </div>
    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
        <div class="row">
            <div class="sp-thumbnails">
                @forelse ($data['video'] as $vid)
                    <video width="320" height="240" controls>
                        <source src="{{ asset('storage/uploads/uploadData/' . $vid->file ?? '') }}" type="video/mp4">
                    </video>
                @empty
                    <h4 class="text-center">No videos found</h4>
                @endforelse
                    

            </div>
        </div>
    </div>
</div>

<br><hr class="hr-style">

<div class="row mt-5">
    <div class="col-md-12 mt-5">
        <h4 class="mb-4 upload-head heading">Your Audios</h4>
    </div>
    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0">
        <div class="row">
            <div class="sp-thumbnails">
                @forelse ($data['audio'] as $audio)
                    <audio controls>
                        <source src="{{ asset('storage/uploads/uploadData/' . $audio->file ?? '') }}" type="audio/mpeg">
                    </audio>
                @empty
                    <h4 class="text-center">No audio found</h4>
                @endforelse
                    

            </div>
        </div>
    </div>
</div> --}}