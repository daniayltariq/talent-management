@extends('backend.layouts.app')
{{-- {{ dd($contents) }} --}}
@section('styles')
<!--Third party Styles(used by this page)--> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" />
<style>
   .form-group label {
   font-size: 1.2rem;
   }

   .bootstrap-tagsinput{
        color: #495057 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #e2e5ec !important;
        border-radius: 4px !important;
	}

    .bootstrap-tagsinput input{
        width: 100% !important;
    }
	
   .bootstrap-tagsinput .badge{
		margin: 2px 2px;
		background-color: #5969ff;
		border-radius: 4px;
	}

   .invalid-feedback{
      display: block;
      color: red;
   }

   .valid-feedback{
      display: block;
      color: rgb(45, 171, 11);
   }

   .hide{
      display: none;
   }

    .iti{
        width: 100%;
    }

    button.btn.btn-default.btn__red.animation.btn-full.pull-right {
    padding: 15px 30px;
    margin-bottom: 20px;
}

.tg-btn-sp {
    position: relative;
    width: 100%;
    /* margin: 10px 3.8% 18px 3.5%; */
    /* border: 1px solid black; */
    height: 34px;
}

.switch-button, .switch-button-case {
    width: 50%;
    /* height: 43px; */
    font-size: 1.5rem;
    line-height: 3;
}

.switch-button {
    width: 100%;
    /* height: 50px; */
    text-align: center;
    position: absolute;
    /* left: 50%;
    top: 50%; */
    /* -webkit-transform: translate3D(-50%, -50%, 0);
    transform: translate3D(-50%, -50%, 0);
    will-change: transform;
    z-index: 197 !important; */
    cursor: pointer;
    /* -webkit-transition: .3s ease all; */
    /* transition: .3s ease all; */
    border: 2px solid #e2dddd;;
    display: inline-flex;
}

.switch-button .active {
    color: #151515;
    background-color: white;
    position: absolute;
    left: 0;
    top: 0;
    width: 50%;
    height: 100%;
    z-index: -1;
    -webkit-transition: .3s ease-out all;
    transition: .3s ease-out all;
}

.switch-button .active-case {
    color: #fff;
    background: #ee8d32;
    /* line-height: 3; */
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
                     {{isset($user) ? 'Update' : 'Create'}} User
                  </h3>
               </div>
            </div>
            @if($errors->any())
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
               @endforeach
            @endif

            <!--begin::Form-->
            @php 
            $route = route('backend.user.store');
            if(isset($user)){
            $route = route('backend.user.update',$user->id);
            }
            @endphp
            <form action="{{$route}}" method="POST" id="registerForm" enctype="multipart/form-data" class="kt-form">
               @csrf
               @if(isset($user))
               {{ method_field('PATCH') }}
               @endif

               <input type="hidden" name="account_type" value="candidate">
               <div class="kt-portlet__body">
                  <div class="row">
                     <div class="col-md-8 col-sm-12 col-xs-12 mx-auto">
                        <br />

                        {{-- <div class="form-group">
                           <label class="col-md-12">Add Role</label>
                           <div class="col-md-12">
                           <select class="form-control" name="role_id">
                              <option value="">Select Role</option>
                              @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                              @endforeach
                           </select>
                           </div>
                        </div> --}}
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <div class="form-group">
                              <div class="tg-btn-sp m-b-20">
                                 <div class="switch-button">
                                    <span class="active"></span>
                                    <span class="switch-button-case left">Creator</span>
                                    <span class="switch-button-case right active-case">Creative</span>
                                 </div>
                              </div>
                              </div>
                           </div>
                        </div>
                        

                        <div class="row">
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>First Name</label>
                                 <input type="text" class="form-control" name="f_name" value="{{isset($user)?$user->f_name : ''}}"/> 
                                 
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Last Name</label>
                                 <input type="text" class="form-control" name="l_name" value="{{isset($user)?$user->l_name : ''}}"/> 
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dob</label>
                                 <input type="date" class="form-control" name="dob" value="{{isset($user)?/* $user->age */$user->dob : ''}}"/> 
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Phone</label>
                                 
                                 <input type="tel" maxlength="15"  class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                 <input type="tel" class="hide" name="new_phone" id="hiden">
                                 <span id="valid-msg" class="valid-feedback hide">✓ Valid</span>
                                 <span id="error-msg" class="invalid-feedback hide"></span>
                                 
                                 @error('phone')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                 @enderror
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Gender</label>
                                 <select class="form-control" name="gender">
                                    <option value="">Select gender</option>
                                    <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>male</option>
                                    <option value="female" {{old('gender')=='female' ? 'selected' : '' }}>female</option>
                                    <option value="transgender" {{old('gender')=='transgender' ? 'selected' : '' }}>Transgender</option>
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Country</label>
                                 
                                 <select name="country" id="country" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->nicename}}" {{ !is_null(old('country')) ? (old('country')==$country->nicename ?'selected':''): ($country->nicename=="United States" ? 'selected' : '')}}>{{$country->nicename}}</option>
                                    @endforeach
                                    
                                </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>City</label>
                                 
                                 <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city">
                                 @error('city')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>State</label>
                              
                                 <input type="text" class="form-control" name="state" value="{{ old('state') }}" id="state">
                                 @error('state')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Zipcode</label>
                              
                                 <input type="text" class="form-control" value="{{ old('zipcode') }}" name="zipcode" id="zipcode">
                                    @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="">Home Address 1</label>
                                 <input type="text" class="form-control" name="h_adress_1" value="{{ old('h_adress_1') }}" id="h_adress_1" required>
                                 
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Create a Password</label>
                              
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> 
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-12 col-sm-9 col-xs-12">
                              <button type="submit" id="registerSubmitBtn" class="btn btn-info btn-xs" role="button" style="font-size:13px" ><b>Save</b></button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->			
         </div>
         <!--end::Portlet-->
      </div>
   </div>
</div>
@endsection
@section('scripts')
<!-- Third Party Scripts(used by this page)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
<script>
   var user_type = 'agent';

   var switchButton            = document.querySelector('.switch-button');
   var switchBtnRight          = document.querySelector('.switch-button-case.right');
   var switchBtnLeft           = document.querySelector('.switch-button-case.left');
   var activeSwitch            = document.querySelector('.active');

   function switchLeft(){
       user_type = 'agent';
       switchBtnRight.classList.remove('active-case');
       switchBtnLeft.classList.add('active-case');
       activeSwitch.style.left = '0%';
       $('[name="account_type"]').val('agent');
   }

   function switchRight(){
       user_type = 'candidate';
       switchBtnRight.classList.add('active-case');
       switchBtnLeft.classList.remove('active-case');
       activeSwitch.style.left = '50%';
       $('[name="account_type"]').val('candidate');
   }

   
   switchBtnLeft.addEventListener('click', function(){
       switchLeft();
   }, false);

   switchBtnRight.addEventListener('click', function(){
       switchRight();
   }, false);

</script>
<script type="text/javascript">
   
   $(document).ready(function(){

      @if (session('status'))
         toastr.success('{{session('status')}}', "Success");
      @endif
   })

   $(document).ready(function(){
		window.sidebar_search=function() {
			var input, filter, div, childdiv, label, i, txtValue;
			input = document.getElementById("admin_sidebar_search");
			filter = input.value.toUpperCase();
			div = document.getElementById("admin_sidebar");
			childdiv = div.getElementsByTagName("div");
			//console.log(childdiv);
			for (i = 0; i < childdiv.length; i++) {
				label = childdiv[i].getElementsByTagName("label");
				//console.log(a);
				if(label.length !=0)
				{
					label = childdiv[i].getElementsByTagName("label")[0]
					//console.log(label);
					txtValue = label.textContent || label.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						childdiv[i].style.display = "";
					} else {
						childdiv[i].style.display = "none";
					}
				}
			}
		}
		
	})
   
</script>

{{-------------------------}}
    {{-- input phone setting --}}
    <script>
      /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/

      var phone = document.querySelector("#phone"),
          errorMsg = document.querySelector("#error-msg"),
          validMsg = document.querySelector("#valid-msg");
      
      // here, the index maps to the error code returned from getValidationError - see readme
      var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

      var iti=window.intlTelInput(phone,{
          initialCountry: "us",
          separateDialCode: true,
          preferredCountries: ["fr", "us", "gb"],
          geoIpLookup: function (callback) {
              $.get('https://ipinfo.io', function () {
              }, "jsonp").always(function (resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
              });
          },
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
      });

      var hiden_phone = document.querySelector("#hiden");
      window.intlTelInput(hiden_phone,{
          initialCountry: "us",
          dropdownContainer: 'body',
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
      });

      var reset = function() {
          phone.classList.remove("error");
          errorMsg.innerHTML = "";
          errorMsg.classList.add("hide");
          validMsg.classList.add("hide");
      };

      var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);

      $(document).ready(function () {
          $('#phone').mask(mask1)
      });

      $("#phone").on("countrychange", function (e, countryData) {
          $("#phone").val('');
          var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);
          $('#phone').mask(mask1);

      });

      // on blur: validate
      phone.addEventListener('blur', function() {
      reset();
      if (phone.value.trim()) {
          if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
          } else {
          phone.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
          }
      }
      });

      $('input.hide').parent().hide();

      // on keyup / change flag: reset
      phone.addEventListener('change', reset);
      phone.addEventListener('keyup', reset);

  </script>
  {{-- end input phone setting --}}
  {{-------------------------}}

  <script>
      $('#registerSubmitBtn').on('click',function(e){
          e.preventDefault();
          if (iti.isValidNumber()) {
              var country_data=iti.getSelectedCountryData();
              console.log(country_data);
              document.getElementById("hiden").value = JSON.stringify(country_data);
              $('#registerForm').submit();
          } else {
              phone.classList.add("error");
              var errorCode = iti.getValidationError();
              errorMsg.innerHTML = errorMap[errorCode];
              errorMsg.classList.remove("hide");
              $('html, body').animate({
                  scrollTop: $("#phone-div").position().top
              }, 800);
              return false;
          }
      })
  </script>

  <script>
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if(dd<10){
              dd='0'+dd
          } 
          if(mm<10){
              mm='0'+mm
          } 

      today = yyyy+'-'+mm+'-'+dd;
      document.getElementById("dob").setAttribute("max", today)
  </script>
@endsection