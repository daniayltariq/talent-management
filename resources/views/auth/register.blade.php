@extends('web.layouts.app')




@section('styles')
<style type="text/css">
button.btn.btn-default.btn__red.animation.btn-full.pull-right {
    padding: 15px 30px;
    margin-bottom: 20px;
}

.tg-btn-sp {
    position: relative;
    width: 100%;
    /* margin: 10px 3.8% 18px 3.5%; */
    /* border: 1px solid black; */
    height: 34px;
}

.switch-button, .switch-button-case {
    width: 50%;
    /* height: 43px; */
    font-size: 1.5rem;
    line-height: 3;
}

.switch-button {
    width: 100%;
    /* height: 50px; */
    text-align: center;
    position: absolute;
    /* left: 50%;
    top: 50%; */
    /* -webkit-transform: translate3D(-50%, -50%, 0);
    transform: translate3D(-50%, -50%, 0);
    will-change: transform;
    z-index: 197 !important; */
    cursor: pointer;
    /* -webkit-transition: .3s ease all; */
    /* transition: .3s ease all; */
    border: 2px solid #e2dddd;;
    display: inline-flex;
}

.switch-button .active {
    color: #151515;
    background-color: white;
    position: absolute;
    left: 0;
    top: 0;
    width: 50%;
    height: 100%;
    z-index: -1;
    -webkit-transition: .3s ease-out all;
    transition: .3s ease-out all;
}

.switch-button .active-case {
    color: #151515;
    background: #ee8d32;
    /* line-height: 3; */
}
</style>
@endsection


@section('content')

<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="page__subtitle title__grey">Apply</div>
                    <h1 class="page__title">Work with us</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">Please provide us with your contact information.</h3>
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <form class="apply-form form-horizontal" method="POST" action="{{ route('register') }}">
                       @csrf
                        <input type="hidden" name="account_type" value="farmer">

                        <div class="form-block">
                            <div class="tg-btn-sp m-b-20">
                                <div class="switch-button">
                                    <span class="active"></span>
                                    <span class="switch-button-case left active-case">Agent</span>
                                    <span class="switch-button-case right">Candidate</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-block">
                            <div class="form-group">
                                <label for="f_name" class="col-sm-4 control-label">First Name <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus>

                                @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div> 
                            <div class="form-group">
                                <label for="l_name" class="col-sm-4 control-label">Last Name <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>

                                @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" name = "gender" class="form-control" required>
                                        <option label="Select"></option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                 </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-4 control-label">Date of birth <span class="req">*</span></label>
                                <div class="col-sm-8 form-row">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                   
                                 </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email <span class="req">*</span></label>
                                <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                             
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Confirm Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-4 control-label">Country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="country" id="country">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="city" class="col-sm-4 control-label">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">State</label>
                                <div class="col-sm-8">
                                    <select name="state" id="state" class="form-control">
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-4 control-label">Home Address 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="h_adress_1" id="h_adress_1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="h_adress_2" class="col-sm-4 control-label">Home Address 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="h_adress_2" name="h_adress_2">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="zipcode" class="col-sm-4 control-label">ZipCode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="zipcode" id="zipcode">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="submit" class="btn btn-default btn__red animation btn-full pull-right">apply now</button>
                                </div>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section><!-- Services Section End -->
@endsection

@section('scripts')
    <script>
        var user_type = 'agent';

        var switchButton            = document.querySelector('.switch-button');
        var switchBtnRight          = document.querySelector('.switch-button-case.right');
        var switchBtnLeft           = document.querySelector('.switch-button-case.left');
        var activeSwitch            = document.querySelector('.active');

        function switchLeft(){
            user_type = 'agent';
            switchBtnRight.classList.remove('active-case');
            switchBtnLeft.classList.add('active-case');
            activeSwitch.style.left = '0%';
            $('[name="account_type"]').val('agent');
        }

        function switchRight(){
            user_type = 'candidate';
            switchBtnRight.classList.add('active-case');
            switchBtnLeft.classList.remove('active-case');
            activeSwitch.style.left = '50%';
            $('[name="account_type"]').val('candidate');
        }

        
        switchBtnLeft.addEventListener('click', function(){
            switchLeft();
        }, false);

        switchBtnRight.addEventListener('click', function(){
            switchRight();
        }, false);

    </script>
@endsection