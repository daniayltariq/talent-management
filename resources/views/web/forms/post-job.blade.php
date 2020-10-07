@extends('web.layouts.app')

@section('content')

<section class="page__img" style="background-image: url('/img/apply_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="title__wrapp">
                    <div class="page__subtitle title__grey">Form</div>
                    <h1 class="page__title">Post Job</h1>
                </div>
            </div>
        </div>
    </section><!-- Slider Section End -->

    <!-- Services Section Start -->
    <section class="section apply">
    <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                    <form class="apply-form form-horizontal" method="POST"  id="regForm" action="{{ route('register') }}">
                <h3 class="text__quote centered">Project Details</h3>
                       @csrf
                        <div class="form-block">
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Title <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                              </div>
                            </div> 
                          
                            <div class="form-group">
                                <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" name = "gender" class="form-control" required>
                                        <option label="Select"></option>
                                    <optgroup label = "Theatre">
                                        <option value="plays">Plays</option>
                                        <option value="musicals">Musicals</option>
                                        <option value="chorous">Chorous Calls</option>
                                    </optgroup> 
                                     <optgroup label ="Film">
                                        <option value="feature film">Feature Film</option>
                                        <option value="short film">Short Film</option>
                                        <option value="new film">New Film</option>
                                    </optgroup>
                                    </select>
                                 </div>
                            </div>
                            <div class="form-group">
                                <label for="rolename" class="col-sm-4 control-label">Production Company <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="pcompany" type="text" class="form-control @error('pcompany') is-invalid @enderror" name="pcompany" value="{{ old('pcompany') }}" required autocomplete="pcompany" autofocus>
                            </div>
                            </div> 

                            <div class="form-group">
                                <label for="ppersonel" class="col-sm-4 control-label">Production Personnel <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="ppersonel" type="text" class="form-control @error('ppersonel') is-invalid @enderror" name="ppersonel" value="{{ old('ppersonel') }}" required autocomplete="ppersonel" autofocus>
                            </div>
                            </div>

                 
                        <div class="form-block">
                            <div class="form-group">
                                <label for="unionstatus" class="col-sm-4 control-label">Union Status</label>
                                <div class="col-sm-8">      
                                 <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="unionstatus" id="union_nonunion" value="union_nonunion">
                              <label class="form-check-label" for="union_nonunion">Union & Nonunion</label>
                            </div>
                            <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="unionstatus" id="union" value="union">
                              <label class="form-check-label" for="union">Union</label>
                            </div>
                            <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="unionstatus" id="nonunion" value="nonunion">
                              <label class="form-check-label" for="nonunion">Non Union</label>
                            </div>
                        
                                </div>
                            </div>

                              <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">Will you be paying talent?</label>
                                <div class="col-sm-8">
                                    <select name="pay" id="pay" class="form-control">
                                        <option value="no pay">No Pay</option>
                                        <option value="deferred pay">Deffered Pay</option>
                                        <option value="stipend">Stipend</option>
                                        <option value="professional">Professional Pay</option>
                                    </select>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label for="contract_details" class="col-sm-4 control-label">Compensation & Contract Details <span class="req">*</span></label>
                                <div class="col-md-6">
                            <textarea id="contract_details" name="contract_details" rows="4" cols="50" placeholder="At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
                            "></textarea>

                            </div>
                            </div>

                            <hr>
                               <h3 class="text__quote centered">Dates and Location </h3>
                            <div class="form-group">
                                         <h5 class="text__quote2">When shoud this listing Expire </h5>
                                <label for="country" class="col-sm-4 control-label">Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="expdate" id="expdate">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="exptime" class="col-sm-4 control-label">Time</label>
                                <div class="col-sm-8">
                                    <input type="time" class="form-control" name="exptime" id="exptime">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                     <h5 class="text__quote2">Locations</h5>
                                <label for="address" class="col-sm-4 control-label">Where are you auditioning or interviewing talent?</label>
                                <div class="col-sm-8">      
                                 <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="locations" id="local" value="local">
                              <label class="form-check-label" for="local">Local</label>
                            </div>
                            <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="locations" id="global" value="global">
                              <label class="form-check-label" for="global">Global</label>
                            </div>
                            <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="locations" id="worldwide" value="worldwide">
                              <label class="form-check-label" for="worldwide">Worldwide</label>
                            </div>
                        
                                </div>
                            </div>
                            <div class="form-group">
                                 <h5 class="text__quote2">First, select a city. You'll then be able to add optional audition details.</h5>
                                <label for="lc" class="col-sm-4 control-label">Select City<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                               <select class="lc form-control" multiple="true" name="lc" style="width:100%;height: 65px">
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
                        
                           <div class="form-group">
                                <label for="password" class="col-sm-4 control-label"> Audition instructions?<span class="req">*</span></label>
                                <div class="col-md-6">
                                 <textarea id="contract_details" name="contract_details" rows="4" cols="50" placeholder="At you will learn how to make a. They offer free tutorials in all web development technologies.
                            "></textarea>

                            </div>
                            </div>

                          <div class="form-group">
                               <h5 class="text__quote2">Additional Material</h5>
                                <label for="address" class="col-sm-4 control-label">Production Website</label>
                                <div class="col-sm-8">      
                                    <input type="website" class="form-control" name="website" id="website">
                      
  
                                </div>
                            </div>  
                            <div class="form-group">
                                        <label for="address" class="col-sm-4 control-label">Add Image</label>
                                <div class="col-sm-8">      
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                  
                                </div>
                            </div> 

<br>
                             <div class="form-group">
                              
                                 <div class="col-sm-12 col-sm-offset-4">
                              <button type="Submit" class="btn btn-default btn__red animation" id="myBtn">Add Role</button>
                                   <button type="button" class="btn btn-default btn__red animation" id="addVcovr">Add Voiceover</button>
                                   <button type="button" class="btn btn-default btn__red animation" >Submit</button>
                                </div>

                  
                            </div>

                            {{-- VOICEOVER MODAL --}}
              <div id="myModal2" class="modal">
                      <div class="modal-content">
                        <span class="close2">&times;</span>
                        <h3 class="text__quote centered">Please tell us about the voiceover role</h3>
                       <div class="form-group">
                                <label for="vc_role" class="col-sm-4 control-label">Role Name <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="vc_role" type="text" class="form-control @error('vc_role') is-invalid @enderror" name="vc_role" value="{{ old('vc_role') }}" required autocomplete="vc_role" autofocus>
                            </div>
                        </div>  

                        <div class="form-group">
                                <label for="vc_roletype" class="col-sm-4 control-label">Role Type</label>
                                <div class="col-sm-8">
                                    <select name="vc_roletype" id="vc_roletype" class="form-control">
                                        <option value="lead">Lead</option>
                                        <option value="supporting">Supporting</option>
                                        <option value="dayplayer">Day Player</option>
                                    </select>
                                </div>
                            </div>
                    <div class="form-group">                       
                                <label for="vc_workfromhome" class="col-sm-4 control-label">Is this a remote/work from home opportunity?</label>
                                <div class="col-sm-8">      
                           <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="vc_workfromhome" id="yes" value="yes">
                              <label class="form-check-label" for="local">Yes</label>
                           </div>
                                <div class="form-check checkbox-inline">
                                  <input class="form-check-input" type="radio" name="vc_workfromhome" id="no" value="no">
                                  <label class="form-check-label" for="global">No</label>
                                </div>
                                
                           </div>
                       </div>  
                  
                         <div class="form-group">
                              
                                <label for="vc_accent" class="col-sm-4 control-label">Accent<span class="req">*</span></label>
                                <div class="col-sm-8">
                                <select class="vc_accent" multiple="true" name="vc_accent">
                                  <option>Select</option> 
                                   <option>Scottish</option> 
                                   <option>British</option> 
                                   <option>UK</option> 
                                   <option>Indian</option> 
                                   <option>Native</option> 
                              </select>
                                 </div>
                          </div>
                             

                          <div class="form-group">
                          <label for="vc_language" class="col-sm-4 control-label">Accent<span class="req">*</span></label>
                            <div class="col-sm-8">
                            <select class="vc_language" multiple="true" name="vc_language">
                              <option>Select</option> 
                               <option>Englis</option> 
                               <option>Japnes</option> 
                               <option>Chines</option> 
                               <option>Thai</option> 
                               <option>Native</option> 
                          </select>
                             </div>
                      </div>
                           

                      <div class="form-group">
                                <label for="vc_gender" class="col-sm-4 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <select name="vc_gender" id="vc_gender" class="form-control">
                                        <option value="lead">Male</option>
                                        <option value="supporting">Female</option>
                                        <option value="dayplayer">xxx</option>
                                    </select>
                                </div>
                       </div>
                <div class="form-group">                       
                          <label class="col-sm-4 control-label">Media required from applicants</label>
                                <div class="col-sm-8">      
                           <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="checkbox" name="coverletter" id="coverletter" value="coverletter">
                              <label class="form-check-label" for="local">Cover Letter</label>
                           </div>
                                <div class="form-check checkbox-inline">
                                  <input class="form-check-input" type="checkbox" name="audio" id="audio" value="audio">
                                  <label class="form-check-label" for="global">Audio Reel</label>
                                </div>
                                
                           </div>
                       </div>

                        <div class="form-group">
                            
                           <label for="vc_roledesc" class="col-sm-4 control-label">Role Description<span class="req">*</span></label>
                              <div class="col-md-6">
                           <textarea id="vc_roledesc" name="contract_details" rows="4" cols="50" placeholder="At you will learn how to make"></textarea>
                              </div>
                        </div>

                 <div class="row">
                    
                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="button" class="btn btn-default btn__red animation btn-half pull-right" id="myBtn5">ADD</button>
                    </div>

                </div>
  </div> 
                     </div>
                                          <!-- Roles Modal content -->
                    <div id="myModal" class="modal">
                      <div class="modal-content">
                        <span class="close">&times;</span>
                        <h3 class="text__quote centered">Add Roles</h3>
                       <div class="form-group">
                                <label for="rolename" class="col-sm-4 control-label">Role Name <span class="req">*</span></label>
                                 <div class="col-sm-8">
                                <input id="rolename" type="text" class="form-control @error('rolename') is-invalid @enderror" name="rolename" value="{{ old('rolename') }}" required autocomplete="rolename" autofocus>
                            </div>
                        </div>  

                        <div class="form-group">
                                <label for="roletype" class="col-sm-4 control-label">Role Type</label>
                                <div class="col-sm-8">
                                    <select name="roletype" id="roletype" class="form-control">
                                        <option value="lead">Lead</option>
                                        <option value="supporting">Supporting</option>
                                        <option value="dayplayer">Day Player</option>
                                    </select>
                                </div>
                            </div>
                    

                      <div class="form-group">                       
                                <label for="workfromhome" class="col-sm-4 control-label">Is this a remote/work from home opportunity?</label>
                                <div class="col-sm-8">      
                           <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="radio" name="workfromhome" id="yes" value="yes">
                              <label class="form-check-label" for="local">Yes</label>
                           </div>
                                <div class="form-check checkbox-inline">
                                  <input class="form-check-input" type="radio" name="workfromhome" id="no" value="no">
                                  <label class="form-check-label" for="global">No</label>
                                </div>
                                
                           </div>
                       </div>  
                  
                      <div class="form-group">
                                <label for="gender" class="col-sm-4 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="lead">Male</option>
                                        <option value="supporting">Female</option>
                                        <option value="dayplayer">xxx</option>
                                    </select>
                                </div>
                            </div>
                          <div class="form-group">
                              
                                <label for="skills" class="col-sm-4 control-label">Select Skills<span class="req">*</span></label>
                                <div class="col-sm-8">
                                <select class="skills" multiple="true" name="skills">
                                  <option>Select</option> 
                                   <option>Skill1</option> 
                                   <option>Skill2</option> 
                                   <option>Skill3</option> 
                                   <option>Skill4</option> 
                                   <option>Skill5</option> 
                              </select>
                                 </div>
                            </div>
                           
                      <div class="form-group">
                                <label for="ethnicity" class="col-sm-4 control-label">Ethnicity<span class="req">*</span></label>
                                <div class="col-sm-8 ">
                               <select class="ethnicity" multiple="true" name="ethnicity">
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

                              <div class="form-group">                       
                                <label for="workfromhome" class="col-sm-4 control-label">Media required from applicants
</label>
                                <div class="col-sm-8">      
                           <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="checkbox" name="photo" id="photo" value="photo">
                              <label class="form-check-label" for="local">Head Shot Photo</label>
                           </div>
                           <div class="form-check checkbox-inline">
                              <input class="form-check-input" type="checkbox" name="video" id="video" value="video">
                              <label class="form-check-label" for="local">Video Reel</label>
                           </div>
                                <div class="form-check checkbox-inline">
                                  <input class="form-check-input" type="checkbox" name="audio" id="audio" value="audio">
                                  <label class="form-check-label" for="global">Audio Reel</label>
                                </div>
                                
                           </div>
                       </div>

                        <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Role Description<span class="req">*</span></label>
                                <div class="col-md-6">
                                 <textarea id="role_description" name="contract_details" rows="4" cols="50" placeholder="At you will learn how to make a. They offer free tutorials in all web development technologies.
                            "></textarea>

                            </div>
                            </div>
                 <div class="row">
                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="button" class="btn btn-default btn__red animation btn-half pull-right" id="myBtn2">ADD</button>
                </div>
                    </div>
  </div> 
                     </div> {{-- Modal content --}}
                        </div>
                           
                    </form>              
                </div>

            </div>
        </div>
        </section>
@endsection

@section('scripts')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/prism.min.js" integrity="sha512-WkVkkoB31AoI9DAk6SEEEyacH9etQXKUov4JRRuM1Y681VsTq7jYgrRw06cbP6Io7kPsKx+tLFpH/HXZSZ2YEQ==" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />


{{-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js" integrity="sha512-aFvi2oPv3NjnjQv1Y/hmKD7RNMendo4CZ2DwQqMWzoURKxcqAoktj0nNG4LU8m23+Ws9X5uVDD4OXLqpUVXD5Q==" crossorigin="anonymous"></script> --}}
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
     


     
    $(document).ready(function() {
          $('.skills').chosen(); 
        // $('#example-getting-started').css("height","50px");
          $('.ethnicity').chosen(); 
          $('.lc').chosen(); 
          $('.vc_accent').chosen(); 
          $('.vc_language').chosen(); 

    });

// Get the modal
var modal = document.getElementById("myModal");

var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("addVcovr");
var btn5 = document.getElementById("myBtn5");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";

}
btn2.onclick = function() {
  modal.style.display = "none";
   
}
btn3.onclick = function() {
  modal2.style.display = "block";

}
btn5.onclick = function() {
  modal2.style.display = "none";

}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  
}
// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
     
  }
}
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
     
  }
}
</script>
@endsection