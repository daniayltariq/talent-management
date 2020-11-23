@extends('web.layouts.app')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style type="text/css">
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: #17172D;
    }
    tr td {
        padding-bottom: 10px;
    }
    header.header-section {
        box-shadow: 0px 1px 25px #2e2e2e1a;
    }

    .error{
        color: red;
    }

    .refer_code_div{
		display: none;
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
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Profile</div> --}}
                <h1 class="page__title">My Account</h1>
                <p class="font-italic mb-1">You can update your personal details, download reports and download invoice details here.</p>
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
            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Personal information</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-calendar-minus-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">My report</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Invoices</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-refer-tab" data-toggle="pill" href="#v-refer" role="tab" aria-controls="v-refer" aria-selected="false">
                            <i class="fa fa-user mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Refer a Friend </span></a>
                        </div>
                </div>
                <div class="col-md-9">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
                            <h4 class="font-italic mb-4">My report</h4>
                            <div class="row mt-5 text-center">
                                <div class="col-6">
                                    <h5 class="mb-3">Remote Assesment Report</h5>
                                    <button class="site-btn sb-dark"><i class="fa fa-download mr-2"></i> Download</button>
                                </div>
                                <div class="col-6 border-left">
                                    <h5 class="mb-3">Mitigation Plan Report</h5>
                                    {{-- <button class="site-btn sb-dark"><i class="fa fa-download mr-2"></i> Download</button> --}}
                                    <button class="site-btn sb-dark"><i class="fa fa-arrow-up mr-2"></i> Upgrade</button>
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
@endsection