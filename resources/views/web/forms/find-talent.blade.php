@extends('web.layouts.app')

@section('content')

<section class="page__img" style="background-image: url('img/apply_bg.jpg')">
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
                <h3 class="text__quote centered">Find Actors and Talents for Hire</h3>
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                    <form class="apply-form form-horizontal" method="POST" action="#" id="form-size">
                       @csrf
                        <div class="form-block">
                            <div class="form-group">
                                <label for="f_name" class="col-sm-4 control-label">Search Candidates by names <span class="req">*</span></label>
                                 <div class="col-sm-8">
                               <input class="form-control" id="form-size" type="text" aria-label="Search">
                            </div> 
                        </div>

                         <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">Profile Type</label>
                                <div class="col-sm-8">
                                    <select name="state" id="state" class="form-control form-size">
                                        <option value="AK">Regular</option>
                                        <option value="AZ">Voiceover</option>
                                        <option value="AR">Actors</option>
                                        <option value="CA">Kunfu</option>
                                    </select>
                                </div>
                            </div>

                           <div class="form-group">
                            <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                            <div class="col-sm-8">
                                <select name="gender" id="gender" name = "gender" class="form-control" required>
                                    <option label="Select"></option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="trans">Transgender</option>
                                </select>
                             </div>
                         </div>

                            <div class="form-group">
                                <label for="age" class="col-sm-4 control-label">Age <span class="req">*</span></label>
                                 <div class="col-sm-8">
                              <div class="d-flex justify-content-center my-4">
								  <input type="number" id="age" name="age" class="form-control">
								</div>
                            </div>
                            </div>
                          
                          <div class="form-group">
                                <label for="location" class="col-sm-4 control-label">Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="location" id="location">
                                </div>
                            </div>

                               <div class="form-group">
                            <label for="skills" class="col-sm-4 control-label">Skills <span class="req">*</span></label>
                            <div class="col-sm-8">
                                <select name="skills" id="skills" name = "skills" class="form-control" style="height: 50px" required>
                                  <option>Select</option> 
                                   <option>Skill1</option> 
                                   <option>Skill2</option> 
                                   <option>Skill3</option> 
                                   <option>Skill4</option> 
                                   <option>Skill5</option> 
                                </select>
                             </div>
                         </div>
<br>
                            <div class="form-group">
                                <label for="unionstatus" class="col-sm-4 control-label">Select Union Status<span class="req">*</span></label>
                                <div class="col-sm-8">
								<select class="unionstatus" multiple="true" name="unionstatus" style="width:100%;">
										    <option value="cheese">US1</option>
										<option value="tomatoes">US2</option>
										<option value="mozarella">US3</option>
										<option value="mushrooms">Us4</option>
										<option value="pepperoni">US5</option>
								</select>
                                 </div>
                            </div>  
<br>
                            <div class="form-group">
                                <label for="assets" class="col-sm-4 control-label">Select Availible Assets <span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                <select class="assets" multiple="true" name="assets" style="width:100%;">
                                            <option value="cheese">Photos</option>
                                        <option value="tomatoes">Video</option>
                                        <option value="mozarella">Audio</option>
                                        <option value="mushrooms">Document</option>
                                        <option value="pepperoni">Reels</option>
                                 </select>
                                 </div>
                            </div>   
<br>                        
                           <div class="form-group">
                                <label for="ethnicity" class="col-sm-4 control-label">Ethnicity<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                               <select class="ethnicity" multiple="true" name="ethnicity" style="width:100%;">
                                         <option value="asian">Asian</option>
                                        <option value="black/african">Black / African Descent</option>
                                        <option value="multiracial/ambigius">Ethnically Ambiguous / Multiracial</option>
                                        <option value="Indigenous">Indigenous Peoples</option>
                                        <option value="latino">Latino / Hispanic</option>
                                        <option value="south asian/indian ">South Asian / Indian</option>
                                        <option value="Southeast Asian ">Southeast Asian / Pacific Islander</option>
                              </select>
                                 </div>
                            </div> 
  <br>
                            <div class="form-group">
                                <label for="haircolor" class="col-sm-4 control-label">Select Hair Color<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                   <select class="haircolor" multiple="true" name="haircolor" style="width:100%;">
                                            <option value="brown">Brown</option>
                                        <option value="blond">Blond</option>
                                        <option value="black">Black</option>
                                        <option value="red">Red</option>
                                        <option value="gray">Gray</option>
                                        <option value="white">White</option>
                                            
                                 </select>
                                 </div>
                            </div>  
<br>
                             <div class="form-group">
                                <label for="eyecolor" class="col-sm-4 control-label">Select Eye Color<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                  <select class="eyecolor" multiple="true" name="eyecolor" style="width:100%;">
                                          <option value="brown">Brown</option>
                                        <option value="blond">Blond</option>
                                        <option value="black">Black</option>
                                        <option value="red">Red</option>
                                        <option value="gray">Gray</option>
                                        <option value="white">White</option>
                                            
                                  </select>
                                 </div>
                            </div>  
<br>    
                            <div class="form-group">
                                <label for="bodytype" class="col-sm-4 control-label">Body Type<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                <select class="bodytype" multiple="true" name="bodytype" style="width:100%;">
                                         <option value="average">Average</option>
                                        <option value="slim">Slim</option>
                                        <option value="muscular">Muscular</option>
                                        <option value="curvy">Curvy</option>
                                </select>
                                 </div>
                            </div>
                          
                        </div>

                      <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label"></label>                          
                        <input type="checkbox" style="height: 10px"   class="form-check-input" id="hasPassport">
                        <label class="form-check-label" for="hasPassport">Has Passport</label>
                        <input type="checkbox" style="height: 10px"   class="form-check-input" id="hasDrivingLicense">
                        <label class="form-check-label" for="hasDrivingLicense">Has License</label>              
                      </div>

          
                              <div class="col-sm-8 col-sm-offset-4">
                                    <button type="submit" class="btn btn__red animation btn-half pull-right ">Search</button>   
                             </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- Services Section End -->
    <div class="section portfolio">

        <div class="container">
            <div class="row">

                <div class="col-md-12" >
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        <div class="grid-gutter"></div>
                    <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                            <img class="img-responsive" src="img/02_model-5.jpg" alt="sample image">
                            <div class="grid-item__contant-info">
                                <div class="grid-item__contant-name">Kate Farmer</div>
                                <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                <div class="grid-item__contant-place title__grey">Manchester City</div>
                                <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>

                            </div>
                        </a>
                        <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                            <img class="img-responsive" src="img/02_model-5.jpg" alt="sample image">
                            <div class="grid-item__contant-info">
                                <div class="grid-item__contant-name">Kate Farmer</div>
                                <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                <div class="grid-item__contant-place title__grey">Manchester City</div>
                                <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>

                            </div>
                        </a>
                        <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                            <img class="img-responsive" src="img/02_model-5.jpg" alt="sample image">
                            <div class="grid-item__contant-info">
                                <div class="grid-item__contant-name">Kate Farmer</div>
                                <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                <div class="grid-item__contant-place title__grey">Manchester City</div>
                                <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>

                            </div>
                        </a>
                        <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                            <img class="img-responsive" src="img/02_model-5.jpg" alt="sample image">
                            <div class="grid-item__contant-info">
                                <div class="grid-item__contant-name">Kate Farmer</div>
                                <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                <div class="grid-item__contant-place title__grey">Manchester City</div>
                                <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>

                            </div>
                        </a>
                        <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                            <img class="img-responsive" src="img/02_model-5.jpg" alt="sample image">
                            <div class="grid-item__contant-info">
                                <div class="grid-item__contant-name">Kate Farmer</div>
                                <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                <div class="grid-item__contant-place title__grey">Manchester City</div>
                                <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>

                            </div>
                        </a>
                        <a href="{{route('models.single')}} " class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                            <img class="img-responsive" src="img/02_model-5.jpg" alt="sample image">
                            <div class="grid-item__contant-info">
                                <div class="grid-item__contant-name">Kate Farmer</div>
                                <div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
                                <div class="grid-item__contant-place title__grey">Manchester City</div>
                                <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                <div class="grid-item__contant-place title__grey">Height: 5' 3"</div>
                                <i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i>
                                <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>
                                <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>

                            </div>
                        </a>
                       
                       
                
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/prism.min.js" integrity="sha512-WkVkkoB31AoI9DAk6SEEEyacH9etQXKUov4JRRuM1Y681VsTq7jYgrRw06cbP6Io7kPsKx+tLFpH/HXZSZ2YEQ==" crossorigin="anonymous"></script>
{{-- 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />


{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js" integrity="sha512-aFvi2oPv3NjnjQv1Y/hmKD7RNMendo4CZ2DwQqMWzoURKxcqAoktj0nNG4LU8m23+Ws9X5uVDD4OXLqpUVXD5Q==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
     
    $(document).ready(function() {
        $('.example-getting-started').chosen();
        // $('#example-getting-started').css("height","50px");

          $('.ethnicity').chosen(); 

           $('.unionstatus').chosen();
           $('.haircolor').chosen();
           $('.eyecolor').chosen();
           $('.bodytype').chosen();
           $('.assets').chosen();
            $('.select2').select2();
    });

</script>
@endsection