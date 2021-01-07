@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend-assets/assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<style>
   .d-flex{
      display: flex;
   }
   .select2-container{
      width: 100% !important;
   }

   .social_limit,.social_limit:focus{
      border: 1px solid #e8ecfa;
      outline: none;
   }

   .h-34{
      height: 34px;
   }

   .invis{
      display: none;
   }
</style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   <div class="row">
      <div class="col-md-12">
         <!--begin::Portlet-->
         <div class="kt-portlet">
            <div class="kt-portlet__head">
               <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                     Create Plan
                  </h3>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
               <div class="col-md-7 col-sm-7 col-xs-7 mx-auto">

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

                                    
                  @php 
                     $route = route('backend.plan.store');
                     if(isset($plan))
                        $route = route('backend.plan.update',$plan->id);
                  @endphp
                  <form action="{{$route}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                     @csrf
                     @if(isset($plan))
                        {{ method_field('PATCH') }}
                     @endif
                     <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Package Name <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="text" id="first-name" name="name" value="{{$plan->name ?? ''}}" required="required" class="form-control col-md-12 col-xs-12">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" >Package Cost<span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="text" required="required" name="cost" value="{{$plan->cost ?? ''}}" class="form-control col-md-12 col-xs-12">
                        </div>
                     </div>
                     <div class="d-flex mb-3">
                        <div class="col-md-4">
                           <label class="control-label " >Pictures<span class="required">*</span>
                           </label>
                           <input type="number" required="required" name="pictures" value="{{$plan->pictures ?? ''}}" class="form-control col-md-12 col-xs-12">
                        </div>
                        <div class="col-md-4">
                           <label class="control-label " >Pictures<span class="required">*</span>
                           </label>
                           <input type="number" required="required" name="audios" value="{{$plan->audios ?? ''}}" class="form-control col-md-12 col-xs-12">
                        </div>
                        <div class="col-md-4">
                           <label class="control-label " >Pictures<span class="required">*</span>
                           </label>
                           <input type="number" required="required" name="videos" value="{{$plan->videos ?? ''}}" class="form-control col-md-12 col-xs-12">
                        </div>
                       
                     </div>

                     <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Add Package Details <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <textarea name="description" id="summernote" class="summernote">{{$plan->description ?? ''}}</textarea>
                        </div>
                     </div>

                     <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Features Allow <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Unique Url</label>
                              <div id="unique_url" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->unique_url) && $plan->unique_url=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="unique_url" {{isset($plan) && isset($plan->unique_url) && $plan->unique_url=='0' ? 'checked' : '' }} value="0"> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->unique_url && $plan->unique_url && $plan->unique_url=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="unique_url" value="1" {{isset($plan) && $plan->unique_url && $plan->unique_url=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Contact info</label>
                              <div id="contact_info" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->contact_info) && $plan->contact_info=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="contact_info" value="0" {{isset($plan) && isset($plan->contact_info) && $plan->contact_info=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->contact_info && $plan->contact_info=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="contact_info" value="1" {{isset($plan) && $plan->contact_info && $plan->contact_info=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           {{-- <div class="form-group d-flex">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Pictures</label>
                              <div id="pictures" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->pictures) && $plan->pictures =='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="pictures" value="0" {{isset($plan) && isset($plan->pictures) && $plan->pictures =='1' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->pictures && $plan->pictures=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="pictures" value="1" {{isset($plan) && $plan->pictures && $plan->pictures=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div> --}}
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Resume</label>
                              <div id="resume" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->resume) && $plan->resume=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="resume" value="0" {{isset($plan) && isset($plan->resume) && $plan->resume=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->resume && $plan->resume=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="resume" value="1" {{isset($plan) && $plan->resume && $plan->resume=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group d-flex">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Social Links</label>
                              <div class="col-md-7">
                                 <div class="row">
                                    <div id="social_links" class="btn-group" data-toggle="buttons">
                                       <label class="btn btn-default {{isset($plan) && isset($plan->social_links) && $plan->social_links=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                          <input type="radio" name="social_links" value="0" {{isset($plan) && isset($plan->social_links) && $plan->social_links=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                       </label>
                                       <label class="btn btn-croply {{isset($plan) && $plan->social_links && $plan->social_links=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                          <input type="radio" name="social_links" value="1" {{isset($plan) && $plan->social_links && $plan->social_links=='1' ? 'checked' : '' }}> ON
                                       </label>
                                    </div>
                                 </div>
                                 {{-- @if (isset($plan) && isset($plan->social_links) && $plan->social_links=='1') --}}
                                    <div class="row @if (isset($plan) && isset($plan->social_links) && $plan->social_links=='0')invis @endif" id="social_limit_div">
                                       <input type="number" class="social_limit col-md-4" min="1" max="10" name="social_limit" value="{{isset($plan) ? $plan->social_limit : ''}}" id="social_limit" tabindex="1">
                                    </div>
                                 {{-- @endif --}}
                                 
                              </div>
                              
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Email</label>
                              <div id="email_me" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->email_me) && $plan->email_me=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="email_me" value="0" {{isset($plan) && isset($plan->email_me) && $plan->email_me=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->email_me && $plan->email_me=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="email_me" value="1" {{isset($plan) && $plan->email_me && $plan->email_me=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Short Message</label>
                              <div id="short_message" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->short_message) && $plan->short_message=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="short_message" value="0" {{isset($plan) && isset($plan->short_message) && $plan->short_message=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->short_message && $plan->short_message=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="short_message" value="1" {{isset($plan) && $plan->short_message && $plan->short_message=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           
                           <div class="form-group d-flex">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Community Access</label>
                              <div class="col-md-7">
                                 <div class="row">
                                    <div id="community_access" class="btn-group" data-toggle="buttons">
                                       <label class="btn btn-default {{isset($plan) && isset($plan->community_access) && $plan->community_access=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                       <input type="radio" name="community_access" value="0" {{isset($plan) && isset($plan->community_access) && $plan->community_access=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                       </label>
                                       <label class="btn btn-croply {{isset($plan) && $plan->community_access && $plan->community_access=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                       <input type="radio" name="community_access" value="1" {{isset($plan) && $plan->community_access && $plan->community_access=='1' ? 'checked' : '' }}> ON
                                       </label>
                                    </div>
                                 </div>
                                 {{-- @if (isset($plan) && isset($plan->community_access) && $plan->community_access=='1') --}}
                                    <div class="row @if (isset($plan) && isset($plan->community_access) && $plan->community_access=='0')invis @endif" id="community_access_perm_div">
                                       <select class="social_limit col-md-4 h-34" name="community_access_perm" id="community_access_perm">
                                          <option value="">Access Level..</option>
                                          <option value="R" {{isset($plan) && $plan->community_access_perm=='R'?'selected' : ''}}>Read</option>
                                          <option value="R/W" {{isset($plan) && $plan->community_access_perm=='R/W'?'selected' : ''}}>Read and Comment</option>
                                       </select>
                                    </div>
                                 {{-- @endif --}}
                              </div>
                              
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Apply Now</label>
                              <div id="apply_now" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->apply_now) && $plan->apply_now=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="apply_now" value="0" {{isset($plan) && isset($plan->apply_now) && $plan->apply_now=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->apply_now && $plan->apply_now=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="apply_now" value="1" {{isset($plan) && $plan->apply_now && $plan->apply_now=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Agent Contact</label>
                              <div id="agent_contact" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->agent_contact) && $plan->agent_contact=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="agent_contact" value="0" {{isset($plan) && isset($plan->agent_contact) && $plan->agent_contact=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->agent_contact && $plan->agent_contact=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="agent_contact" value="1" {{isset($plan) && $plan->agent_contact && $plan->agent_contact=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Free Guide Download</label>
                              <div id="free_guide" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->free_guide) && $plan->free_guide=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="free_guide" value="0" {{isset($plan) && isset($plan->free_guide) && $plan->free_guide=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->free_guide && $plan->free_guide=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="free_guide" value="1" {{isset($plan) && $plan->free_guide && $plan->free_guide=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Training Invitation</label>
                              <div id="training_invitation" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->training_invitation) && $plan->training_invitation=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="training_invitation" value="0" {{isset($plan) && isset($plan->training_invitation) && $plan->training_invitation=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->training_invitation && $plan->training_invitation=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="training_invitation" value="1" {{isset($plan) && $plan->training_invitation && $plan->training_invitation=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-5 col-sm-12 col-xs-12">Inductory Invitation</label>
                              <div id="inductry_invitation" class="btn-group" data-toggle="buttons">
                                 <label class="btn btn-default {{isset($plan) && isset($plan->inductry_invitation) && $plan->inductry_invitation=='0' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="inductry_invitation" value="0" {{isset($plan) && isset($plan->inductry_invitation) && $plan->inductry_invitation=='0' ? 'checked' : '' }}> &nbsp; OFF &nbsp;
                                 </label>
                                 <label class="btn btn-croply {{isset($plan) && $plan->inductry_invitation && $plan->inductry_invitation=='1' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                 <input type="radio" name="inductry_invitation" value="1" {{isset($plan) && $plan->inductry_invitation && $plan->inductry_invitation=='1' ? 'checked' : '' }}> ON
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-12">
                           <button type="submit" class="btn btn-success btn-xs" style="background-color: #0abb87;" role="button" style="font-size:13px" ><b>Save</b></button>
                           {{-- <a href="#" class="btn btn-info btn-xs" role="button" style="font-size:13px" ><b>Reset</b></a> --}}
                           {{-- <a href="#" class="btn btn-primary btn-xs" role="button" style="font-size:13px" ><b>Cancel</b></a> --}}
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <!--DATA TABLES HERE-->
            {{-- <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                     <div class="x_title">
                        <h2>Subscription List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                           </li>
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="#">Settings 1</a>
                                 </li>
                                 <li><a href="#">Settings 2</a>
                                 </li>
                              </ul>
                           </li>
                           <li><a class="close-link"><i class="fa fa-close"></i></a>
                           </li>
                        </ul>
                        <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Type</th>
                                 <th>Name</th>
                                 <th>Cost</th>
                                 <th>Details</th>
                                 <th>Operation</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Anual</td>
                                 <td>Basic for Homested</td>
                                 <td>Free</td>
                                 <td>Add upto 20 Products, 5%sales comissions, Variable Products</td>
                                 <td>
                                    <a  href="#" class="btn btn-edit btn-xs" style=" color:white" ><i class="fa fa-pencil" ></i> Edit </a>
                                    <a  href="#" class="btn btn-view btn-xs" style=" color:white" ><i class="fa fa-folder" ></i> View </a>
                                    <a href="#" class="btn btn-delete  btn-xs" style="color:white"><i class="fa fa-trash-o"></i> Delete </a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!--Page Active Scripts(used by this page)-->
<script src="{{asset('backend-assets/assets/plugins/summernote/summernote.active.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){

      /* $('.js-example-basic-multiple').select2(); */
      $('[name="social_links"]').on('change',function(){
         var social=$('[name="social_links"]:checked').val();
         if (social==1) {
            $('#social_limit_div').show();
         }
         else{
            $('#social_limit').val('');
            $('#social_limit_div').hide();
         }
      })

      $('[name="community_access"]').on('change',function(){
         var comm_perm=$('[name="community_access"]:checked').val();
         if (comm_perm==1) {
            $('#community_access_perm_div').show();
         }
         else{
            $('#community_access_perm').val('');
            $('#community_access_perm_div').hide();
         }
      })

	})

</script>

<script type="text/javascript">
	"use strict";
// Class definition

var KTSummernoteDemo = function () {    
    // Private functions
    var demos = function () {
        $('.summernote').summernote({
            height: 150
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTSummernoteDemo.init();
});
</script>
@endsection