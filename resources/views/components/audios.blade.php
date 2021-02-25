
<div class="row mt-5">
    <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
            <span aria-hidden="true"><i class="fa fa-exclamation-triangle"></i></span>
            You are allowed to add <span id="allowed_pics">{{$data['plan']->audios}}</span> Audios
            <ul>
                <li>You are allowed to add <span id="allowed_pics">{{$data['plan']->audios}}</span> Audios</li>
                <li>Supported formats i.e .mp3 .wma .wav</li>
                <li>Allowed max file size of 12mb</li>
            </ul>
        </div>
    </div> 
    <div class="col-md-12 mt-5">
        <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="audioDropzone">
            @csrf
        </form> 
    </div>
    
    <div class="col-md-12 mt-5">
        <h4 class="mb-4 upload-head heading">My Audios</h4>
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
</div>