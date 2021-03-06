@extends('web.layouts.app')


@section('title', 'Signup')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
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
        width: 157px;
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
    .switch-field {
        display: flex;
        overflow: hidden;
    }

    .switch-field input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }

    .switch-field label {
        background-color: #e4e4e4;
        color: rgba(0, 0, 0, 0.6);
        font-size: 14px;
        line-height: 1;
        text-align: center;
        padding: 8px 16px;
        margin-right: -1px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.1s ease-in-out;
    }

    .switch-field label:hover {
        cursor: pointer;
    }

    .switch-field input:checked + label {
        background-color: #df691ad1;
        box-shadow: none;
    }

    .switch-field label:first-of-type {
        border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
        border-radius: 0 4px 4px 0;
    }

    .head_div{
        border-bottom: 2px solid #ef7b2c;
        background-color: gainsboro;
    }

    .guardian:checked:after {
        width: 17px;
        height: 17px;
        border-radius: 17px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ef7b2c;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    #guardian_section{
        display: none
    }

    #custom_gender{
        display: none;
    }
</style>
@endsection


@section('content')

<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    {{-- <div class="page__subtitle title__grey">Apply</div> --}}
                    <h1 class="page__title">New Membership</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                {{-- <h3 class="text__quote centered">New membership</h3> --}}
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">

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
                    
                    <form class="apply-form form-horizontal" method="POST" id="registerForm" action="{{ route('account.candidate_signup') }}">
                       @csrf
                        <input type="hidden" name="account_type" value="candidate">
                        @if (\Request::query('referal'))
                            <input type="hidden" name="referal" value="{{\Request::query('referal')}}">
                        @endif
                        {{-- <div class="form-block">
                            <div class="tg-btn-sp m-b-20">
                                <div class="switch-button">
                                    <span class="active"></span>
                                    <span class="switch-button-case left">Creator</span>
                                    <span class="switch-button-case right active-case">Creative</span>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info d-flex" role="alert">
                                    <span aria-hidden="true"><i class="fa fa-exclamation-circle"></i></span>
                                    <p class="ml-3">You selected and are signing up for the <a href="{{route('pricing')}}" target="_blank" rel="noopener noreferrer"><b>{{$plan->name ?? ''}}</b></a> membership.</p>
                                    
                                </div>
                            </div> 
                        </div>
                        
                        <div class="form-block">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <h4 class="control-label">I am<span class="req">*</span></h4>
                                    <div style="display: flex">
                                        <input type="radio" class="guardian mt-3 mr-2 @error('guardian') is-invalid @enderror" name="guardian" value="guardian" {{old('guardian')=='guardian'?'checked' : ''}} id="guardian" required>
                                        <label for="guardian">The parent or legal guardian of the member (if under 18)</label>
                                    </div>
                                    <div style="display: flex">
                                        <input type="radio" class="guardian mt-3 mr-2 @error('guardian') is-invalid @enderror" name="guardian" value="member" {{old('guardian')=='member'?'checked' : ''}} id="member">
                                        <label for="member">The member (if 18 or older)</label for="member"> 
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div id="guardian_section">
                                <h4 class="head_div">Parent/Guardian Details</h4>
                                <div class="form-group">
                                    <label for="g_f_name" class="col-sm-4 control-label">Legal First Name <span class="req">*</span></label>
                                    <div class="col-sm-8">
                                        <input id="g_f_name" type="text" class="form-control @error('g_f_name') is-invalid @enderror" name="g_f_name" value="{{ old('g_f_name') }}" required autocomplete="g_f_name" autofocus>

                                        {{-- @error('f_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="g_l_name" class="col-sm-4 control-label">Legal Last Name <span class="req">*</span></label>
                                    <div class="col-sm-8">
                                        <input id="g_l_name" type="text" class="form-control @error('g_l_name') is-invalid @enderror" name="g_l_name" value="{{ old('g_l_name') }}" required autocomplete="g_l_name" autofocus>

                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="dob" class="col-sm-4 control-label">Date of birth <span class="req">*</span></label>
                                    <div class="col-sm-8 form-row">
                                        <input id="g_dob" type="date" min='1920-01-01' class="form-control @error('g_dob') is-invalid @enderror" name="g_dob" value="{{ old('g_dob') }}" required autocomplete="g_dob" autofocus>
                                        @error('g_dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <section id="date-of-birth-example-1"> --}}
                                            {{-- <fieldset style="display: flex;">
                                            <div class="field-inline-block">
                                                <label>Month</label> --}}
                                                {{-- <input type="hidden" name="g_day_hidden"class="date-field"/> --}}
                                            {{-- </div>
                                            /
                                            <div class="field-inline-block">
                                                <label>Day</label>
                                                <input type="text" name="g_day" pattern="[0-9]*" maxlength="2" size="2" class="date-field"  value="{{ old('g_day') }}"/>
                                            </div>
                                            /
                                            <div class="field-inline-block">
                                                <label>Year</label>
                                                <input type="text" name="g_year" pattern="[0-9]*" maxlength="4" size="4" class="date-field date-field--year"  value="{{ old('g_year') }}"/>
                                            </div>
                                            </fieldset> --}}
                                        {{-- </section> --}}
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label for="g_landline" class="col-sm-4 control-label">Landline</label>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength="15"  class="form-control" name="g_landline" id="g_landline" value="{{ old('g_landline') }}">
                                    </div>
                                </div>

                                <div class="form-group" id="phone-div">
                                    <label for="g_phone" class="col-sm-4 control-label">Cell Phone <span class="req">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" maxlength="15"  class="form-control" name="g_phone" id="g_phone" value="{{ old('g_phone') }}">
                                        <input type="tel" class="hide" name="g_new_phone" id="g_hiden">
                                        <span id="g-valid-msg" class="valid-feedback hide">??? Valid</span>
                                        <span id="g-error-msg" class="invalid-feedback hide"></span>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">Email <span class="req">*</span></label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div> --}}
                                <h4 class="head_div">Parent/Guardian Residence</h4>
                                <div class="form-group">
                                    <label for="g_country" class="col-sm-4 control-label">Country <span class="req">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="g_country" id="g_country" class="form-control" value="United States" disabled>
                                        {{-- <select name="g_country" id="g_country" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->nicename}}" {{ !is_null(old('g_country')) ? (old('g_country')==$country->nicename ?'selected':''): ($country->nicename=="United States" ? 'selected' : '')}}>{{$country->nicename}}</option>
                                            @endforeach
                                            
                                        </select> --}}
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="g_city" class="col-sm-4 control-label">City <span class="req">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="g_city" value="{{ old('g_city') }}" id="g_city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="g_state" class="col-sm-4 control-label">State <span class="req">*</span></label>
                                    <div class="col-sm-8">
                                        {{-- <input type="text" class="form-control" name="g_state" value="{{ old('g_state') }}" id="g_state"> --}}
                                        <select id="g_state" class="form-control" name="g_state">
                                            <option label="Select"></option>
                                            <option value="Alabama" {{ old('g_state')=='Alabama' ?'selected':''}}>Alabama</option>
                                            <option value="Alaska" {{ old('g_state')=='Alaska' ?'selected':''}}>Alaska</option>
                                            <option value="Arizona" {{ old('g_state')=='Arizona' ?'selected':''}}>Arizona</option>
                                            <option value="Arkansas" {{ old('g_state')=='Arkansas' ?'selected':''}}>Arkansas</option>
                                            <option value="California" {{ old('g_state')=='California' ?'selected':''}}>California</option>
                                            <option value="Colorado" {{ old('g_state')=='Colorado' ?'selected':''}}>Colorado</option>
                                            <option value="Connecticut" {{ old('g_state')=='Connecticut' ?'selected':''}}>Connecticut</option>
                                            <option value="Delaware" {{ old('g_state')=='Delaware' ?'selected':''}}>Delaware</option>
                                            <option value="District of Columbia" {{ old('g_state')=='District of Columbia' ?'selected':''}}>District of Columbia</option>
                                            <option value="Florida" {{ old('g_state')=='Florida' ?'selected':''}}>Florida</option>
                                            <option value="Georgia" {{ old('g_state')=='Georgia' ?'selected':''}}>Georgia</option>
                                            <option value="Guam" {{ old('g_state')=='Guam' ?'selected':''}}>Guam</option>
                                            <option value="Hawaii" {{ old('g_state')=='Hawaii' ?'selected':''}}>Hawaii</option>
                                            <option value="Idaho" {{ old('g_state')=='Idaho' ?'selected':''}}>Idaho</option>
                                            <option value="Illinois" {{ old('g_state')=='Illinois' ?'selected':''}}>Illinois</option>
                                            <option value="Indiana" {{ old('g_state')=='Indiana' ?'selected':''}}>Indiana</option>
                                            <option value="Iowa" {{ old('g_state')=='Iowa' ?'selected':''}}>Iowa</option>
                                            <option value="Kansas" {{ old('g_state')=='Kansas' ?'selected':''}}>Kansas</option>
                                            <option value="Kentucky" {{ old('g_state')=='Kentucky' ?'selected':''}}>Kentucky</option>
                                            <option value="Louisiana" {{ old('g_state')=='Louisiana' ?'selected':''}}>Louisiana</option>
                                            <option value="Maine" {{ old('g_state')=='Maine' ?'selected':''}}>Maine</option>
                                            <option value="Maryland" {{ old('g_state')=='Maryland' ?'selected':''}}>Maryland</option>
                                            <option value="Massachusetts" {{ old('g_state')=='Massachusetts' ?'selected':''}}>Massachusetts</option>
                                            <option value="Michigan" {{ old('g_state')=='Michigan' ?'selected':''}}>Michigan</option>
                                            <option value="Minnesota" {{ old('g_state')=='Minnesota' ?'selected':''}}>Minnesota</option>
                                            <option value="Mississippi" {{ old('g_state')=='Mississippi' ?'selected':''}}>Mississippi</option>
                                            <option value="Missouri" {{ old('g_state')=='Missouri' ?'selected':''}}>Missouri</option>
                                            <option value="Montana" {{ old('g_state')=='Montana' ?'selected':''}}>Montana</option>
                                            <option value="Nebraska" {{ old('g_state')=='Nebraska' ?'selected':''}}>Nebraska</option>
                                            <option value="Nevada" {{ old('g_state')=='Nevada' ?'selected':''}}>Nevada</option>
                                            <option value="New Hampshire" {{ old('g_state')=='New Hampshire' ?'selected':''}}>New Hampshire</option>
                                            <option value="New Jersey" {{ old('g_state')=='New Jersey' ?'selected':''}}>New Jersey</option>
                                            <option value="New Mexico" {{ old('g_state')=='New Mexico' ?'selected':''}}>New Mexico</option>
                                            <option value="New York" {{ old('g_state')=='New York' ?'selected':''}}>New York</option>
                                            <option value="North Carolina" {{ old('g_state')=='North Carolina' ?'selected':''}}>North Carolina</option>
                                            <option value="North Dakota" {{ old('g_state')=='North Dakota' ?'selected':''}}>North Dakota</option>
                                            <option value="Northern Marianas Islands" {{ old('g_state')=='Northern Marianas Islands' ?'selected':''}}>Northern Marianas Islands</option>
                                            <option value="Ohio" {{ old('g_state')=='Ohio' ?'selected':''}}>Ohio</option>
                                            <option value="Oklahoma" {{ old('g_state')=='Oklahoma' ?'selected':''}}>Oklahoma</option>
                                            <option value="Oregon" {{ old('g_state')=='Oregon' ?'selected':''}}>Oregon</option>
                                            <option value="Pennsylvania" {{ old('g_state')=='Pennsylvania' ?'selected':''}}>Pennsylvania</option>
                                            <option value="Puerto Rico" {{ old('g_state')=='Puerto Rico' ?'selected':''}}>Puerto Rico</option>
                                            <option value="Rhode Island" {{ old('g_state')=='Rhode Island' ?'selected':''}}>Rhode Island</option>
                                            <option value="South Carolina" {{ old('g_state')=='South Carolina' ?'selected':''}}>South Carolina</option>
                                            <option value="South Dakota" {{ old('g_state')=='South Dakota' ?'selected':''}}>South Dakota</option>
                                            <option value="Tennessee" {{ old('g_state')=='Tennessee' ?'selected':''}}>Tennessee</option>
                                            <option value="Texas" {{ old('g_state')=='Texas' ?'selected':''}}>Texas</option>
                                            <option value="Utah" {{ old('g_state')=='Utah' ?'selected':''}}>Utah</option>
                                            <option value="Vermont" {{ old('g_state')=='Vermont' ?'selected':''}}>Vermont</option>
                                            <option value="Virginia" {{ old('g_state')=='Virginia' ?'selected':''}}>Virginia</option>
                                            <option value="Virgin Islands" {{ old('g_state')=='Virgin Islands' ?'selected':''}}>Virgin Islands</option>
                                            <option value="Washington" {{ old('g_state')=='Washington' ?'selected':''}}>Washington</option>
                                            <option value="West Virginia" {{ old('g_state')=='West Virginia' ?'selected':''}}>West Virginia</option>
                                            <option value="Wisconsin" {{ old('g_state')=='Wisconsin' ?'selected':''}}>Wisconsin</option>
                                            <option value="Wyoming" {{ old('g_state')=='Wyoming' ?'selected':''}}>Wyoming</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="g_address" class="col-sm-4 control-label">Custom</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="g_h_adress_1" value="{{ old('g_h_adress_1') }}" id="g_h_adress_1" required>
                                    </div>
                                </div> --}}
                            </div>
                            
                            {{-- <div class="form-group">
                                <label for="h_adress_2" class="col-sm-4 control-label">Home Address 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="h_adress_2" value="{{ old('h_adress_2') }}" name="h_adress_2">
                                </div>
                            </div> --}}
                        
                            {{-- <div class="form-group">
                                <label for="zipcode" class="col-sm-4 control-label">Zip Code <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ old('zipcode') }}" name="zipcode" id="zipcode">
                                </div>
                            </div> --}}
                             
                            {{-- <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Create a Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div> --}}

                            <h4 class="head_div">Member Details (<span id="member_age_text">above</span> 18)</h4>

                            <div class="form-group">
                                <label for="f_name" class="col-sm-4 control-label">Legal First Name <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="l_name" class="col-sm-4 control-label">Legal Last Name <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                    <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>

                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="dob" class="col-sm-4 control-label">Date of birth <span class="req">*</span></label>
                                <div class="col-sm-8 form-row">
                                    <input id="dob" type="date" min='1920-01-01' class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <section id="date-of-birth-example-1"> --}}
                                        {{-- <fieldset style="display: flex;">
                                          <div class="field-inline-block">
                                            <label>Month</label> --}}
                                            {{-- <input type="hidden" name="day_hidden" class="date-field"/> --}}
                                          {{-- </div>
                                          /
                                          <div class="field-inline-block">
                                            <label>Day</label>
                                            <input type="text" name="day" pattern="[0-9]*" maxlength="2" size="2" class="date-field" value="{{ old('day') }}" />
                                          </div>
                                          /
                                          <div class="field-inline-block">
                                            <label>Year</label>
                                            <input type="text" name="year" pattern="[0-9]*" maxlength="4" size="4" class="date-field date-field--year" value="{{ old('year') }}" />
                                          </div>
                                        </fieldset> --}}
                                    {{-- </section> --}}
                                 </div>
                            </div>
                            
                            <div class="form-group" >
                                <label for="landline" class="col-sm-4 control-label">Landline</label>
                                <div class="col-sm-8">
                                    <input type="text" maxlength="15"  class="form-control" name="landline" id="landline" value="{{ old('landline') }}">
                                </div>
                            </div>

                            <div class="form-group" id="phone-div">
                                <label for="phone" class="col-sm-4 control-label">Cell Phone <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="tel" maxlength="15"  class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                    <input type="tel" class="hide" name="new_phone" id="hiden">
                                    <span id="valid-msg" class="valid-feedback hide">??? Valid</span>
                                    <span id="error-msg" class="invalid-feedback hide"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" name = "gender" class="form-control" required>
                                        <option label="Select"></option>
                                        <option value="female" {{ old('gender')=='female' ?'selected':''}}>Female</option>
                                        <option value="male" {{ old('gender')=='male' ?'selected':''}}>Male</option>
                                        <option value="Rather not say" {{ old('gender')=='Rather not say' ?'selected':''}}>Rather not say</option>
                                        <option value="custom" {{ old('gender')=='custom' ?'selected':''}}>Custom</option>
                                    </select>
                                    <input class="form-control" id="custom_gender" type="text" name="custom_gender">
                                 </div>
                            </div>

                            <div class="form-group">
                                <label for="ethnicity" class="col-sm-4 control-label">Ethnicity <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select name="ethnicity" id="ethnicity" name = "ethnicity" class="form-control" required>
                                        <option label="Select"></option>
                                        <option value="American Indian or Alaska Native" {{ old('ethnicity')=='American Indian or Alaska Native' ?'selected':''}}>American Indian or Alaska Native</option>
                                        <option value="Asian" {{ old('ethnicity')=='Asian' ?'selected':''}}>Asian</option>
                                        <option value="Black or African American" {{ old('ethnicity')=='Black or African American' ?'selected':''}}>Black or African American</option>
                                        <option value="Hispanic" {{ old('ethnicity')=='Hispanic' ?'selected':''}}>Hispanic</option>
                                        <option value="Native Hawaiian or Other Pacific Islander" {{ old('ethnicity')=='Native Hawaiian or Other Pacific Islander' ?'selected':''}}>Native Hawaiian or Other Pacific Islander</option>
                                        <option value="White" {{ old('ethnicity')=='White' ?'selected':''}}>White</option>
                                        <option value="Two or More Races" {{ old('ethnicity')=='Two or More Races' ?'selected':''}}>Two or More Races</option>
                                    </select>
                                 </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-4 control-label">Country <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text"  name="country" id="country" class="form-control" value="United States" disabled>
                                    {{-- <select name="country" id="country" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->nicename}}" {{ !is_null(old('country')) ? (old('country')==$country->nicename ?'selected':''): ($country->nicename=="United States" ? 'selected' : '')}}>{{$country->nicename}}</option>
                                        @endforeach
                                        
                                    </select> --}}
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="city" class="col-sm-4 control-label">City <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">State <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select id="state" class="form-control" name="state">
                                        <option label="Select"></option>
                                        <option value="Alabama" {{ old('state')=='Alabama' ?'selected':''}}>Alabama</option>
                                        <option value="Alaska" {{ old('state')=='Alaska' ?'selected':''}}>Alaska</option>
                                        <option value="Arizona" {{ old('state')=='Arizona' ?'selected':''}}>Arizona</option>
                                        <option value="Arkansas" {{ old('state')=='Arkansas' ?'selected':''}}>Arkansas</option>
                                        <option value="California" {{ old('state')=='California' ?'selected':''}}>California</option>
                                        <option value="Colorado" {{ old('state')=='Colorado' ?'selected':''}}>Colorado</option>
                                        <option value="Connecticut" {{ old('state')=='Connecticut' ?'selected':''}}>Connecticut</option>
                                        <option value="Delaware" {{ old('state')=='Delaware' ?'selected':''}}>Delaware</option>
                                        <option value="District of Columbia" {{ old('state')=='District of Columbia' ?'selected':''}}>District of Columbia</option>
                                        <option value="Florida" {{ old('state')=='Florida' ?'selected':''}}>Florida</option>
                                        <option value="Georgia" {{ old('state')=='Georgia' ?'selected':''}}>Georgia</option>
                                        <option value="Guam" {{ old('state')=='Guam' ?'selected':''}}>Guam</option>
                                        <option value="Hawaii" {{ old('state')=='Hawaii' ?'selected':''}}>Hawaii</option>
                                        <option value="Idaho" {{ old('state')=='Idaho' ?'selected':''}}>Idaho</option>
                                        <option value="Illinois" {{ old('state')=='Illinois' ?'selected':''}}>Illinois</option>
                                        <option value="Indiana" {{ old('state')=='Indiana' ?'selected':''}}>Indiana</option>
                                        <option value="Iowa" {{ old('state')=='Iowa' ?'selected':''}}>Iowa</option>
                                        <option value="Kansas" {{ old('state')=='Kansas' ?'selected':''}}>Kansas</option>
                                        <option value="Kentucky" {{ old('state')=='Kentucky' ?'selected':''}}>Kentucky</option>
                                        <option value="Louisiana" {{ old('state')=='Louisiana' ?'selected':''}}>Louisiana</option>
                                        <option value="Maine" {{ old('state')=='Maine' ?'selected':''}}>Maine</option>
                                        <option value="Maryland" {{ old('state')=='Maryland' ?'selected':''}}>Maryland</option>
                                        <option value="Massachusetts" {{ old('state')=='Massachusetts' ?'selected':''}}>Massachusetts</option>
                                        <option value="Michigan" {{ old('state')=='Michigan' ?'selected':''}}>Michigan</option>
                                        <option value="Minnesota" {{ old('state')=='Minnesota' ?'selected':''}}>Minnesota</option>
                                        <option value="Mississippi" {{ old('state')=='Mississippi' ?'selected':''}}>Mississippi</option>
                                        <option value="Missouri" {{ old('state')=='Missouri' ?'selected':''}}>Missouri</option>
                                        <option value="Montana" {{ old('state')=='Montana' ?'selected':''}}>Montana</option>
                                        <option value="Nebraska" {{ old('state')=='Nebraska' ?'selected':''}}>Nebraska</option>
                                        <option value="Nevada" {{ old('state')=='Nevada' ?'selected':''}}>Nevada</option>
                                        <option value="New Hampshire" {{ old('state')=='New Hampshire' ?'selected':''}}>New Hampshire</option>
                                        <option value="New Jersey" {{ old('state')=='New Jersey' ?'selected':''}}>New Jersey</option>
                                        <option value="New Mexico" {{ old('state')=='New Mexico' ?'selected':''}}>New Mexico</option>
                                        <option value="New York" {{ old('state')=='New York' ?'selected':''}}>New York</option>
                                        <option value="North Carolina" {{ old('state')=='North Carolina' ?'selected':''}}>North Carolina</option>
                                        <option value="North Dakota" {{ old('state')=='North Dakota' ?'selected':''}}>North Dakota</option>
                                        <option value="Northern Marianas Islands" {{ old('state')=='Northern Marianas Islands' ?'selected':''}}>Northern Marianas Islands</option>
                                        <option value="Ohio" {{ old('state')=='Ohio' ?'selected':''}}>Ohio</option>
                                        <option value="Oklahoma" {{ old('state')=='Oklahoma' ?'selected':''}}>Oklahoma</option>
                                        <option value="Oregon" {{ old('state')=='Oregon' ?'selected':''}}>Oregon</option>
                                        <option value="Pennsylvania" {{ old('state')=='Pennsylvania' ?'selected':''}}>Pennsylvania</option>
                                        <option value="Puerto Rico" {{ old('state')=='Puerto Rico' ?'selected':''}}>Puerto Rico</option>
                                        <option value="Rhode Island" {{ old('state')=='Rhode Island' ?'selected':''}}>Rhode Island</option>
                                        <option value="South Carolina" {{ old('state')=='South Carolina' ?'selected':''}}>South Carolina</option>
                                        <option value="South Dakota" {{ old('state')=='South Dakota' ?'selected':''}}>South Dakota</option>
                                        <option value="Tennessee" {{ old('state')=='Tennessee' ?'selected':''}}>Tennessee</option>
                                        <option value="Texas" {{ old('state')=='Texas' ?'selected':''}}>Texas</option>
                                        <option value="Utah" {{ old('state')=='Utah' ?'selected':''}}>Utah</option>
                                        <option value="Vermont" {{ old('state')=='Vermont' ?'selected':''}}>Vermont</option>
                                        <option value="Virginia" {{ old('state')=='Virginia' ?'selected':''}}>Virginia</option>
                                        <option value="Virgin Islands" {{ old('state')=='Virgin Islands' ?'selected':''}}>Virgin Islands</option>
                                        <option value="Washington" {{ old('state')=='Washington' ?'selected':''}}>Washington</option>
                                        <option value="West Virginia" {{ old('state')=='West Virginia' ?'selected':''}}>West Virginia</option>
                                        <option value="Wisconsin" {{ old('state')=='Wisconsin' ?'selected':''}}>Wisconsin</option>
                                        <option value="Wyoming" {{ old('state')=='Wyoming' ?'selected':''}}>Wyoming</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Create a Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Confirm Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="address" class="col-sm-4 control-label">Custom</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="h_adress_1" value="{{ old('h_adress_1') }}" id="h_adress_1" required>
                                </div>
                            </div> --}}
                           
                            <div class="form-group">
                                <label for="union" class="col-sm-4 control-label">Union</label>
                                <div class="col-sm-8">
                                    <div class="switch-field">
                                        <input type="radio" id="union_yes" name="union" value="yes" checked/>
                                        <label for="union_yes">Yes</label>
                                        <input type="radio" id="union_no" name="union" value="no" />
                                        <label for="union_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passport" class="col-sm-4 control-label">Passport</label>
                                <div class="col-sm-8">
                                    <div class="switch-field">
                                        <input type="radio" id="passport_yes" name="passport" value="yes" checked/>
                                        <label for="passport_yes">Yes</label>
                                        <input type="radio" id="passport_no" name="passport" value="no" />
                                        <label for="passport_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Driver's License</label>
                                <div class="col-sm-8">
                                    <div class="switch-field">
                                        <input type="radio" id="license_yes" name="driver_license" value="yes" checked/>
                                        <label for="license_yes">Yes</label>
                                        <input type="radio" id="license_no" name="driver_license" value="no" />
                                        <label for="license_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-sm-offset-4 col-sm-8">
                                    <input class="form-check-input" type="checkbox" name="user_agreement" required id="user_agreement" {{ old('user_agreement') ? 'checked' : '' }}> I agree to The Talent Depot <a href="{{route('user_agreement')}}" style="color: #df691a" target="_blank">User Agreement.</a> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-sm-offset-4 col-sm-8">
                                    <input class="form-check-input" type="checkbox" name="license_agreement" required id="license_agreement" {{ old('license_agreement') ? 'checked' : '' }}> I agree to The Talent Depot <a href="{{route('license_agreement')}}" style="color: #df691a" target="_blank">User License.</a> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="button" class="btn btn-default btn__red {{-- animation --}} btn-full pull-right mb-5" id="registerSubmitBtn">join us</button>
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
        /* var user_type = 'agent';

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
        }, false); */

    </script>
    {{-------------------------}}
    {{-- input phone setting --}}
    <script>
        /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/

        var phone = document.querySelector("#phone"),
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");

        var g_phone = document.querySelector("#g_phone"),
            g_errorMsg = document.querySelector("#g-error-msg"),
            g_validMsg = document.querySelector("#g-valid-msg");
        
        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        var iti=window.intlTelInput(phone,{
            allowDropdown: false,
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

        var g_iti=window.intlTelInput(g_phone,{
            allowDropdown: false,
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
        var g_hiden_phone = document.querySelector("#g_hiden");

        window.intlTelInput(hiden_phone,{
            initialCountry: "us",
            dropdownContainer: 'body',
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        window.intlTelInput(g_hiden_phone,{
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

        var g_reset = function() {
            g_phone.classList.remove("error");
            g_errorMsg.innerHTML = "";
            g_errorMsg.classList.add("hide");
            g_validMsg.classList.add("hide");
        };

        var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);
        var g_mask = $("#g_phone").attr('placeholder').replace(/[0-9]/g, 0);

        $(document).ready(function () {
            $('#phone').mask(mask1)
            $('#g_phone').mask(g_mask)
        });

        $("#phone").on("countrychange", function (e, countryData) {
            $("#phone").val('');
            var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);
            $('#phone').mask(mask1);

        });

        $("#g_phone").on("countrychange", function (e, countryData) {
            $("#g_phone").val('');
            var mask1 = $("#g_phone").attr('placeholder').replace(/[0-9]/g, 0);
            $('#g_phone').mask(mask1);

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

        g_phone.addEventListener('blur', function() {
        reset();
        if (g_phone.value.trim()) {
            if (g_iti.isValidNumber()) {
            g_validMsg.classList.remove("hide");
            } else {
            g_phone.classList.add("error");
            var g_errorCode = g_iti.getValidationError();
            g_errorMsg.innerHTML = errorMap[g_errorCode];
            g_errorMsg.classList.remove("hide");
            }
        }
        });

        $('input.hide').parent().hide();

        // on keyup / change flag: reset
        phone.addEventListener('change', reset);
        phone.addEventListener('keyup', reset);

        g_phone.addEventListener('change', reset);
        g_phone.addEventListener('keyup', reset);

    </script>
    {{-- end input phone setting --}}
    {{-------------------------}}

    <script>
        $('#registerSubmitBtn').on('click',function(e){
            e.preventDefault();
            if (iti.isValidNumber()) {
                var country_data=iti.getSelectedCountryData();
                var g_country_data=g_iti.getSelectedCountryData();
                console.log(country_data);
                document.getElementById("hiden").value = JSON.stringify(country_data);
                document.getElementById("g_hiden").value = JSON.stringify(g_country_data);
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
        document.getElementById("g_dob").setAttribute("max", today)
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autotab/1.9.2/js/jquery.autotab.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('.date-field').autotab('number');
            
            $('.date-field').on('focus',function(){
                
            })

            $("[name='day'], [name='g_day']").datepicker( {
                
                onClose: function(dateText, inst) {
                    var startDate = new Date(dateText);
                    var selDay = startDate.getDate();
                    if (isNaN(selDay)) {
                        selDay=1;
                    }
                    $(this).val(selDay);
                }
            });

            $("[name='month'], [name='g_month']").datepicker( {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'mm',
                maxDate: '-1M',
                onClose: function(dateText, inst) { 
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).val($.datepicker.formatDate('mm', new Date(year, month, 1)));
                }
            });

            $("[name='year'], [name='g_year']").datepicker( {
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

    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-dropdown-datepicker@1.3.0/dist/jquery-dropdown-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){


            $('#guardian').click(function(){
                $('#g_country').val('United States');
            })



            /* var max_limit = new Date();
            var min_limit = new Date();
            max_limit.setDate(today.getDate() - 31);
            min_limit.setDate(today.getDate() - (365*100));

            $(" [name='g_day_hidden']").dropdownDatepicker({
                maxDate: max_limit,
                minDate: min_limit,
                required: true,
                wrapperClass:'d-flex',
                dropdownClass:'date-field form-control',
                displayFormat: 'mdy',
                monthFormat: 'short',
            });

            $('[name="date_[day]"]').attr('name',"g_date_[day]");
            $('[name="date_[month]"]').attr('name',"g_date_[month]");
            $('[name="date_[year]"]').attr('name',"g_date_[year]");

            $("[name='day_hidden']").dropdownDatepicker({
                maxDate: max_limit,
                minDate: min_limit,
                required: true,
                wrapperClass:'d-flex',
                dropdownClass:'date-field form-control',
                displayFormat: 'mdy',
                monthFormat: 'short',
            });
            */
            
        })
    </script>

    <script>
        $(document).ready(function(){
            if ($('[name="guardian"]').is(':checked') && $('[name="guardian"]:checked').val()=='guardian')
            {
                $('#member_age_text').text('under');
                $('#guardian_section').slideDown();
            }

            $('[name="guardian"]').on('click',function(){
                if ($('[name="guardian"]:checked').val()=='guardian') {
                    $('#member_age_text').text('under');
                    $('#guardian_section').slideDown();

                }else{
                    $('#guardian_section *').filter(':input').each(function () {
                        $(this).val('');
                    });
                    $('#member_age_text').text('above');
                    $('#guardian_section').slideUp();
                }
                
            })

            $('[name="gender"]').on('change',function(){
                if ($(this).val()=='custom') {
                    $('[name="custom_gender"]').show();
                }else{
                    $('[name="custom_gender"]').val('');
                    $('[name="custom_gender"]').hide();
                }
            })
        })
    </script>
@endsection