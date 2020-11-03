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
                    <form action="">
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
                                                <input type="file" name="file-1[]" id="file-1" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                                                <label for="file-1">
                                                    <i class="zmdi zmdi-camera"></i>
                                                    <span>Choose Picture</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-holder active">
                                                <input type="text" placeholder="Legal First Name" name="legal_first_name" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" placeholder="Legal Last Name" name="legal_last_name" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="email" placeholder="Email" name="email" class="form-control">
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
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <select name="feet" class="form-control" placeholder="Feet" id="" required>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" placeholder="Weight in lbs" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                             
                                            <div class="form-holder">
                                                <select name="eyes" class="form-control" placeholder="Eye Color" id="" required>
                                                    <option>Brown Eyes</option>
                                                    <option>Blue Eyes </option>
                                                    <option>Hazel Eyes </option>
                                                    <option>Amber </option>
                                                    <option>Gray </option>
                                                    <option>Green </option>
                                                    <option>Fill-in Other</option>
                                                </select>
                                            </div>
                                            <div class="form-holder ">
                                                <select name="hairs" class="form-control" placeholder="Hair Color" id="" required>
                                                    <option>Black</option>
                                                    <option>Brown</option>
                                                    <option>Red</option>
                                                    <option>Grey</option>
                                                    <option>White</option>
                                                    <option>Blonde</option>
                                                </select>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="chest" placeholder="Chest (inches)" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="neck" placeholder="Neck (inches) (Men only)" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="waist" placeholder="Waist (inches)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="sleves" placeholder="Sleeve (inches) (Men only)" class="form-control">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="" placeholder="Chest (inches)" class="form-control">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-4">
                                                    <div class="form-holder">
                                                        <input type="text" name="shoes" placeholder="Shoe size" class="form-control">
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
                                            <input type="text" name="address_1" placeholder="Address 1" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="address_2" placeholder="Address 2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" id="zip" name="zip" placeholder="Zip Code" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="country" placeholder="Country" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" name="state" placeholder="State" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="city" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" name="telephone" placeholder="Telephone" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" name="mobile" placeholder="Mobile" class="form-control">
                                        </div>
                                    </div>

                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Experience: Films</h4>

                                    <div id="Films" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="test">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Role" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Production" class="form-control">
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

                                    <div id="Theater" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="test">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Role" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Location" class="form-control">
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

                                    <div id="Television" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="test">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Role" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Location" class="form-control">
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

                                    <div id="Commercials" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="test">

                                            <div class="form-row">
                                                <div class="form-holder">                     
                                                    <input type="text" placeholder="Commercial" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Role" class="form-control">
                                                </div>
                                                 
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Production Company or Director" class="form-control">
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

                                    <div id="Training" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="test">

                                            <div class="form-row">              
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Training Class" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Instructor" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Training Company" class="form-control">
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

                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Basketball
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Baseball
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Golf
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Rollerblading
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Juggling
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Scuba (PADI certified)
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Valid Driver’s License and U.S. Passport
                                    </label>

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

    });


    
</script>


<script type="text/javascript">

    


    
</script>

@endsection