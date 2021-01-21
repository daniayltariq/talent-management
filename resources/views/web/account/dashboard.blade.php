@extends('web.layouts.app')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" />

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
    max-width: 130px;
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

    .btn-primary,.btn-primary:hover{
        background-color: #e77929;
        border-color: #e77929;
    }

    .p-8{
        padding: 8px;
        font-weight: 700;
    }

    .form-control{
        font-size: 1.4rem;
    }

    footer >.container >.row{
        display: block;
    }

    .copy-btn{
        background-color: #e77929;
        border-color: #e77929;
        color: #fff;
    }

    .btn-primary:not(:disabled):not(.disabled):active,.btn-primary:not(:disabled):not(.disabled):focus{
        color: #fff;
        background-color: #e77929 !important;
        border-color: #e77929 !important;
        box-shadow: 0 0 0 0.2rem rgba(253, 166, 84, 0.5);
    }

    .toast-success{
        background-color: #51A351;
    }

    .toast-error{
        background-color: #BD362F;
    }

    .toast-warning{
        background-color: #F89406;
    }

    .mt-4r{
        margin-top:4rem; 
    }

    .invalid-feedback{
        display: block;
        color: red;
    }

    .valid-feedback{
        display: block;
        color: rgb(45, 171, 11);
    }

    .iti{
        width: 100%;
    }

    .single-talent {
        box-shadow: 0px 6px 12px #61616154 !important;
    }

    .profile-sec {
        height: 150px;
        width: 150px;
        /* border-radius: 50%; */
        padding: 7px;
        background: none !important;
    }

    .profile-sec img {
        border-radius: 0;
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
                    <h1 class="page__title">My Account</h1>
                    {{-- <p class="font-italic mb-1 fz-15">You can update your personal details, download reports and download invoice details here.</p> --}}
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
            @if (auth()->user()->status==0)
               <div class="alert alert-primary" role="alert">
                    <span aria-hidden="true"><i class="fa fa-exclamation-triangle"></i></span>
                    Your account has been deactivated,all features are locked,in order to unlock please make a <a href="{{route('user_request.create')}}" class="alert-link">request</a> to re-activate.
                </div> 
            @endif
            
            <br>
            <div class="row fz-15">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-list-alt mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Personal information</span></a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-user mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">My Images</span></a>
                        @if ($data['plan'] && $data['plan']->social_links==1)
                        <a class="nav-link mb-3 p-3 shadow" id="v-social-tab" data-toggle="pill" href="#v-social" role="tab" aria-controls="v-social" aria-selected="false">
                            <i class="fa fa-icons mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">My Social Media Links</span></a>
                        @endif
                        <a class="nav-link mb-3 p-3 shadow" id="v-resume-tab" data-toggle="pill" href="#v-resume" role="tab" aria-controls="v-resume" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">My Resume</span></a>
                        <a class="nav-link mb-3 p-3 shadow" href="{{ route('account.talent.profile') }}" {{-- id="v-resume-wizard-tab" data-toggle="pill" href="#v-resume-wizard" role="tab" aria-controls="v-resume-wizard" aria-selected="false" --}}>
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Resume Wizard</span></a>
                        {{-- <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Invoices</span></a> --}}
                        <a class="nav-link mb-3 p-3 shadow" id="v-refer-tab" data-toggle="pill" href="#v-refer" role="tab" aria-controls="v-refer" aria-selected="false">
                            <i class="fa fa-users mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Refer a Friend </span></a>
                        
                        </div>
                </div>
                <div class="col-md-9">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white show active in p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <form action="{{route('account.dashboard.profile')}}" id="personal-info-form" method="POST">
                                @csrf
                                <div class="row">
                                    <h4 class="font-italic mb-4" style="flex: auto;">Personal information</h4>
                                   {{--  <a href="{{route('account.talent.profile')}}" class="btn btn-primary p-8">My Resume</a> --}}
                                </div>
                                
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <label for="f_name" class="form-label mt-3">First Name</label>
                                        <input class="form-control" type="text" name="f_name" id="f_name" placeholder="FIRST NAME" value="{{auth()->user()->f_name ?? ''}}" />
                                        @error('f_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="l_name" class="form-label mt-3">Last Name</label>
                                        <input class="form-control" type="text" name="l_name" id="l_name" placeholder="LAST NAME" value="{{auth()->user()->l_name ?? ''}}" />
                                        @error('l_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="gender" class="form-label mt-3">Gender</label>
                                        <select name="gender" id="gender" name = "gender" class="form-control" required>
                                            <option label="Select"></option>
                                            <option value="female" {{ auth()->user()->gender=='female' ?'selected':''}}>Female</option>
                                            <option value="male" {{ auth()->user()->gender=='male' ?'selected':''}}>Male</option>
                                        </select>
                                        @error('gender')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="dob" class="form-label mt-3">DOB</label>
                                        <input class="form-control" type="date" name="dob" id="dob" placeholder="DATE OF BIRTH" value="{{auth()->user()->dob ?? ''}}" />
                                        @error('dob')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6" id="phone-div">
                                        <label for="phone" class="form-label mt-3">Phone</label>
                                        <input class="form-control" type="tel" name="phone" id="phone" value="{{auth()->user()->phone ?? ''}}" />
                                        <input type="tel" class="hide" name="new_phone" id="hiden" value="{{auth()->user()->phone_c_data ?? ''}}">
                                        <span id="valid-msg" class="valid-feedback hide">✓ Valid</span>
                                        <span id="error-msg" class="invalid-feedback hide"></span>

                                        @error('phone')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="form-label mt-3">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="EMAIL" value="{{auth()->user()->email ?? ''}}" />
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="country" class="form-label mt-3">Country</label>
                                        <input class="form-control" type="text" name="country" id="country" placeholder="COUNTRY" value="{{auth()->user()->country ?? ''}}" />
                                        @error('country')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="city" class="form-label mt-3">City</label>
                                        <input class="form-control" type="text" name="city" id="city" placeholder="CITY" value="{{auth()->user()->city ?? ''}}" />
                                        @error('city')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="state" class="form-label mt-3">State</label>
                                        <input class="form-control" type="text" name="state" id="state" placeholder="STATE" value="{{auth()->user()->state ?? ''}}" />
                                        @error('state')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-6">
                                        <label for="h_adress_1" class="form-label mt-3">Address 1</label>
                                        <input class="form-control" type="h_adress_1" name="h_adress_1" id="h_adress_1" placeholder="HOME ADDRESS 1" value="{{auth()->user()->h_adress_1 ?? ''}}" />
                                        @error('h_adress_1')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="h_adress_2" class="form-label mt-3">Address 2</label>
                                        <input class="form-control" type="text" name="h_adress_2" id="h_adress_2" placeholder="HOME ADDRESS 2" value="{{auth()->user()->h_adress_2 ?? ''}}" />
                                        @error('h_adress_2')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="col-6">
                                        <label for="zipcode" class="form-label mt-3">Zipcode</label>
                                        <input class="form-control" type="zipcode" name="zipcode" id="zipcode" placeholder="ZIPCODE" value="{{auth()->user()->zipcode ?? ''}}" />
                                        @error('zipcode')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label>Update Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""> 
                                        @error('password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" >
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" id="personalInfoFormBtn">Update</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            
                            <div id="render_attachments">
                                @include('components.attachments',['data'=>$data])
                                
                            </div>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-resume" role="tabpanel" aria-labelledby="v-resume-tab">
                            @include('components.resume',['profile'=>$data['profile']])
                           
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-resume-wizard" role="tabpanel" aria-labelledby="v-resume-wizard-tab">
                            Loading...
                        </div>
                        {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
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
                        </div> --}}
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-refer" role="tabpanel" aria-labelledby="v-refer-tab">
                            <div class="row">
                                <div class="col-6">
                                    @if (auth()->user()->referal_code()->exists())
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="refer_link" value="{{url('/').'/signup/?referal='.auth()->user()->referal_code->refer_code}}" placeholder="Refer url" aria-label="Refer url" aria-describedby="basic-addon2">
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
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-social" role="tabpanel" aria-labelledby="v-social-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="repeater" action="{{route('account.dashboard.social_links')}}" method="POST">
                                        <!--
                                            The value given to the data-repeater-list attribute will be used as the
                                            base of rewritten name attributes.  In this example, the first
                                            data-repeater-item's name attribute would become group-a[0][text-input],
                                            and the second data-repeater-item would become group-a[1][text-input]
                                        -->
                                        @csrf
                                        <div data-repeater-list="social">
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input class="form-control" type="text" name="source" id="source" placeholder="Title" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input class="form-control" type="text" name="link" id="link" placeholder="Link" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                    </div>
                                                    
                                                </div><br>
                                                
                                            </div>
                                        </div>
                                        @if($data['plan'] && ($data['plan']->social_links==1 && $data['plan']->social_limit !== count($data["social"])) )
                                            <input data-repeater-create type="button" class="btn btn-primary" id="repeater-add-btn" value="Add"/>
                                            <hr>
                                            <button type="submit" class="btn btn-secondary">Save</button>
                                        @else
                                            <div class="alert alert-primary" role="alert">
                                                <span aria-hidden="true"><i class="fa fa-exclamation-triangle"></i></span>
                                                Your subscription plan does not include this feature.please upgrade.
                                            </div>
                                        @endif
                                    </form>
                                    
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>

    {{-------------------------}}
    {{-- input phone setting --}}
    <script>
        /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/

        var phone = document.querySelector("#phone"),
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");
        
        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        var iti=window.intlTelInput(phone,{
            initialCountry: "us",
            separateDialCode: true,
            preferredCountries: ["fr", "us", "gb"],
            geoIpLookup: function (callback) {
                $.get('https://ipinfo.io', function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        var hiden_phone = document.querySelector("#hiden");
        window.intlTelInput(hiden_phone,{
            initialCountry: "us",
            dropdownContainer: 'body',
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        var reset = function() {
            phone.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);

        $(document).ready(function () {
            $('#phone').mask(mask1)
        });

        $("#phone").on("countrychange", function (e, countryData) {
            $("#phone").val('');
            var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);
            $('#phone').mask(mask1);

            var country_data=iti.getSelectedCountryData();
            console.log(country_data);
            document.getElementById("hiden").value = JSON.stringify(country_data);/* $("#phone").val().replace(/\s+/g, '') */;
        });

        // on blur: validate
        phone.addEventListener('blur', function() {
        reset();
        if (phone.value.trim()) {
            if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
            } else {
            phone.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
            }
        }
        });

        $('input.hide').parent().hide();

        // on keyup / change flag: reset
        phone.addEventListener('change', reset);
        phone.addEventListener('keyup', reset);

    </script>
    {{-- end input phone setting --}}
    {{-----------------------------}}

    <script>
        $('#personalInfoFormBtn').on('click',function(e){
            e.preventDefault();
            if (iti.isValidNumber()) {
                $('#personal-info-form').submit();
            } else {
                phone.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
                $('html, body').animate({
                    scrollTop: $("#phone-div").position().top
                }, 800);
                return false;
            }
        })
    </script>

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

    const validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
    const validVideoTypes = ['video/mp4', 'video/mkv', 'video/mov', 'video/wmv'];
    const validAudioTypes = ['audio/mp3', 'audio/mpeg', 'audio/wav'];

    var uploadedDocumentMap = {};
    Dropzone.autoDiscover = false;
    var myDropzoneTheFirst = new Dropzone(
        //id of drop zone element 1
        '#imageDropzone',{
            url: '{{ route('account.storeMedia') }}',
            maxFiles:"{{$data['plan']->pictures}}"-"{{count($data['images'])}}",
            maxFilesize: 12, // MB
            acceptedFiles: "image/*", /* ,.mp4,.mkv,.mov,.wmv,audio */
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
                
                if (validImageTypes.includes(fileType)) {
                    formData.append('type', 'image');
                }
                /* else if (validVideoTypes.includes(fileType)) {
                    formData.append('type', 'video');
                }
                else if (validAudioTypes.includes(fileType)) {
                    formData.append('type', 'audio');
                } */
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

                /* this.on('addedfile', function(file) {
                    setDropzoneImgLimit(file);
                }); */

                this.on("maxfilesexceeded", function(file){
                    alert("No more files please!");
                });

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

    /* function setDropzoneImgLimit(file)
    {
        if ( validImageTypes.includes(file.type)) {
            $('#imageDropzone')[0].dropzone.options.maxFiles = "{{$data['plan']->pictures}}"- "{{count($data['images'])}}";
        }
    } */

    /* function sendAudio(file)
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
    } */
</script>

<script src="{{asset('js/mydropzone.js')}}"></script>
<script>
    $(document).ready(function () {
        var $social_repeater = $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            initEmpty: true,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
                'text-input': 'foo'
            },
            // (Optional)
            // "show" is called just after an item is added.  The item is hidden
            // at this point.  If a show callback is not given the item will
            // have $(this).show() called on it.
            /* show: function () {
                $(this).slideDown();
            }, */
            // (Optional)
            // "hide" is called when a user clicks on a data-repeater-delete
            // element.  The item is still visible.  "hide" is passed a function
            // as its first argument which will properly remove the item.
            // "hide" allows for a confirmation step, to send a delete request
            // to the server, etc.  If a hide callback is not given the item
            // will be deleted.
            hide: function (deleteElement) {
                /* if(confirm('Are you sure you want to delete this element?')) { */
                    $(this).slideUp(deleteElement);
                /* } */
            },
            // (Optional)
            // You can use this if you need to manually re-index the list
            // for example if you are using a drag and drop library to reorder
            // list items.
            /* ready: function (setIndexes) {
                $dragAndDrop.on('drop', setIndexes);
            }, */
            // (Optional)
            // Removes the delete button from the first list item,
            // defaults to false.
            isFirstItemUndeletable: true
        })

        $('#repeater-add-btn').on('click',function(e){
            e.preventDefault();
            console.log({{count($data["social"])}});
            if ($('.repeater').find('[data-repeater-delete]').length > "{{$data["plan"]->social_limit}}")
            {
                $('.repeater').find('[data-repeater-delete]').last().click();
                toastr.warning('Limit exceeded');
            }else{
                $social_repeater.slideDown();
            }
            
        })

        @if(!is_null($data["social"]) && count($data["social"])>0)
            var social={!!json_encode($data["social"])!!};
            $social_repeater.setList(social);
        @endif
        
        @if (auth()->user()->status==0)
            myDropzoneTheFirst.disable();
        @endif
        
    });

    $(document).on('click',function(e){
        
        if ( $('div#v-pills-tab').find(e.target).length) 
        {
            if (e.target.id === $('a.nav-link.active').attr('id')) {
                myDropzoneTheFirst.disable();

                $.ajax({
                    url: '{{ route('account.fetch_attachments') }}',
                    type: 'GET',
                    success: function(res) {
                        $('#render_attachments').html(res);
                        
                        $.get( '{{ route('account.get_limit') }}/?q=fetch_limit', function() {})
                            .done(function(res) {
                                
                                var store_url='{{ route('account.storeMedia') }}';
                                render_dropzone(store_url);
                                
                                $('#imageDropzone')[0].dropzone.options.maxFiles = "{{$data['plan']->pictures}}"-res['image_limit'];
                            })
                            .fail(function() {
                                alert( "error" );
                            });
                        
                        /* myDropzoneTheFirst.enable(); */
                    },
                    error: function(error) {
                        $('#render_attachments').html("<h4>No Attachments Found</h4>");
                    }
                });
            }
        }
        
        
    })
</script>

@endsection