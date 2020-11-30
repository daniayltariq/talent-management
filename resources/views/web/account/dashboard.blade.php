@extends('web.layouts.app')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">
<style type="text/css">
    *{
        font-size: 16px;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: #e77929;
    }
    tr td {
        padding-bottom: 10px;
    }
    header.header-section {
        box-shadow: 0px 1px 25px #e77929;
    }

    .error{
        color: red;
    }

    .refer_code_div{
		display: none;
	}

    .fz-15{
        font-size: 15px;
    }

    .dropzone{
        border: 3px dashed #ebedf2;
        border-color: #0abb87;
        border-radius: 4px;
    }

    .dz-message{
        color: #595d6e;
        padding: 0;
        font-weight: 500;
        font-size: 1.7rem;
    }

    .upload-head{
        width: 100%;
        border-left: 4px solid #e97121;
        border-top: 1px solid #ECECEC;
        border-right: 1px solid #ECECEC;
        border-bottom: 1px solid #ECECEC;
        padding: 12px 7px;
    }

    
    .heading {
        font-family: "Montserrat", Arial, sans-serif;
        font-size: 2.5rem;
        font-weight: 600;
        line-height: 0.5;
        text-align: center;
        padding: 3.5rem 0;
        color: #585858;
    }

    .heading span {
        display: block;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        /* Compensate for excess margin on outer gallery flex items */
        margin: -1rem -1rem;
    }

    /*

    The following rule will only run if your browser supports CSS grid.

    Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling. 

    */

    @supports (display: grid) {
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(16rem, 1fr));
            grid-gap: 1rem;
        }

        .gallery,
        .gallery-item {
            margin: 0;
        }
    }

    .hr-style{
        border: none;
        height: 3px;
        background: #d2d2d2;
        margin-bottom: 50px;
    }

    .content {
    position: relative;
    max-width: 400px;
    margin: auto;
    overflow: hidden;
    }

    .content .content-overlay {
    background: rgba(0,0,0,0.7);
    position: absolute;
    height: 99%;
    width: 100%;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    opacity: 0;
    -webkit-transition: all 0.4s ease-in-out 0s;
    -moz-transition: all 0.4s ease-in-out 0s;
    transition: all 0.4s ease-in-out 0s;
    }

    .content:hover .content-overlay{
    opacity: 1;
    }

    .content-details {
    position: absolute;
    text-align: center;
    padding-left: 1em;
    padding-right: 1em;
    width: 100%;
    top: 50%;
    left: 50%;
    opacity: 0;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details{
    top: 50%;
    left: 50%;
    opacity: 1;
    }

    .content-details a{
    color: #f34444;
    font-weight: 600;
    margin-bottom: 0.5em;
    text-transform: uppercase;
    }

    .content-details a:hover{
        text-decoration: none;
    }

    .fadeIn-bottom{
    top: 80%;
    }

    .m-menu__list-item a:hover{
        text-decoration: none;
        color: #fff;
    }

    a,a:hover{
        color: #e77929;
        text-decoration: none;
        background-color: transparent;
    }
</style>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title__wrapp">
                    {{-- <div class="page__subtitle title__grey">Profile</div> --}}
                    <h1 class="page__title">My Account</h1>
                    <p class="font-italic mb-1 fz-15">You can update your personal details, download reports and download invoice details here.</p>
                </div>
            </div>
            
        </div>
    </div>
</section><!-- Slider Section End -->
    <section class="section apply">
        {{-- <section class="page-top-section set-bg" data-setbg="{{ url('/') }}/images/bg1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Survey Form</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. </p>
                        <a href="" class="site-btn">Survey</a>
                    </div>
                </div>
            </div>
        </section> --}}
        <div class="container py-4">
            <div class="row fz-15">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Personal information</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-user mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Profile</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Invoices</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-refer-tab" data-toggle="pill" href="#v-refer" role="tab" aria-controls="v-refer" aria-selected="false">
                            <i class="fa fa-users mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Refer a Friend </span></a>
                        </div>
                </div>
                <div class="col-md-9">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white show active in p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <form action="{{route('account.dashboard.profile')}}" method="POST">
                                @csrf
                                <h4 class="font-italic mb-4">Personal information</h4>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <label for="f_name" class="form-label mt-3">First Name</label>
                                        <input class="form-control" type="text" name="f_name" id="f_name" value="{{auth()->user()->f_name ?? ''}}" />
                                        @error('f_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="l_name" class="form-label mt-3">Last Name</label>
                                        <input class="form-control" type="text" name="l_name" id="l_name" value="{{auth()->user()->l_name ?? ''}}" />
                                        @error('l_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="phone" class="form-label mt-3">Phone</label>
                                        <input class="form-control" type="text" name="phone" id="phone" value="{{auth()->user()->phone ?? ''}}" />
                                        @error('phone')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="form-label mt-3">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" value="{{auth()->user()->email ?? ''}}" />
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            
                            <div class="row mt-5">
                                
                                <div class="col-md-12 mt-5">
                                    <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="imageDropzone">
                                        @csrf
                                    </form> 
                                </div>
                                
                                <div class="col-md-12 mt-5">
                                    <h4 class="mb-4 upload-head heading">Your Images</h4>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="gallery">
                                    
                                            @forelse($data['images'] as $img)
                                                <div class="content">
                                                    <div class="content-overlay"></div>
                                                    <img class="content-image" src="{{ asset('storage/uploads/uploadData/' . $img->file ?? '') }}">
                                                    <div class="content-details fadeIn-bottom">
                                                        <a type="button" class="content-title" data-img="{{$img->file}}" id="remove-img-btn">Remove</a>
                                                    </div>
                                                </div>
                                            @empty
                                                <h4 class="text-center">No images found</h4>
                                            @endforelse
                                            
                                    
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

                            <br><hr class="hr-style">

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
                            </div>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <h4 class="font-italic mb-4">Invoices</h4>
                            <table class="w-100">
                                <thead>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>12-10-2020</td>
                                        <td><a href="#"><i class="fa fa-download mr-2"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>05-10-2019</td>
                                        <td><a href="#"><i class="fa fa-download mr-2"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>12-10-2018</td>
                                        <td><a href="#"><i class="fa fa-download mr-2"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-refer" role="tabpanel" aria-labelledby="v-refer-tab">
                            <div class="row">
                                <div class="col-6">
                                    @if (auth()->user()->referal_code()->exists())
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="refer_link" value="{{url('/').'/register/?referal='.auth()->user()->referal_code->refer_code}}" placeholder="Refer url" aria-label="Refer url" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                            <button class="btn btn-outline-secondary copy-btn" onclick="copyToClipboard()" type="button">Copy</button>
                                            </div>
                                        </div>
                                    @else
                                        <button class="btn btn-primary" id="refer-btn">Generate Referal link</button>
                                        <div class="refer_code_div">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="refer_link" name="refer_link" placeholder="Refer url" aria-label="Refer url" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                <button class="btn btn-outline-secondary copy-btn" onclick="copyToClipboard()" type="button">Copy</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    {{-- <div class="">
                                        <label for="username" class="form-label mt-3">New Password</label>
                                        <input class="form-control" type="password" name="username" id="username" value="Zach M" />
                                    </div>
                                    <div class="">
                                        <label for="username" class="form-label mt-3">Confirm Password</label>
                                        <input class="form-control" type="password" name="username" id="username" value="Zach M" />
                                    </div>
                                    <button class="btn btn-primary mt-4">Update password</button> --}}
                                </div>
                                {{-- <div class="col-6">
                                    <h5 class="font-italic mb-4">Logout from account</h5>
                                    <button class="btn btn-primary"><i class="fa fa-user mr-2"></i> Logout</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
<script>
    function copyToClipboard() {
        /* Get the text field */
        var copyText = document.getElementById("refer_link");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        $('.copy-btn').html('Copied');
        setTimeout(function() { 
          $('.copy-btn').text("copy"); 
       }, 1000);
    }

    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click','#refer-btn',function(e){
		
		@if(\Auth::guest())
			window.location.replace("{{route('login')}}");
		@else
			$.ajax({
				url: "{{ route('account.generate_referal') }}",
				
				type: 'get',
				success: function(res) {
					console.log(res);
					$('[name="refer_link"]').val(res);
					$('.refer_code_div').show();
					/* if (res.alert_type) {
						toastr.success(res.message);
					} else {
						toastr.error(res.message);
					} */
				},
				error: function(error) {
				}
			});
		@endif

		
	});
</script>

{{------------------------------------}}
{{-------------- Dropzone ------------}}
<script type="text/javascript">
    var uploadedDocumentMap = {};
    Dropzone.autoDiscover = false;
    var myDropzoneTheFirst = new Dropzone(
        //id of drop zone element 1
        '#imageDropzone',{
            url: '{{ route('account.storeMedia') }}',
            maxFilesize: 12, // MB
            acceptedFiles: "image/*,.mp4,.mkv,.mov,.wmv,audio/*",
            dictDefaultMessage:"Drop Your Files here.",
            /* autoProcessQueue: false, */
            accept: function(file, done) {
                console.log("uploaded");
                done();
            },

            renameFile: function(file) {
                let newName = new Date().getTime() + '_' + file.name;
                return newName;
            },
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            sending: function(file, xhr, formData){
                const  fileType = file.type;
                /* console.log(fileType); */
                const validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
                const validVideoTypes = ['video/mp4', 'video/mkv', 'video/mov', 'video/wmv'];
                const validAudioTypes = ['audio/mp3', 'audio/mpeg', 'audio/wav'];
                
                if (validImageTypes.includes(fileType)) {
                    formData.append('type', 'image');
                }
                else if (validVideoTypes.includes(fileType)) {
                    formData.append('type', 'video');
                }
                else if (validAudioTypes.includes(fileType)) {
                    formData.append('type', 'audio');
                }
            },
            success: function (file, response) {
               console.log(file);
                if (response.name !==null) {
                    $('#imageDropzone').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.upload.filename] = response.name
                    toastr.success('file uploaded');
                }
                else{
                    toastr.error('something went wrong');
                }
                console.log(uploadedDocumentMap);
                
            },
            removedfile: function (file) {
                file.previewElement.remove()
                $.ajax({
                    type: 'delete',
                    url: '{{ route('account.fileDestroy') }}',
                    data: {
                        filename: uploadedDocumentMap[file.upload.filename],
                        _method: 'DELETE',
                    },
                    success: function (data){
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.upload.filename]
                        }
                        $('#imageDropzone').find('input[name="document[]"][value="' + name + '"]').remove()
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });

                
            },
            init: function (file) {
                /* var myDropzone = this;
                const validAudioTypes = ['audio/mp3', 'audio/mpeg', 'audio/wav'];
                this.on('addedfile', function(file) {
                    if ( validAudioTypes.includes(file.type)) {
                        sendAudio(file);
                    }
                    else{
                        myDropzone.processQueue();
                    }
                }); */

            }
        }
    );

    $(document).on('click','#remove-img-btn',function(e){
		
        $.ajax({
            type: 'delete',
            url: '{{ route('account.fileDestroy') }}',
            data: {
                filename: $(this).data('img'),
                _method: 'DELETE',
            },
            success: function(res) {
                console.log(res);
                toastr.success('file uploaded');
                window.location.reload();
            },
            error: function(error) {
                toastr.error('something went wrong!');
            }
        });

		
	});

    function sendAudio(file)
    {
        console.log(file);
        var audiofile=new FormData($('#imageDropzone')[0]);
        audiofile.append('audio',file);
        $.ajax({
            url: '{{ route('account.storeMedia') }}',
            contentType: false,
            processData: false,
            
            type: 'POST',
            data: audiofile,
            success: function(res) {
                console.log(res);
                toastr.success('file uploaded');
            },
            error: function(error) {
                toastr.error('something went wrong!');
            }
        });
    }
</script>

@endsection