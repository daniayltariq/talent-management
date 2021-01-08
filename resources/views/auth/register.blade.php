@extends('web.layouts.app')




@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
{!! htmlScriptTagJsApi([
    'action' => 'homepage',
]) !!}
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

.invalid-feedback{
    color: red;
}

.valid-feedback{
    color: rgb(45, 171, 11);
}

    .iti{
        width: 100%;
    }

    select.form-control {
        background-color: white !important;
    }

    .date-field {
        width: 100px;
        text-align: center;

    }

    .field-inline-block {
        display: inline-block;
        margin-right: 5px;
        margin-left: 5px;  
    }

    .field-inline-block label {
        text-align: center;
    }

    /* .ui-datepicker-year{
        display:none;
    } */
</style>
@endsection


@section('content')

<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="{{-- page__subtitle --}} title__grey">Apply</div>
                    <h1 class="page__title">Work with us</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">New membership</h3>
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">

                    @if(count($errors)>0)
                        <div class="alert alert-danger mt-4">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form class="apply-form form-horizontal" method="POST" id="registerForm" action="{{ route('register') }}">
                       @csrf
                        <input type="hidden" name="account_type" value="candidate">
                        @if (\Request::query('referal'))
                            <input type="hidden" name="referal" value="{{\Request::query('referal')}}">
                        @endif
                        <div class="form-block">
                            <div class="tg-btn-sp m-b-20">
                                <div class="switch-button">
                                    <span class="active"></span>
                                    <span class="switch-button-case left">Creator</span>
                                    <span class="switch-button-case right active-case">Creative</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-block">
                            <div class="form-group">
                                <label for="f_name" class="col-sm-4 control-label">First Name <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus>

                                    {{-- @error('f_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="l_name" class="col-sm-4 control-label">Last Name <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>

                               {{--  @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" name = "gender" class="form-control" required>
                                        <option label="Select"></option>
                                        <option value="female" {{ old('gender')=='female' ?'selected':''}}>Female</option>
                                        <option value="male" {{ old('gender')=='male' ?'selected':''}}>Male</option>
                                    </select>
                                    {{-- @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                 </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-4 control-label">Date of birth <span class="req">*</span></label>
                                <div class="col-sm-8 form-row">
                                    {{-- <input id="dob" type="date" min='1920-01-01' class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus> --}}
                                    {{-- @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    <section id="date-of-birth-example-1">
                                        <fieldset style="display: flex;">
                                          <div class="field-inline-block">
                                            <label>Month</label>
                                            <input type="text" name="month" max="12" pattern="[0-9]*" maxlength="2" size="2" class="date-field" />
                                          </div>
                                          /
                                          <div class="field-inline-block">
                                            <label>Day</label>
                                            <input type="text" name="day" pattern="[0-9]*" maxlength="2" size="2" class="date-field" />
                                          </div>
                                          /
                                          <div class="field-inline-block">
                                            <label>Year</label>
                                            <input type="text" name="year" pattern="[0-9]*" maxlength="4" size="4" class="date-field date-field--year" />
                                          </div>
                                        </fieldset>
                                    </section>
                                 </div>
                            </div>
                        
                            <div class="form-group" id="phone-div">
                                <label for="phone" class="col-sm-4 control-label">Phone <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="tel" maxlength="15"  class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                    <input type="tel" class="hide" name="new_phone" id="hiden">
                                    <span id="valid-msg" class="valid-feedback hide">✓ Valid</span>
                                    <span id="error-msg" class="invalid-feedback hide"></span>
                                    
                                    {{-- @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email <span class="req">*</span></label>
                                <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="country" class="col-sm-4 control-label">Country <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->nicename}}" {{ !is_null(old('country')) ? (old('country')==$country->nicename ?'selected':''): ($country->nicename=="United States" ? 'selected' : '')}}>{{$country->nicename}}</option>
                                        @endforeach
                                        
                                    </select>
                                    {{-- @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="city" class="col-sm-4 control-label">City <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city">
                                    {{-- @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">State <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="state" value="{{ old('state') }}" id="state">
                                    {{-- @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-4 control-label">Home Address 1 <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="h_adress_1" value="{{ old('h_adress_1') }}" id="h_adress_1" required>
                                   {{--  @error('h_adress_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="h_adress_2" class="col-sm-4 control-label">Home Address 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="h_adress_2" value="{{ old('h_adress_2') }}" name="h_adress_2">
                                    {{-- @error('h_adress_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="zipcode" class="col-sm-4 control-label">Zip Code <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ old('zipcode') }}" name="zipcode" id="zipcode">
                                    {{-- @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Create a Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                           
                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Confirm Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-sm-offset-4 col-sm-8">
                                    <input class="form-check-input" type="checkbox" name="user_agreement" required id="user_agreement" {{ old('user_agreement') ? 'checked' : '' }}> I agree to the The Talent Depot <a href="{{route('user_agreement')}}" style="color: #df691a">User Agreement.</a> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="button" class="btn btn-default btn__red {{-- animation --}} btn-full pull-right" id="registerSubmitBtn">join us</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                return selectedCountryPlaceholder.replace(/[0-9]/g, 5);
            },
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
    {{-------------------------}}

    <script>
        $('#registerSubmitBtn').on('click',function(e){
            e.preventDefault();
            if (iti.isValidNumber()) {
                var country_data=iti.getSelectedCountryData();
                console.log(country_data);
                document.getElementById("hiden").value = JSON.stringify(country_data);
                console.log($('#hiden').val());
                $('#registerForm').submit();
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
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("dob").setAttribute("max", today)
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autotab/1.9.2/js/jquery.autotab.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            // Autotab
            $('.date-field').autotab('number');
            
            $('.date-field').on('focus',function(){
                
            })

            /* $( "[name='days']" ).datepicker({dateFormat: 'mm'});
            $( "[name='month']" ).datepicker({dateFormat: 'dd'});
            $( "[name='year']" ).datepicker({dateFormat: 'yyyy'}); */

            $("[name='day']").datepicker( {
                
                onClose: function(dateText, inst) {
                    var startDate = new Date(dateText);
                    var selDay = startDate.getDate();
                    /* console.log(selDay); */
                    if (isNaN(selDay)) {
                        selDay=1;
                    }
                    $(this).val(selDay);
                }
            });

            $("[name='month']").datepicker( {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'mm',
                onClose: function(dateText, inst) { 
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).val($.datepicker.formatDate('mm', new Date(year, month, 1)));
                }
            });

            $("[name='year']").datepicker( {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                yearRange: "-100:+0",
                maxDate: '+1D',
                onClose: function(dateText, inst) { 
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).val($.datepicker.formatDate('yy', new Date(year, month, 1)));
                }
            });
        });

    </script>
@endsection