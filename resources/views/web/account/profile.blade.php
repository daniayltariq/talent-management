@extends('web.layouts.app')
@section('title', 'My Resume')
@section('styles')

 
<style type="text/css">
button.btn.btn__red.animation.btn-half.pull-right {
    margin-bottom: 20px;
}
.btn-half {
    width: 30%;
}
.actions li a:before{
    content: '' !important
}
button.btn.btn-primary.btn-small.repeater-add-btn {
    font-weight: 400;
    text-transform: inherit;
}
.btn-small {
    padding: 10px 14px !important;
}
.actions li:last-child a {
    padding-left: 0px;
}
.btn-warning {
    font-weight: 200;
}
.actions li:last-child a{
    padding-left: 0 !important; 
}

.tal-profile{
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: 100% 15%;
}

.input-group-bs{
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    /* flex-wrap: wrap; */
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}

.input-group-prepend {
    margin-right: -1px;
    display: flex;

}

.input-group-text-bs {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    padding: .375rem .75rem;
    margin-bottom: 0;
    font-size: 1.3rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: center;
    white-space: nowrap;
    background-color: #e9ecef;
    border: 1px solid #f7f7f7;
    border-radius: .25rem;
}

.input-group-bs>.input-group-prepend>.input-group-text-bs {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.profile-sec {
    background: none !important;
}

.profile-sec img {
    border-radius: unset;
}

.font-15{
    font-size: 15px;
}
label{
    font-weight: 500;
    color: #979797;
    font-size: 14px;
}
</style>

<link rel="stylesheet" href="{{ asset('plugins/steps/css/style.css') }}">
<style>
    
#wizard .actions {
    padding: 0px 50px 50px 50px !important;
}

.d-none{
    display: none;
}

#link_suggestion{
    display: none;
}

#suggestion{
    color: #f37c2c;
    font-weight: 600;
}

.profile__img__label{
    padding: 1rem;
    background-color: #e2752c;
    color: white !important;
    border-radius: 25px;
    margin: 0 2.4rem;
}

.ml-auto{
    margin-left: auto;
}
</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    
                    <h1 class="page__title">Profile Information</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                {{-- <h3 class="text__quote centered">Complete your profile form</h3> --}}
                <div class="col-lg-12 col-md-12 ">

                        @if ($profile)
                            @method('PUT')
                            <input type="hidden" name="profile_id" value="{{$profile->id}}">
                        @endif
                        <div id="wizard">
                            <!-- SECTION 1 -->
                                <h4></h4>
                                <section>
                                    
                                    <form method="POST" id="profile_form">
                                        {{-- <h4 class="text__quote mb-5">Basic</h4> --}}
                                        <div class="form-header">
                                            <div class="avartar">
                                                <a href="#">
                                                <div class="profile-sec ml-5 mb-4">
                                                        <img src="{{ asset(is_null($profile) || is_null($profile->profile_img) ? 'web/img/user.png': ('storage/uploads/profile/'.$profile->profile_img)) }}" id="preview_img" class="img img-responsive tal-profile">
                                                    </div>
                                                </a>
                                                <div class="avartar-picker">
                                                    <input type="file" name="profile_img" id="profile_img" class="inputfile" data-multiple-caption="{count} files selected" multiple/>
                                                    <label class="profile__img__label" for="profile_img">
                                                        <i class="zmdi zmdi-camera"></i>
                                                        <span>Main Profile Image</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-holder active">
                                                    <input type="text" placeholder="{{strtoupper('Legal First Name')}}" name="legal_first_name" id="legal_first_name" value="{{auth()->user()->f_name ??''}}" class="form-control required" disabled>
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="{{strtoupper('Legal Last Name')}}" name="legal_last_name" id="legal_last_name" value="{{auth()->user()->l_name ?? ''}}" class="form-control required" disabled>
                                                </div>
                                                <div class="form-holder">
                                                    <input type="email" placeholder="{{strtoupper('Email')}}" name="email" class="form-control required" value="{{auth()->user()->email ?? ''}}" disabled>
                                                </div>

                                                {{-- @if ($custom_url)
                                                    <div class="form-holder">
                                                        <div class="input-group-bs mb-3">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text-bs" id="basic-addon3">{{url('/').'/member/'}}</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="custom_link" value="{{$profile->custom_link ?? ''}}" id="custom_link" aria-describedby="basic-addon3">
                                                        </div>
                                                        <small id="link_error" style="color: red"></small>
                                                        <p id="link_suggestion">Suggestions: <span id="suggestion"></span></p>
                                                    </div>
                                                @endif --}}
                                                
                                                
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                
                                <!-- SECTION 2 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Body Detail</h4>
                                        <div class="form-group">
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Height (Feet)</label>
                                                        <select name="feet" class="form-control" placeholder="{{strtoupper('Feet')}}" id="" required>
                                                            <option value="">Select Height in Feet</option>
                                                            <option value="1" {{isset($profile->feet) && $profile->feet==1 ? 'selected' : ''}}>1</option>
                                                            <option value="2" {{isset($profile->feet) && $profile->feet==2 ? 'selected' : ''}}>2</option>
                                                            <option value="3" {{isset($profile->feet) && $profile->feet==3 ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{isset($profile->feet) && $profile->feet==4 ? 'selected' : ''}}>4</option>
                                                            <option value="5" {{isset($profile->feet) && $profile->feet==5 ? 'selected' : ''}}>5</option>
                                                            <option value="6" {{isset($profile->feet) && $profile->feet==6 ? 'selected' : ''}}>6</option>
                                                            <option value="7" {{isset($profile->feet) && $profile->feet==7 ? 'selected' : ''}}>7</option>
                                                            <option value="8" {{isset($profile->feet) && $profile->feet==8 ? 'selected' : ''}}>8</option>
                                                            <option value="9" {{isset($profile->feet) && $profile->feet==9 ? 'selected' : ''}}>9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Height (Inches)</label>
                                                        <select name="height" class="form-control" placeholder="{{strtoupper('Height')}}" id="" required>
                                                            <option value="">Select Height in Inches</option>
                                                            <option value="0" {{isset($profile->height) && $profile->height==0 ? 'selected' : ''}}>0</option>
                                                            <option value="1" {{isset($profile->height) && $profile->height==1 ? 'selected' : ''}}>1</option>
                                                            <option value="2" {{isset($profile->height) && $profile->height==2 ? 'selected' : ''}}>2</option>
                                                            <option value="3" {{isset($profile->height) && $profile->height==3 ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{isset($profile->height) && $profile->height==4 ? 'selected' : ''}}>4</option>
                                                            <option value="5" {{isset($profile->height) && $profile->height==5 ? 'selected' : ''}}>5</option>
                                                            <option value="6" {{isset($profile->height) && $profile->height==6 ? 'selected' : ''}}>6</option>
                                                            <option value="7" {{isset($profile->height) && $profile->height==7 ? 'selected' : ''}}>7</option>
                                                            <option value="8" {{isset($profile->height) && $profile->height==8 ? 'selected' : ''}}>8</option>
                                                            <option value="9" {{isset($profile->height) && $profile->height==9 ? 'selected' : ''}}>9</option>
                                                            <option value="10" {{isset($profile->height) && $profile->height==10 ? 'selected' : ''}}>10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-15">Weight (lbs)</label>
                                                    <div class="form-holder">
                                                        <input type="number" name="weight" id="weight" onkeypress="return /^\d*$/i.test(event.key)" oninput="return /^\d*$/i.test(event.key)" ondrop="return /^\d*$/i.test(event.key)" value="{{$profile->weight ?? ''}}" placeholder="{{strtoupper('Weight in lbs')}}" class="form-control" min="0" max="400">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-holder">
                                                <label class="font-15">Eyes</label>
                                                <select name="eyes" class="form-control" placeholder="{{strtoupper('Eye Color')}}" id="" required>
                                                    <option value="">Select Eye Color</option>
                                                    <option value="brown" {{isset($profile->eyes) && $profile->eyes=="brown" ? 'selected' : ''}}>Brown Eyes</option>
                                                    <option value="blue" {{isset($profile->eyes) && $profile->eyes=="blue" ? 'selected' : ''}}>Blue Eyes </option>
                                                    <option value="hazel" {{isset($profile->eyes) && $profile->eyes=="hazel" ? 'selected' : ''}}>Hazel Eyes </option>
                                                    <option value="amber" {{isset($profile->eyes) && $profile->eyes=="amber" ? 'selected' : ''}}>Amber Eyes</option>
                                                    <option value="gray" {{isset($profile->eyes) && $profile->eyes=="gray" ? 'selected' : ''}}>Gray Eyes</option>
                                                    <option value="green" {{isset($profile->eyes) && $profile->eyes=="green" ? 'selected' : ''}}>Green Eyes</option>
                                                    <option >Fill-in Other</option>
                                                </select>
                                            </div>

                                            <div class="form-holder ">
                                                <label class="font-15">Hair</label>
                                                <select name="hairs" class="form-control" placeholder="{{strtoupper('Hair Color')}}" id="" required>
                                                    <option value="">Select Hair Color</option>
                                                    <option value="black" {{isset($profile->hairs) && $profile->hairs=="black" ? 'selected' : ''}}>Black hair</option>
                                                    <option value="brown" {{isset($profile->hairs) && $profile->hairs=="brown" ? 'selected' : ''}}>Brown hair</option>
                                                    <option value="red" {{isset($profile->hairs) && $profile->hairs=="red" ? 'selected' : ''}}>Red hair</option>
                                                    <option value="grey" {{isset($profile->hairs) && $profile->hairs=="grey" ? 'selected' : ''}}>Grey hair</option>
                                                    <option value="white" {{isset($profile->hairs) && $profile->hairs=="white" ? 'selected' : ''}}>White hair</option>
                                                    <option value="blonde" {{isset($profile->hairs) && $profile->hairs=="blonde" ? 'selected' : ''}}>Blonde hair</option>
                                                </select>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Chest</label>
                                                        <input type="number" value="{{$profile->chest ?? ''}}" onkeypress="return /^\d*$/i.test(event.key)" oninput="return /^\d*$/i.test(event.key)" ondrop="return /^\d*$/i.test(event.key)" name="chest" placeholder="{{strtoupper('Chest (inches)')}}" class="form-control" min="0" max="124">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Neck</label>
                                                        <input type="number" name="neck" value="{{$profile->neck ?? ''}}" onkeypress="return /^\d*$/i.test(event.key)" oninput="return /^\d*$/i.test(event.key)" ondrop="return /^\d*$/i.test(event.key)" placeholder="{{strtoupper('Neck (inches) (Men only)')}}" class="form-control" min="0" max="50">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Waist</label>
                                                        <input type="number" name="waist" value="{{$profile->waist ?? ''}}" onkeypress="return /^\d*$/i.test(event.key)" oninput="return /^\d*$/i.test(event.key)" ondrop="return /^\d*$/i.test(event.key)" placeholder="{{strtoupper('Waist (inches)')}}" class="form-control" min="0" max="100">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Sleeves</label>
                                                        <input type="number" name="sleves" value="{{$profile->sleves ?? ''}}" onkeypress="return /^\d*$/i.test(event.key)" oninput="return /^\d*$/i.test(event.key)" ondrop="return /^\d*$/i.test(event.key)" placeholder="{{strtoupper('Sleeve (inches) (Men only)')}}" class="form-control" min="0" max="50">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="" placeholder="Chest (inches)" class="form-control">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Shoe</label>
                                                        <input type="number" name="shoes" value="{{$profile->shoes ?? ''}}" onkeypress="return /^\d*$/i.test(event.key)" oninput="return /^\d*$/i.test(event.key)" ondrop="return /^\d*$/i.test(event.key)" placeholder="{{strtoupper('Shoe size')}}" class="form-control" min="0" max="100">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <label class="font-15">Body Type</label>
                                                        <select name="body_type" class="form-control" placeholder="{{strtoupper('Hair Color')}}" id="" required>
                                                            <option>Select Body type</option>
                                                            <option value="average" {{isset($profile->body_type) && $profile->body_type=="average" ? 'selected' : ''}}>Average</option>
                                                            <option value="slim" {{isset($profile->body_type) && $profile->body_type=="slim" ? 'selected' : ''}}>Slim</option>
                                                            <option value="muscular" {{isset($profile->body_type) && $profile->body_type=="muscular" ? 'selected' : ''}}>Muscular</option>
                                                            <option value="curvy" {{isset($profile->body_type) && $profile->body_type=="curvy" ? 'selected' : ''}}>Curvy</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </form>
                                </section>

                                <!-- SECTION 3 -->
                                {{-- <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Contact & Address</h4>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <input type="text" name="address_1" value="{{$profile->address_1 ?? ''}}" placeholder="{{strtoupper('Address 1')}}" class="form-control" required>
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" name="address_2" value="{{$profile->address_2 ?? ''}}" placeholder="{{strtoupper('Address 2')}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-holder">
                                                <input type="text" id="zip" name="zip" value="{{$profile->zip ?? ''}}" placeholder="{{strtoupper('Zip Code')}}" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" name="country" value="{{$profile->country ?? ''}}" placeholder="{{strtoupper('Country')}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-holder">
                                                <input type="text" name="state" value="{{$profile->state ?? ''}}" placeholder="{{strtoupper('State')}}" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" name="city" value="{{$profile->city ?? ''}}" placeholder="{{strtoupper('City')}}" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <input type="text" name="telephone" value="{{$profile->telephone ?? ''}}" placeholder="{{strtoupper('Telephone')}}" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" name="mobile" value="{{$profile->mobile ?? ''}}" placeholder="{{strtoupper('Mobile')}}" class="form-control">
                                            </div>
                                        </div>
                                    </form>
                                </section> --}}

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Experience: Films</h4>
                                        <input type="hidden" name="type" value="films">
                                        
                                        @php
                                            $expr=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','films') : null):null;
                                        @endphp
                                        
                                        <div id="Films" data-start="{{!is_null($expr)?$expr->count() :0}}" class="repeater">
                                        <!-- Repeater Heading -->
                                        
                                        <!-- Repeater Items -->
                                            @if (!is_null($expr))
                                                @foreach ($expr as $key => $exp)
                                                    <div class="items" data-group="experience">
                                                        
                                                        <div class="form-row">
                                                            <div class="form-holder" style="flex:1">
                                                                <label for="">{{strtoupper('Name')}}</label>
                                                                <input type="text" placeholder="" data-name="name" value="{{$exp->name}}" name="experience[{{$key}}][name]" class="form-control limit_char">
                                                            </div>
                                                            <div class="form-holder" style="flex:1">
                                                                <label for="">{{strtoupper('Role')}}</label>
                                                                <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$key}}][role]" placeholder="" class="form-control limit_char">
                                                            </div>
                                                            <div class="form-holder" style="flex:2">
                                                                <label for="">{{strtoupper('Director or Production Company')}}</label>
                                                                <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$key}}][production]" placeholder="" class="form-control limit_char">
                                                            </div>
                                                            <div class="form-holder" style="flex:1">
                                                                      <label for="" style="display:block">&nbsp;</label>
                                                                        <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                                            <i class="mdi mdi-close"></i>
                                                                        </button>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                                
                                            <div class="items" data-group="experience">
                                                
                                                <div class="form-row">
                                                    <div class="form-holder"  style="flex:1">
                                                        <label for="">{{strtoupper('NAME')}}</label>
                                                        <input type="text" placeholder="" data-name="name" {{-- name="experience[{{$expr->count() ?? 0}}][name]" --}} class="form-control limit_char">
                                                    </div>
                                                    <div class="form-holder" style="flex:1">
                                                        <label for="">{{strtoupper('ROLE')}}</label>
                                                        <input type="text" data-name="role" placeholder=""{{--  name="experience[{{$expr->count() ?? 0}}][role]" --}} class="form-control limit_char">
                                                    </div>
                                                    <div class="form-holder" style="flex:2">
                                                        <label for="">{{strtoupper('DIRECTOR or PRODUCTION COMPANY')}}</label>
                                                        <input type="text" data-name="production" placeholder=""{{--  name="experience[{{$expr->count() ?? 0}}][production]" --}} class="form-control limit_char">
                                                    </div>
                                                    <div class="form-holder" style="flex:1">
                                                           <label for="" style="display:block">&nbsp;</label>
                                                            <button onclick="$(this).parents('.items').remove();window.changeDetected = true" data-removeindex="0" type="button" class="btn btn-danger remove-btn btn-small" disabled="disabled">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        

                                        <div class="repeater-heading">
                                            <button type="button" class="btn btn-primary btn-small repeater-add-btn">
                                                Add
                                            </button>
                                            
                                        </div>

                                        </div>
                                    </form>
                                    
                                     
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Experience: Theater</h4>
                                        <input type="hidden" name="type" value="theater">
                                        <!-- Repeater Heading -->
                                        @php
                                            $expr_theater=array();
                                            $expr_theater=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','theater') : null):null;
                                        @endphp

                                        <div id="Theater" data-start="{{!is_null($expr_theater) ?$expr_theater->count() : 0}}" class="repeater">
                                        <!-- Repeater Items -->
                                        @if (!is_null($expr_theater))
                                            @foreach ($expr_theater as $key2 => $exp)
                                            
                                                <div class="items" data-group="experience">
                                                    
                                                    <div class="form-row">
                                                        <div class="form-holder"  style="flex:1">
                                                            <label for="">Name</label>
                                                            <input type="text" placeholder="" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">Role</label>
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">Production</label>
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                               <label for="" style="display:block">&nbsp;</label>
                                                                <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                                    <i class="mdi mdi-close"></i>
                                                                </button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                            
                                        <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">Name</label>
                                                    <input type="text" data-name="name"{{--  name="experience[{{$expr_theater->count() ?? 0}}][name]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">Role</label>
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_theater->count() ?? 0}}][role]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">Production</label>
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_theater->count() ?? 0}}][production]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                       <label for="" style="display:block">&nbsp;</label>
                                                        <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" data-removeindex="0" class="btn btn-danger remove-btn btn-small" disabled="disabled">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="repeater-heading">
                                            <button type="button" class="btn btn-primary btn-small repeater-add-btn">
                                                Add
                                            </button>
                                            
                                        </div>

                                        </div>
                                    </form>
                                                                         
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Experience: Television</h4>
                                        <input type="hidden" name="type" value="television">
                                        @php
                                            $expr_tele=array();
                                            $expr_tele=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','television') : null) : null;
                                        @endphp
                                        <div id="Television" data-start="{{!is_null($expr_tele) ? $expr_tele->count() : 0}}" class="repeater">
                                        <!-- Repeater Heading -->
                                        <!-- Repeater Items -->
                                        @if (!is_null($expr_tele) )
                                            @foreach ($expr_tele as $key3 => $exp)
                                                <div class="items" data-group="experience">
                                                    
                                                    <div class="form-row">
                                                        <div class="form-holder"  style="flex:1">
                                                            <label for="">{{strtoupper('Name')}}</label>
                                                            <input type="text" placeholder="" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">{{strtoupper('Role')}}</label>
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">{{strtoupper('Production')}}</label>
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                               <label for="" style="display:block">&nbsp;</label>
                                                                <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                                    <i class="mdi mdi-close"></i>
                                                                </button>
                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                        <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Name')}}</label>
                                                    <input type="text" data-name="name" {{-- name="experience[{{$expr_tele->count() ?? 0}}][name]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Role')}}</label>
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_tele->count() ?? 0}}][role]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Location')}}</label>
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_tele->count() ?? 0}}][production]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                       <label for="" style="display:block">&nbsp;</label>
                                                        <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" data-removeindex="0" class="btn btn-danger remove-btn btn-small" disabled="disabled">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="repeater-heading">
                                            <button type="button" class="btn btn-primary btn-small repeater-add-btn">
                                                Add
                                            </button>
                                            
                                        </div>

                                        </div>
                                    </form>                                  
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Experience: Commercials</h4>
                                        <input type="hidden" name="type" value="commercials">
                                        @php
                                            $expr_comm=array();
                                            $expr_comm=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','commercials') : null) : null;
                                        @endphp
                                        <div id="Commercials" data-start="{{!is_null($expr_comm) ? $expr_comm->count() : 0}}" class="repeater">
                                        <!-- Repeater Heading -->
                                        <!-- Repeater Items -->
                                        @if (!is_null($expr_comm))
                                            @foreach ($expr_comm as $key => $exp)
                                                <div class="items" data-group="experience">
                                                    
                                                    <div class="form-row">
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">{{strtoupper('Name of Commercial')}}</label>
                                                            <input type="text" placeholder="" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">{{strtoupper('Role Played')}}</label>
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:2">
                                                            <label for="">{{strtoupper('Director or Production Company')}}</label>
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                               <label for="" style="display:block">&nbsp;</label>
                                                                <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                                <i class="mdi mdi-close"></i>
                                                            </button>
                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                        
                                        <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder" style="flex:1">
                                                <label for="">{{strtoupper('Name of Commercial')}}</label>                     
                                                    <input type="text" data-name="name" {{-- name="experience[{{$expr_comm->count() ?? 0}}][name]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Role Played')}}</label>
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_comm->count() ?? 0}}][role]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                
                                                <div class="form-holder" style="flex:2">
                                                    <label for="">{{strtoupper('Director or Production Company')}}</label>
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_comm->count() ?? 0}}][production]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                
                                                <div class="form-holder" style="flex:1">
                                                       <label for="" style="display:block">&nbsp;</label>
                                                        <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" data-removeindex="0" class="btn btn-danger remove-btn btn-small" disabled="disabled">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="repeater-heading">
                                            <button type="button" class="btn btn-primary btn-small repeater-add-btn">
                                                Add
                                            </button>
                                            
                                        </div>

                                        </div>
                                    </form>
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                        <h4 class="text__quote mb-5">Experience: Training</h4>
                                        <input type="hidden" name="type" value="training">
                                        @php
                                            $expr_train=array();
                                            $expr_train=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','training') : null) : null;
                                        @endphp
                                        <div id="Training" data-start="{{!is_null($expr_train) ? $expr_train->count() : 0}}" class="repeater">
                                        <!-- Repeater Heading -->
                                        <!-- Repeater Items -->
                                        @if (!is_null($expr_train))
                                            @foreach ($expr_train as $key => $exp)
                                                <div class="items" data-group="experience">
                                                    
                                                    <div class="form-row">
                                                        <div class="form-holder"  style="flex:1">
                                                            <label for="">{{strtoupper('Training Class')}}</label>
                                                            <input type="text" placeholder="" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">{{strtoupper('Instructor')}}</label>
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                            <label for="">{{strtoupper('Training Company')}}</label>
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="" class="form-control limit_char">
                                                        </div>
                                                        <div class="form-holder" style="flex:1">
                                                               <label for="" style="display:block">&nbsp;</label>
                                                                <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                                    <i class="mdi mdi-close"></i>
                                                                </button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                        
                                        <div class="items" data-group="experience">

                                            <div class="form-row">              
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Training Class')}}</label>
                                                    <input type="text" data-name="name" {{-- name="experience[{{$expr_train->count() ?? 0}}][name]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Instructor')}}</label>
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_train->count() ?? 0}}][role]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                                <div class="form-holder" style="flex:1">
                                                    <label for="">{{strtoupper('Training Company')}}</label>
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_train->count() ?? 0}}][production]" --}} placeholder="" class="form-control limit_char">
                                                </div>
                                            
                                                <div class="form-holder" style="flex:1">
                                                       <label for="" style="display:block">&nbsp;</label>
                                                        <button onclick="$(this).parents('.items').remove();window.changeDetected = true" type="button" data-removeindex="0" class="btn btn-danger remove-btn btn-small" disabled="disabled">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="repeater-heading">
                                            <button type="button" class="btn btn-primary btn-small repeater-add-btn">
                                                Add
                                            </button>
                                            
                                        </div>

                                        </div>
                                    </form>
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <form method="POST">
                                    <h4 class="text__quote mb-5">Specials Skills</h4>
                                    @php
                                        $cand_skills="";
                                        if (isset(auth()->user()->skills)) {
                                            $cand_skills=auth()->user()->skills->pluck('skill_id')->toArray();
                                            
                                        }
                                        
                                    @endphp
                                    
                                    @foreach($skills as $key=> $skill)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="flat" name="skills[]" value="{{$skill->id}}" {{isset($profile) && $cand_skills !=="" && in_array("$skill->id",$cand_skills)?'checked':''}}> {{$skill->title}}
                                        </label>
                                    @endforeach

                                    </form>

                                </section>

                        </div>
                </div>

            </div>

        </div>
    </section><!-- Services Section End -->
    
@endsection
@section('scripts')
<script>
    window.currentStep = 0;
    window.changeDetected = false;
    function nextCallback(addBtn,currentStep){

        if(addBtn == true){
            if($('#wizard-p-'+currentStep+' .repeater-add-btn:not(.btn-danger)')){
                $('#wizard-p-'+currentStep+' .repeater-add-btn:not(.btn-danger)').click();
            }
        }

         if ($('#wizard-p-' + currentStep + ' >form').valid()) 
        {

            var formDataa=new FormData($('section[aria-hidden="false"] > form')[0]);
            console.log($('section[aria-hidden="false"] > form')[0]);
            console.log('next callback running');
            @if ($profile)
                formDataa.append('method', 'PUT');
                formDataa.append('profile_id', "{{$profile->id}}");
            @endif
            
            /* console.log(params); */
            if ($('#link_error').is(":visible")) {
                $('#custom_link').val('');
            }

            if(window.changeDetected){
                $.ajax({
                    url: "{{ route('account.talent-profile.store') }}",
                    contentType: false,
                    processData: false,
                    
                    type: 'POST',
                    data:formDataa,
                    success: function(res) {
                       
                        if (res.alert_type=='success') {
                            toastr.success(res.message);
                            if (res.method) {
                                $('section >form').append('<input type="hidden" value='+res.method+' name="method"/>');
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(error) {
                    }
                });
            }
            window.changeDetected = false;
        }
    }
</script>
<script src="{{ asset('plugins/steps/js/jquery.steps.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{ asset('plugins/steps/js/main.js') }}"></script>
<script src="{{ asset('/js/repeater.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    $(document).ready(function() {

       $("#Films").createRepeater({showItemsToDefault: true,showItemsToDefault: true,startIndex:$("#Films").data('start')});
       $("#Theater").createRepeater({showItemsToDefault: true,startIndex:$("#Theater").data('start')});
       $("#Commercials").createRepeater({showItemsToDefault: true,startIndex:$("#Commercials").data('start')});
       $("#Television").createRepeater({showItemsToDefault: true,startIndex:$("#Television").data('start')});
       $("#Training").createRepeater({showItemsToDefault: true,startIndex:$("#Training").data('start')});
       /* $('.repeater-add-btn').trigger('click'); */

       $('#wizard form').find('input,select,textarea').change(function(){
            
            window.changeDetected = true;
        });
        
       $('.repeater-add-btn').click(function(){
            $(this).siblings('.btn').hide();
        });

       jQuery("#zip").blur(function() {
            $.ajax({
                type: "GET",
                beforeSend: function(request) {
                    request.setRequestHeader("x-key", "afc92938e47b63ec399195c137e01fa20ca48439");
                },
                url: "//zip.getziptastic.com/v3/US/48867",
                success: function(data) {
                    console.log(data);
                }
            });
        });

        $('#legal_first_name, #legal_last_name').on('keyup',function(){
            $("#custom_link").val($('#legal_first_name').val()+'-'+$('#legal_last_name').val());
            $('#custom_link').trigger('change');
        })

        // $('#custom_link').on('keyup change',function(e){
        //     $('#link_suggestion').hide();
            
        //     if ($(this).val() !=='') {
        //         if(e.keyCode == 189)
        //         {
        //            var textValue =$(this).val().replace(/_/g,"-");
        //             $(this).val(textValue);
        //         }
        //         else{
        //             $.ajax({
        //                 url: "{{ route('account.talent.checkCustomLink') }}", --}}
        //                 type: 'GET',
        //                 data:{
        //                     'link':$(this).val()
        //                 },
        //                 success: function(res) {
        //                     console.log(res);
        //                     if (res.alert_type=='success') {
        //                         $('#link_error').hide();
        //                     } else {
                                
        //                         $('#link_error').html(res.message);
        //                         $('#link_error').show();

        //                         $('#suggestion').html('');
        //                         res.suggestions.forEach(val => {
        //                             $('#suggestion').append(val+'<br>');
        //                         });
        //                         $('#link_suggestion').show();
        //                     }
        //                 },
        //                 error: function(error) {
        //                 }
        //             });
        //         }
                
        //     }
        // })

    });


    
</script>

<script>
    function readURL(input)
    {
        if (typeof (FileReader) != "undefined") {
            
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            
            var date=new Date().toLocaleString();
            
            if (regex.test(input.files[0].name.toLowerCase())) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_img').attr('src',e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                alert(input.files[0].name + " is not a valid image file.");
                
                return false;
            }

            formData.append('profile_img',$('[name="profile_img"]')[0].files.item(0));
            console.log(formData);
            
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
    
    var formData=new FormData();
    $(document).on('change','#profile_img',function () {
        
        readURL(this);
    })
</script>


<script type="text/javascript">




    $(document).on('click','a[href="#finish"]',function(e){
        if ($("#profile_form").valid()) 
        {
            var formDataa=new FormData($('section[aria-hidden="false"] > form')[0]);
            console.log($('section[aria-hidden="false"] > form')[0]);

            @if ($profile)
                formDataa.append('method', 'PUT');
                formDataa.append('profile_id', "{{$profile->id}}");
            @endif
            

            $.ajax({
                url: "{{ route('account.talent-profile.store') }}",
                contentType: false,
                processData: false,
                
                type: 'POST',
                data:formDataa,
                success: function(res) {
                    console.log(res);
                    if (res.alert_type=='success') {
                        toastr.success(res.message);
                        window.location='{{route('account.dashboard')}}';
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function(error) {
                }
            });
        }
        
        
    })

</script>

<script>
    $(document).ready(function(){
        $('.actions ul').append("<li class='ml-auto' id='finish_btn'><a href='javascript:;'>Finish</a></li>");
        $('a[href="#next"]').parent().addClass('ml-auto');
        $('a[href="#finish"]').parent().addClass('ml-auto');
    })

    $(document).on('click','#finish_btn',function(){
       
        if($('#wizard-p-'+window.currentStep+' .repeater-add-btn:not(.btn-danger)')){
            $('#wizard-p-'+window.currentStep+' .repeater-add-btn:not(.btn-danger)').click();
        }
        $('a[href="#next"]').click();
        window.location='{{route('account.dashboard')}}';
    })
</script>

<script>
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
            });
        };
    }(jQuery));

    $(document).on('input','.limit_char',function(){
        var max_chars = 50;

        if($(this).val().length > max_chars) {
            $(this).val($(this).val().substr(0, max_chars)) ;
        }
    })

    /* $(document).ready(function(){

        $("#weight").inputFilter( function(value) {
            return /^\d*$/.test(value);
        });
    }); */
</script>

@endsection