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
                     Update Profile
                  </h3>
               </div>
            </div>
            @if($errors->any())
               <div class="row">
                  <div class="col-md-8 col-sm-12 col-xs-12 mx-auto">
                  @foreach ($errors->all() as $error)
                     <div>{{ $error }}</div>
                  @endforeach
                  </div>
               </div>
            @endif

            <!--begin::Form-->
            <form action="{{route('backend.profile.update')}}" method="POST" id="registerForm" enctype="multipart/form-data" class="kt-form">
               @csrf

               <div class="kt-portlet__body">
                  <div class="row">
                     <div class="col-md-8 col-sm-12 col-xs-12 mx-auto">
                        <br />
                        <div class="row">
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>First Name</label>
                                 <input type="text" class="form-control" name="f_name" value="{{auth()->user()->f_name ?? ''}}" required/> 
                                 
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name</label>
                                 <input type="text" class="form-control" name="l_name" value="{{auth()->user()->l_name ?? ''}}" required/> 
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" class="form-control" name="email" value="{{auth()->user()->email ?? ''}}" required/> 
                              </div>
                           </div>
                        </div>
                        
                        <div class="row">

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Create a Password</label>
                              
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"> 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Confirm Password</label>
                              
                                 <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" > 
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
@endsection