@extends('web.layouts.app')

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

</style>

<link rel="stylesheet" href="{{ asset('plugins/steps/css/style.css') }}">

@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    {{-- <div class="page__subtitle title__grey">Profile</div> --}}
                    <h1 class="page__title">PROFILE INFORMATION</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">Complete your profile form</h3>
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
                                        <h4 class="text__quote mb-5">Basic</h4>
                                        <div class="form-header">
                                            <div class="avartar">
                                                <a href="#">
                                                <div class="profile-sec ml-5 mb-4">
                                                        <img src="{{ asset(is_null($profile) || is_null($profile->profile_img) ? 'public/web/img/user.png': ('storage/uploads/profile/'.$profile->profile_img)) }}" id="preview_img" class="img img-responsive tal-profile">
                                                    </div>
                                                </a>
                                                <div class="avartar-picker">
                                                    <input type="file" name="profile_img" id="profile_img" class="inputfile" data-multiple-caption="{count} files selected" multiple/>
                                                    <label for="profile_img">
                                                        <i class="zmdi zmdi-camera"></i>
                                                        <span>Choose Picture</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-holder active">
                                                    <input type="text" placeholder="{{strtoupper('Legal First Name')}}" name="legal_first_name" value="{{$profile->legal_first_name ??''}}" class="form-control required">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="{{strtoupper('Legal Last Name')}}" name="legal_last_name" value="{{$profile->legal_last_name?? ''}}" class="form-control required">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="email" placeholder="{{strtoupper('Email')}}" name="email" class="form-control required" value="{{$profile->email ?? ''}}">
                                                </div>

                                                @if ($custom_url)
                                                    <div class="form-holder">
                                                        <div class="input-group-bs mb-3">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text-bs" id="basic-addon3">{{url('/').'/model/'}}</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="custom_link" value="{{$profile->custom_link ?? ''}}" id="custom_link" aria-describedby="basic-addon3">
                                                        </div>
                                                        <small id="link_error" style="color: red"></small>
                                                    </div>
                                                @endif
                                                
                                                
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
                                                    <div class="form-holder">
                                                        <input type="text" name="weight"  value="{{$profile->weight ?? ''}}" placeholder="{{strtoupper('Weight in lbs')}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-holder">
                                                <select name="eyes" class="form-control" placeholder="{{strtoupper('Eye Color')}}" id="" required>
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
                                                <select name="hairs" class="form-control" placeholder="{{strtoupper('Hair Color')}}" id="" required>
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
                                                        <input type="text" value="{{$profile->chest ?? ''}}" name="chest" placeholder="{{strtoupper('Chest (inches)')}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="neck" value="{{$profile->neck ?? ''}}" placeholder="{{strtoupper('Neck (inches) (Men only)')}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="waist" value="{{$profile->waist ?? ''}}" placeholder="{{strtoupper('Waist (inches)')}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="sleves" value="{{$profile->sleves ?? ''}}" placeholder="{{strtoupper('Sleeve (inches) (Men only)')}}" class="form-control">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="" placeholder="Chest (inches)" class="form-control">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="shoes" value="{{$profile->shoes ?? ''}}" placeholder="{{strtoupper('Shoe size')}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </form>
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
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
                                </section>

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
                                                            <div class="form-holder" >
                                                                <input type="text" placeholder="{{strtoupper('Name')}}" data-name="name" value="{{$exp->name}}" name="experience[{{$key}}][name]" class="form-control">
                                                            </div>
                                                            <div class="form-holder">
                                                                <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$key}}][role]" placeholder="{{strtoupper('Role')}}" class="form-control">
                                                            </div>
                                                            <div class="form-holder">
                                                                <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$key}}][production]" placeholder="{{strtoupper('Director or Production Company')}}" class="form-control">
                                                            </div>
                                                            <div class="form-holder">
                                                                <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                                <i class="mdi mdi-close"></i>
                                                            </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                                
                                            <div class="items" data-group="experience">
                                                
                                                <div class="form-row">
                                                    <div class="form-holder" >
                                                        <input type="text" placeholder="{{strtoupper('NAME')}}" data-name="name" {{-- name="experience[{{$expr->count() ?? 0}}][name]" --}} class="form-control">
                                                    </div>
                                                    <div class="form-holder">
                                                        <input type="text" data-name="role" placeholder="{{strtoupper('ROLE')}}"{{--  name="experience[{{$expr->count() ?? 0}}][role]" --}} class="form-control">
                                                    </div>
                                                    <div class="form-holder">
                                                        <input type="text" data-name="production" placeholder="{{strtoupper('DIRECTOR or PRODUCTION COMPANY')}}"{{--  name="experience[{{$expr->count() ?? 0}}][production]" --}} class="form-control">
                                                    </div>
                                                    <div class="form-holder">
                                                        <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
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
                                                        <div class="form-holder" >
                                                            <input type="text" placeholder="Name" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="Role" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="Production" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                            
                                        <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" data-name="name"{{--  name="experience[{{$expr_theater->count() ?? 0}}][name]" --}} placeholder="{{strtoupper('Name of the Production')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_theater->count() ?? 0}}][role]" --}} placeholder="{{strtoupper('Role Played')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_theater->count() ?? 0}}][production]" --}} placeholder="{{strtoupper('Director or Venue')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
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
                                                        <div class="form-holder" >
                                                            <input type="text" placeholder="{{strtoupper('Name')}}" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="{{strtoupper('Role')}}" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="{{strtoupper('Production')}}" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                        <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" data-name="name" {{-- name="experience[{{$expr_tele->count() ?? 0}}][name]" --}} placeholder="{{strtoupper('Name')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_tele->count() ?? 0}}][role]" --}} placeholder="{{strtoupper('Role')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_tele->count() ?? 0}}][production]" --}} placeholder="{{strtoupper('Location')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
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
                                                        <div class="form-holder" >
                                                            <input type="text" placeholder="{{strtoupper('Name of Commercial')}}" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="{{strtoupper('Role Played')}}" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="{{strtoupper('Director or Production Company')}}" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                        
                                        <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder">                     
                                                    <input type="text" data-name="name" {{-- name="experience[{{$expr_comm->count() ?? 0}}][name]" --}} placeholder="{{strtoupper('Commercial')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_comm->count() ?? 0}}][role]" --}} placeholder="{{strtoupper('Role')}}" class="form-control">
                                                </div>
                                                
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_comm->count() ?? 0}}][production]" --}} placeholder="{{strtoupper('Production Company or Director')}}" class="form-control">
                                                </div>
                                                
                                                <div class="form-holder">
                                                    <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
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
                                                        <div class="form-holder" >
                                                            <input type="text" placeholder="{{strtoupper('Training Class')}}" data-name="name" value="{{$exp->name}}" name="experience[{{$loop->index}}][name]" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="role" value="{{$exp->role}}" name="experience[{{$loop->index}}][role]" placeholder="{{strtoupper('Instructor')}}" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <input type="text" data-name="production" value="{{$exp->production}}" name="experience[{{$loop->index}}][production]" placeholder="{{strtoupper('Training Company')}}" class="form-control">
                                                        </div>
                                                        <div class="form-holder">
                                                            <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                        
                                        <div class="items" data-group="experience">

                                            <div class="form-row">              
                                                <div class="form-holder">
                                                    <input type="text" data-name="name" {{-- name="experience[{{$expr_train->count() ?? 0}}][name]" --}} placeholder="{{strtoupper('Training Class')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" {{-- name="experience[{{$expr_train->count() ?? 0}}][role]" --}} placeholder="{{strtoupper('Instructor')}}" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" {{-- name="experience[{{$expr_train->count() ?? 0}}][production]" --}} placeholder="{{strtoupper('Training Company')}}" class="form-control">
                                                </div>
                                            
                                                <div class="form-holder">
                                                    <button onclick="$(this).parents('.items').remove()" type="button" class="btn btn-danger repeater-add-btn btn-small">
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
       $("#Films").createRepeater({showItemsToDefault: true,startIndex:$("#Films").data('start')});
       $("#Theater").createRepeater({showItemsToDefault: true,startIndex:$("#Theater").data('start')});
       $("#Commercials").createRepeater({showItemsToDefault: true,startIndex:$("#Commercials").data('start')});
       $("#Television").createRepeater({showItemsToDefault: true,startIndex:$("#Television").data('start')});
       $("#Training").createRepeater({showItemsToDefault: true,startIndex:$("#Training").data('start')});
       /* $('.repeater-add-btn').trigger('click'); */


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

        $('#custom_link').on('keyup',function(){
            if ($(this).val() !=='') {
                $.ajax({
                    url: "{{ route('account.talent.checkCustomLink') }}",
                    type: 'GET',
                    data:{
                        'link':$(this).val()
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.alert_type=='success') {
                            $('#link_error').hide();
                        } else {
                            
                            $('#link_error').html(res.message);
                            $('#link_error').show();
                        }
                    },
                    error: function(error) {
                    }
                });
            }
        })

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


    $(document).on('click','a[href="#next"]',function(e){
        if ($("#profile_form").valid()) 
        {

            /* $('section[aria-hidden="false"] *').filter(':input').each(function () {
                if( $(this).val().length !== 0 ) {
                    console.log($(this).attr('name')+' => '+ $(this).val());
                    params[$(this).attr('name')]=$(this).val();
                }
            }); */
            var formDataa=new FormData($('section[aria-hidden="false"] > form')[0]);
            console.log($('section[aria-hidden="false"] > form')[0]);

            @if ($profile)
                formDataa.append('method', 'PUT');
                formDataa.append('profile_id', "{{$profile->id}}");
            @endif
            
            /* console.log(params); */
            if ($('#link_error').is(":visible")) {
                $('#custom_link').val('');
            }

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
        
        
    })

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
                        window.location.reload();
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

@endsection