@extends('web.layouts.app')


@section('styles')
<style type="text/css">
.btn-share {
    padding: 16px 32px;
    font-size: 15px;
    margin-left: 10px;
}

.single-talent {
        padding: 40px;
}

.profile-sec {
    height: 180px;
    width: 180px;
    border-radius: 50%;
    padding: 5px;
    background: #f8b248;
}
</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                <h1 class="page__title">John carry</h1>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog picklist">
    <div class="container">
        <div class="row">
            <div class="blog__posts col-md-12">
                <div class="blog__list">
                    
                    <div class="row mb-5">
                        <div class="col-sm-10 col-centered">
                            <div >
                                <button class="ml-0 btn btn-share"><i class="mdi mdi-message-outline"></i>  Send Message</button>
                                <button class="btn btn-share pull-right"><i class="mdi mdi-email-outline"></i>  Add to Picklist</button>
                            </div>
                        </div>
                    </div>

                    


                    <div class="row ">
                        <div class="col-sm-10 col-centered">
                            <div class="single-talent mb-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div>
                                            <div class="profile-sec mx-auto ml-5">
                                                <img src="{{ asset('web/uploads/profile/talent-1.jpg') }}" class="img img-responsive ">

                                            </div>
                                             <div class="talent-intro text-center">
                                                <h2 class="mb-0">John M. Smith</h2>
                                                <p>www.thetalentdepot.com/johnmsmith</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                        <div class="talent-specs">
                                            <table>
                                                <tr>
                                                    <th>Height</th>
                                                    <td>5.8</td>
                                                </tr>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>162 lbs</td>
                                                </tr>
                                                <tr>
                                                    <th>Hair</th>
                                                    <td>Brown</td>
                                                </tr>
                                                <tr>
                                                    <th>Eyes</th>
                                                    <td>Blonde</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <div class="talent-specs">
                                            <table class="pull-right">
                                                <tr>
                                                    <th class="text-right">Suite 4A-1308,423, Graham ST</th>
                                                     
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Madison, WI 56323</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th class="text-right">(123) 456-7890</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th class="text-right">(555) 666-7777</th>
                                                     
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <hr class="hr">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text__quote font-primary">Theater</h4>
                                        <div class="">
                                            <table class="w-100">
                                                 <tr>
                                                     <th>Name</th>
                                                     <th>Role</th>
                                                     <th>Location</th>
                                                 </tr>

                                                  <tr>
                                                     <td>She's Mine</td>
                                                     <td>Ann (lead)</td>
                                                     <td>Arnold Legan dir.</td>
                                                 </tr>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text__quote font-primary">Films</h4>
                                        <div class="">
                                            <table class="w-100">
                                                 <tr>
                                                     <th>Name</th>
                                                     <th>Role</th>
                                                     <th>Location</th>
                                                 </tr>

                                                  <tr>
                                                     <td>She's Mine</td>
                                                     <td>Ann (lead)</td>
                                                     <td>Arnold Legan dir.</td>
                                                 </tr>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <hr class="hr">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text__quote font-primary">Telivision</h4>
                                        <div class="">
                                            <table class="w-100">
                                                 <tr>
                                                     <th>Name</th>
                                                     <th>Role</th>
                                                     <th>Location</th>
                                                 </tr>

                                                  <tr>
                                                     <td>She's Mine</td>
                                                     <td>Ann (lead)</td>
                                                     <td>Arnold Legan dir.</td>
                                                 </tr>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text__quote font-primary">Commercials</h4>
                                        <div class="">
                                            <table class="w-100">
                                                 <tr>
                                                     <th>Name</th>
                                                     <th>Role</th>
                                                     <th>Location</th>
                                                 </tr>

                                                  <tr>
                                                     <td>She's Mine</td>
                                                     <td>Ann (lead)</td>
                                                     <td>Arnold Legan dir.</td>
                                                 </tr>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text__quote font-primary">Traning</h4>
                                        <div class="">
                                            <table class="w-100">
                                                 <tr>
                                                     <th>Name</th>
                                                     <th>Role</th>
                                                     <th>Location</th>
                                                 </tr>

                                                  <tr>
                                                     <td>She's Mine</td>
                                                     <td>Ann (lead)</td>
                                                     <td>Arnold Legan dir.</td>
                                                 </tr>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                             
                            
                            
                        </div>
                    </div>
                    
                    
                </div>
               
            </div>
            
        </div>
    </div>
</div>
<!-- Blog Section End -->
@endsection