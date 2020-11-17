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
                    <form action="{{route('account.talent-profile.store')}}" method="POST" id="profile_form">
                        @csrf

                        @if ($profile)
                            @method('PUT')
                            <input type="hidden" name="profile_id" value="{{$profile->id}}">
                        @endif
                        <div id="wizard">
                            <!-- SECTION 1 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Basic</h4>
                                    <div class="form-header">
                                        <div class="avartar">
                                            <a href="#">
                                               <div class="profile-sec ml-5 mb-4">
                                                    <img src="{{ asset('web/uploads/profile/talent-2.jpg') }}" class="img img-responsive">
                                                </div>
                                            </a>
                                            <div class="avartar-picker">
                                                <input type="file" name="profile_img[]" id="profile_img" class="inputfile" data-multiple-caption="{count} files selected" multiple/>
                                                <label for="profile_img">
                                                    <i class="zmdi zmdi-camera"></i>
                                                    <span>Choose Picture</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-holder active">
                                                <input type="text" placeholder="Legal First Name" name="legal_first_name" value="{{$profile->legal_first_name ??''}}" class="form-control" required>
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" placeholder="Legal Last Name" name="legal_last_name" value="{{$profile->legal_last_name?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-holder">
                                                <input type="email" placeholder="Email" name="email" class="form-control" value="{{$profile->email ?? ''}}" required>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </section>
                                
                                <!-- SECTION 2 -->
                                <h4></h4>
                                <section>
                                     <h4 class="text__quote mb-5">Body Detail</h4>
                                     <div class="form-group">
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <select name="height" class="form-control" placeholder="Height" id="" required>
                                                            <option value="">select height</option>
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
                                                        <select name="feet" class="form-control" placeholder="Feet" id="" required>
                                                            <option value="">select feet</option>
                                                            <option value="0" {{isset($profile->feet) && $profile->feet==0 ? 'selected' : ''}}>0</option>
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
                                                        <input type="text" name="weight"  value="{{$profile->weight ?? ''}}" placeholder="Weight in lbs" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                             
                                            <div class="form-holder">
                                                <select name="eyes" class="form-control" placeholder="Eye Color" id="" required>
                                                    <option value="brown" {{isset($profile->eyes) && $profile->eyes=="brown" ? 'selected' : ''}}>Brown Eyes</option>
                                                    <option value="blue" {{isset($profile->eyes) && $profile->eyes=="blue" ? 'selected' : ''}}>Blue Eyes </option>
                                                    <option value="hazel" {{isset($profile->eyes) && $profile->eyes=="hazel" ? 'selected' : ''}}>Hazel Eyes </option>
                                                    <option value="amber" {{isset($profile->eyes) && $profile->eyes=="amber" ? 'selected' : ''}}>Amber </option>
                                                    <option value="gray" {{isset($profile->eyes) && $profile->eyes=="gray" ? 'selected' : ''}}>Gray </option>
                                                    <option value="green" {{isset($profile->eyes) && $profile->eyes=="green" ? 'selected' : ''}}>Green </option>
                                                    <option >Fill-in Other</option>
                                                </select>
                                            </div>
                                            <div class="form-holder ">
                                                <select name="hairs" class="form-control" placeholder="Hair Color" id="" required>
                                                    <option value="black" {{isset($profile->hairs) && $profile->hairs=="black" ? 'selected' : ''}}>Black</option>
                                                    <option value="brown" {{isset($profile->hairs) && $profile->hairs=="brown" ? 'selected' : ''}}>Brown</option>
                                                    <option value="red" {{isset($profile->hairs) && $profile->hairs=="red" ? 'selected' : ''}}>Red</option>
                                                    <option value="grey" {{isset($profile->hairs) && $profile->hairs=="grey" ? 'selected' : ''}}>Grey</option>
                                                    <option value="white" {{isset($profile->hairs) && $profile->hairs=="white" ? 'selected' : ''}}>White</option>
                                                    <option value="blonde" {{isset($profile->hairs) && $profile->hairs=="blonde" ? 'selected' : ''}}>Blonde</option>
                                                </select>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" value="{{$profile->chest ?? ''}}" name="chest" placeholder="Chest (inches)" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="neck" value="{{$profile->neck ?? ''}}" placeholder="Neck (inches) (Men only)" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="waist" value="{{$profile->waist ?? ''}}" placeholder="Waist (inches)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="sleves" value="{{$profile->sleves ?? ''}}" placeholder="Sleeve (inches) (Men only)" class="form-control">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="" placeholder="Chest (inches)" class="form-control">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="shoes" value="{{$profile->shoes ?? ''}}" placeholder="Shoe size" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Contact & Address</h4>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" name="address_1" value="{{$profile->address_1 ?? ''}}" placeholder="Address 1" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="address_2" value="{{$profile->address_2 ?? ''}}" placeholder="Address 2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" id="zip" name="zip" value="{{$profile->zip ?? ''}}" placeholder="Zip Code" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="country" value="{{$profile->country ?? ''}}" placeholder="Country" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" name="state" value="{{$profile->state ?? ''}}" placeholder="State" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="city" value="{{$profile->city ?? ''}}" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" name="telephone" value="{{$profile->telephone ?? ''}}" placeholder="Telephone" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="mobile" value="{{$profile->mobile ?? ''}}" placeholder="Mobile" class="form-control">
                                        </div>
                                    </div>

                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Experience: Films</h4>
                                    <input type="hidden" name="type" value="films">
                                    <div id="Films" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="experience">

                                            <div class="form-row">
                                                <div class="form-holder" >
                                                    <input type="text" placeholder="Name" data-name="name" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" placeholder="Role" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" placeholder="Production" class="form-control">
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
                                          <button type="button" class="btn btn-warning btn-small">
                                              None yet. Continue
                                          </button>
                                      </div>

                                    </div>

                                    
                                     
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Experience: Theater</h4>
                                    <input type="hidden" name="type" value="theater">
                                    <div id="Theater" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="experience[]">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" data-name="name" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" placeholder="Role" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" placeholder="Location" class="form-control">
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
                                          <button type="button" class="btn btn-warning btn-small">
                                              None yet. Continue
                                          </button>
                                      </div>

                                    </div>
                                                                         
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Experience: Television</h4>
                                    <input type="hidden" name="type" value="television">
                                    <div id="Television" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="experience[]">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" data-name="name" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" placeholder="Role" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" placeholder="Location" class="form-control">
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
                                          <button type="button" class="btn btn-warning btn-small">
                                              None yet. Continue
                                          </button>
                                      </div>

                                    </div>
                                                                         
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Experience: Commercials</h4>
                                    <input type="hidden" name="type" value="commercials">
                                    <div id="Commercials" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="experience[]">

                                            <div class="form-row">
                                                <div class="form-holder">                     
                                                    <input type="text" data-name="name" placeholder="Commercial" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role"  placeholder="Role" class="form-control">
                                                </div>
                                                 
                                                <div class="form-holder">
                                                    <input type="text" data-name="production"  placeholder="Production Company or Director" class="form-control">
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
                                          <button type="button" class="btn btn-warning btn-small">
                                              None yet. Continue
                                          </button>
                                      </div>

                                    </div>
                                      
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Experience: Training</h4>
                                    <input type="hidden" name="type" value="training">
                                    <div id="Training" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="experience[]">

                                            <div class="form-row">              
                                                <div class="form-holder">
                                                    <input type="text" data-name="name" placeholder="Training Class" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="role" placeholder="Instructor" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" data-name="production" placeholder="Training Company" class="form-control">
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
                                          <button type="button" class="btn btn-warning btn-small">
                                              None yet. Continue
                                          </button>
                                      </div>

                                    </div>
                                     
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Specials Skills</h4>
                                    @php
                                        $cand_skills="";
                                        if (isset(auth()->user()->skills)) {
                                            $cand_skills=auth()->user()->skills->pluck('skill_id')->toArray();
                                            
                                        }
                                        
                                    @endphp
                                    @foreach($skills as $key=> $skill)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="flat" name="skills[]" value="{{$skill->id}}" {{isset($post) && in_array("$skill->id",$cand_skills)?'checked':''}}> {{$skill->title}}
                                        </label>
                                    @endforeach

                                    </form>

                                </section>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- Services Section End -->
    
@endsection
@section('scripts')
<script src="{{ asset('plugins/steps/js/jquery.steps.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{ asset('plugins/steps/js/main.js') }}"></script>
<script src="{{ asset('/js/repeater.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $("#Films").createRepeater();
       $("#Theater").createRepeater();
       $("#Commercials").createRepeater();
       $("#Television").createRepeater();
       $("#Training").createRepeater();
       $('.repeater-add-btn').trigger('click');


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

        /* $('a[href="#finish"]').on('click',function(){
            $('#profile_form').submit();
        }) */

    });


    
</script>


<script type="text/javascript">


    $(document).on('click','a[href="#next"]',function(e){
        if ($("#profile_form").valid()) 
        {
            var params = {};

            @if ($profile)
                params.method = 'PUT';
                params.profile_id = "{{$profile->id}}";
            @endif


            /* console.log($('section[aria-hidden="false"] *').serializeArray()); */
            /* $('section[aria-hidden="false"] *').filter(':input').each(function () {
                if( $(this).val().length !== 0 ) {
                    console.log($(this).attr('name')+' => '+ $(this).val());
                    params[$(this).attr('name')]=$(this).val();
                }
            }); */
            params.experience=$('section[aria-hidden="false"] *').filter(':input').serialize();
            console.log(params);

            $.post( "{{ route('account.talent-profile.store') }}",{
                    _token : "{{ csrf_token() }}",
                    params
                }, function( res ) {
                    if (res.alert_type) {
                        toastr.success(res.message);
                    } else {
                        toastr.error(res.message);
                    }
            });
        }
        
        
    })

    $(document).on('click','a[href="#finish"]',function(e){
        if ($("#profile_form").valid()) 
        {
            var params = {};

            @if ($profile)
                params.method = 'PUT';
                params.profile_id = "{{$profile->id}}";
            @endif

            var skills = $('input[name^=skills]:checked').map(function(idx, elem) {
                return $(elem).val();
            }).get();
            /* console.log($('section[aria-hidden="false"] *').serializeArray()); */
            $.post( "{{ route('account.talent-profile.store') }}",{
                    _token : "{{ csrf_token() }}",
                    params,
                    skills:skills
                }, function( res ) {
                    if (res.alert_type) {
                        toastr.success(res.message);
                    } else {
                        toastr.error(res.message);
                    }
            });
        }
        
        
    })

</script>

@endsection