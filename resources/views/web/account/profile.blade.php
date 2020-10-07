@extends('web.layouts.app')

@section('styles')

 
<style type="text/css">
button.btn.btn__red.animation.btn-half.pull-right {
    margin-bottom: 20px;
}
.btn-half {
    width: 30%;
}

</style>

<link rel="stylesheet" href="{{ asset('plugins/steps/css/style.css') }}">

@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="page__subtitle title__grey">Profile</div>
                    <h1 class="page__title">Update Profile</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">Fill the below form</h3>
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
                                                <img src="{{ url('/') }}/plugins/steps/images/avartar.png" alt="">
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
                                                <input type="text" placeholder="First Name" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" placeholder="Last Name" class="form-control">
                                            </div>
                                            <div class="form-holder">
                                                <input type="text" placeholder="Team Name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-holder">
                                        <input type="text" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-holder">
                                        <input type="password" placeholder="Create a password" class="form-control">
                                    </div>
                                </section>
                                
                                <!-- SECTION 2 -->
                                <h4></h4>
                                <section>
                                     <h4 class="text__quote mb-5">Body Detail</h4>
                                     <div class="form-group">
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-holder active">
                                                        <input type="text" placeholder="Height" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-holder">
                                                        <input type="text" placeholder="Weight" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="form-holder ">
                                                <select name="" class="form-control" placeholder="Hair" id="">
                                                    <option value="">Brown</option>
                                                </select>
                                            </div>
                                            <div class="form-holder ">
                                                <select name="" class="form-control" placeholder="Eyes" id="">
                                                    <option value="">Brown</option>
                                                </select>
                                            </div>
                                        </div>
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Contact & Address</h4>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" placeholder="Telephone" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" placeholder="Mobile" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" placeholder="Street Name" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" placeholder="Street Number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" placeholder="State" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <input type="text" placeholder="Zip Code" class="form-control">
                                        </div>
                                        <div class="form-holder">
                                            <input type="text" placeholder="Country" class="form-control">
                                        </div>
                                    </div>
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Films</h4>

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
                                      </div>

                                    </div>
                                     
                                    
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Theater</h4>

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
                                      </div>

                                    </div>
                                     
                                    
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Television</h4>

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
                                      </div>

                                    </div>
                                     
                                    
                                </section>


                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Commercials</h4>

                                    <div id="Commercials" class="repeater">
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
                                     
                                    
                                </section>

                                <!-- SECTION 3 -->
                                <h4></h4>
                                <section>
                                    <h4 class="text__quote mb-5">Training</h4>

                                    <div id="Training" class="repeater">
                                      <!-- Repeater Heading -->
                                      
                                      <!-- Repeater Items -->
                                      
                                          <div class="items" data-group="test">

                                            <div class="form-row">
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Course" class="form-control">
                                                </div>
                                                <div class="form-holder">
                                                    <input type="text" placeholder="Role" class="form-control">
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
    });
</script>

@endsection