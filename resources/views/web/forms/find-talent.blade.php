@extends('web.layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style type="text/css">
    button.btn.btn__red.animation.btn-half.pull-right {
        margin-bottom: 20px;
    }
    .btn-half {
        width: 30%;
    }

    .btn {
        text-transform: capitalize;
        font-size: 14px;
    }

    span.multiselect-selected-text {
        font-size: 14px;
        font-weight: 500;
        color: #616161;
    }

    .modal {
        text-align: left;
    }
    .modal-content {
        border: none;
        border-radius: 2px;
        box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);
        width: 100%;
    }
    .modal-header{
        border-bottom: 0;
        padding-top: 15px;
        padding-right: 26px;
        padding-left: 26px;
        padding-bottom: 0px;
    }
    .modal-title {
        font-size: 28px;
    }
    .modal-body{
        border-bottom: 0;
        padding-top: 5px;
        padding-right: 26px;
        padding-left: 26px;
        padding-bottom: 10px;
        font-size: 15px;
    }
    .modal-footer {
        border-top:0;
        padding-top: 0px;
        padding-right:26px;
        padding-bottom:26px;
        padding-left:26px;
    }
    .btn-default,.btn-primary {
        border: none;
        border-radius: 2px;
        display: inline-block;
        color: #424242;
        background-color: #FFF;
        text-align: center;
        height: 36px;
        line-height: 36px;
        outline: 0;
        padding: 0 2rem; 
        vertical-align: middle;
        -webkit-tap-highlight-color: transparent;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
        letter-spacing: .5px;
        transition: .2s ease-out;
    }
    .btn-default:hover{
    background-color: #FFF;
    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15);
    }
    .btn-primary {
    color: #FFF;
    background-color: #2980B9;
    }
    .btn-primary:hover{
    background-color: #2980B9;
    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15);
    }
    footer {
    text-align: center;
    margin: 15px;
    }
    footer h4{
    font-size: 2.92rem;
    font-weight:100;
        margin: 1.46rem 0 1.168rem; 
    }

    .picklist-btn{
        position: relative;
        z-index: 999999;
    }

    .new-picklist{
        display: none;
    }
</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="page__subtitle title__grey">Looking for talent ?</div>
                    <h1 class="page__title">Featured Talent</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    {{-- <section class="section apply">
        <div class="container">
            <div class="row">
                <!-- <h3 class="text__quote centered">Find Actors and Talents for Hire</h3> -->
                <div class="col-lg-12 col-md-12 ">
                    <form class="apply-form form-horizontal" method="POST" action="#" id="form-size">
                       @csrf
                        <div class="row form-block">
                            <div class="form-group col-sm-6">
                                <label for="f_name" class="col-sm-4 control-label">Search by names <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                   <input class="form-control" id="form-size" type="text" aria-label="Search">
                                </div> 
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="state" class="col-sm-4 control-label">Profile Type</label>
                                <div class="col-sm-8">
                                    @include('components.multiselect', ['options' => ['Regular','Voiceover']])
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                                <div class="col-sm-8">

                                    @include('components.multiselect', ['options' => ['Female','Male','Transgender']])
                                    
                                 </div>
                             </div>

                            <div class="form-group col-sm-6">
                                <label for="age" class="col-sm-4 control-label">Age <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <div class="d-flex justify-content-center my-4">
                                        <input type="number" id="age" name="age" class="form-control">
    							    </div>
                                </div>
                            </div>
                              
                            <div class="form-group col-sm-6">
                                <label for="location" class="col-sm-4 control-label">Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="location" id="location">
                                </div>
                            </div>

                           <div class="form-group col-sm-6">
                                <label for="skills" class="col-sm-4 control-label">Skills <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    @include('components.multiselect', ['options' => ['Skill1','Skill2','Skill3','Skill4','Skill5']])
                                    
                                 </div>
                             </div>

                            <div class="form-group col-sm-6">
                                <label for="unionstatus" class="col-sm-4 control-label">Union Status<span class="req">*</span></label>
                                <div class="col-sm-8">
                                    @include('components.multiselect', ['options' => ['Status 1','Status 2','Status 3','Status 4','Status 5']])
    							
                                </div>
                            </div>  

                            <div class="form-group col-sm-6">
                                <label for="assets" class="col-sm-4 control-label">Availible Assets <span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Photos','Video','Audio','Document','Reels']])
                                
                                </div>
                            </div>   

                            <div class="form-group col-sm-6">
                                <label for="ethnicity" class="col-sm-4 control-label">Ethnicity<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Asian','Black / African Descent','Ethnically Ambiguous / Multiracial','Indigenous Peoples','Latino / Hispanic','South Asian / Indian','Southeast Asian / Pacific Islander']])
                                
                                </div>
                            </div> 


                            <div class="form-group col-sm-6">
                                <label for="haircolor" class="col-sm-4 control-label">Select Hair Color<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Brown','Blond','Black','Red','Gray']])
                                    
                                </div>
                            </div>  

                            <div class="form-group col-sm-6">
                                <label for="eyecolor" class="col-sm-4 control-label">Select Eye Color<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Brown','Blond','Black','Red','Gray']])
                                    
                                 </div>
                            </div>  

                            <div class="form-group col-sm-6">
                                <label for="bodytype" class="col-sm-4 control-label">Body Type<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                                    @include('components.multiselect', ['options' => ['Average','Slim','Muscular','Curvy']])
                                
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="checkbox"  class="form-check-input" id="hasDrivingLicense">
                                <label class="form-check-label" for="hasDrivingLicense">Has Driver's License</label>
                                <input type="checkbox"  class="form-check-input" id="hasPassport">
                                <label class="form-check-label" for="hasPassport">Has Passport</label>
                                <input type="checkbox"  class="form-check-input" id="selfRecord">
                                <label class="form-check-label" for="selfRecord">Self-record</label>              
                            </div>


                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn__red animation btn-half pull-right ">Search</button>   
                            </div>
                          
                        </div>

                        

          
                        
                    </form>
                </div>

            </div>

        </div>
    </section> --}}

    <section>
        <div class="section portfolio">
            <div class="container">
                <div class="row">
                    {{-- <div class="button-group filters-button-group">
                        <button class="button title__grey is-checked" data-filter="*">all</button>
                        <button class="button title__grey" data-filter=".women">WOMEN</button>
                        <button class="button title__grey" data-filter=".men">MEN</button>
                        <button class="button title__grey" data-filter=".stylists">Stylists</button>
                        <button class="button title__grey" data-filter=".new-faces">New Faces</button>
                        <button class="button title__grey" data-filter=".teenagers">Teenagers</button>
                        <button class="button title__grey" data-filter=".lifestyle">Lifestyle</button>


                    </div> --}}

                    <div class="col-md-12" >
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            <div class="grid-gutter"></div>

                            @foreach ($members as $member)
                                <div class="effect-bubba grid-item grid-item__width2 new-faces women" data-category="women">
                                    <img class="img-responsive" src="{{ asset(!is_null($member->profile) ? (!is_null($member->profile->profile_img) && \Storage::exists('public/uploads/profile/'.$member->profile->profile_img)? 'storage/uploads/profile/'.$member->profile->profile_img: 'web/img/default.jpg') : 'web/img/default.jpg') }} " alt="sample image">
                                    <div class="grid-item__contant-info">
                                        <div class="grid-item__contant-name">{{!is_null($member->profile) ? $member->profile->legal_first_name.' '.$member->profile->legal_last_name : ""}} </div>
                                        <div class="grid-item__contant-place title__grey">{{!is_null($member->profile) ?$member->profile->address_1 : ''}} {{!is_null($member->profile) ?$member->profile->country : ''}} {{!is_null($member->profile) ?$member->profile->city : ''}}</div>
                                        <div class="grid-item__contant-place title__grey">AGE: 23</div>
                                        <div class="grid-item__contant-place title__grey">Height: {{!is_null($member->profile) ?$member->profile->height : ''}}</div>
                                        <a href="{{route('login')}}"><i class="grid-item__contant-arrow mdi mdi-account mdi-24px" style="color: white"></i></a>
                                        <i class="grid-item__contant-arrow mdi mdi-message-text mdi-24px"style="color: white" ></i>
                                        <i class="grid-item__contant-arrow mdi mdi-note-plus-outline mdi-24px"style="color: white" ></i>

                                        @role('agent')
                                            <a href="#picklist-modal" class="picklist-btn" data-memberid="{{$member->id}}" role="button" data-toggle="modal">
                                        @endrole

                                        @guest
                                            <a href="{{route('login')}}">
                                        @endguest
                                        
                                            <i class="grid-item__contant-arrow mdi mdi-account-check mdi-24px"style="color: white" ></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            
                            {{-- <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 teenagers lifestyle men" data-category="men">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-5.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 new-faces stylists" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-6.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 women" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-4.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 women" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-7.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 teenagers lifestyle " data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-3.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 new-faces stylists " data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-2.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 lifestyle men" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-8.jpg') }} " alt="sample image">
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
                            </div>
                            <div href="single-model.html" class="effect-bubba grid-item grid-item__width2 lifestyle men" data-category="women">
                                <img class="img-responsive" src="{{ asset('web/img/02_model-9.jpg') }} " alt="sample image">
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
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.js"></script>
<script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.2/velocity.ui.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.example-getting-started').multiselect();
    });


</script>

@endsection