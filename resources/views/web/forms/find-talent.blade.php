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
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <form class="apply-form form-horizontal" method="POST" action="#">
                       @csrf
                        <div class="form-block">
                            <div class="form-group">
                                <label for="f_name" class="col-sm-4 control-label">Search Candidates by names <span class="req">*</span></label>
                                 <div class="col-sm-8">
                               <input class="form-control" type="text" aria-label="Search">
                            </div> 
                        </div>

                         <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">Profile Type</label>
                                <div class="col-sm-8">
                                    <select name="state" id="state" class="form-control">
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
                                <label for="dob" class="col-sm-4 control-label">Date of birth <span class="req">*</span></label>
                                <div class="col-sm-8 ">
								 <select id="example-getting-started"  multiple="multiple" hidden>
										    <option value="cheese">Cheese</option>
										<option value="tomatoes">Tomatoes</option>
										<option value="mozarella">Mozzarella</option>
										<option value="mushrooms">Mushrooms</option>
										<option value="pepperoni">Pepperoni</option>
										<option value="onions">Onions</option>
												</select>
                                 </div>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email <span class="req">*</span></label>
                                <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                             
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password <span class="req">*</span></label>
                                <<div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Confirm Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-4 control-label">Country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="country" id="country">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="city" class="col-sm-4 control-label">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-4 control-label">State</label>
                                <div class="col-sm-8">
                                  
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="h_adress_2" class="col-sm-4 control-label">Home Address 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="h_adress_2" name="h_adress_2">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="zipcode" class="col-sm-4 control-label">ZipCode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="zipcode" id="zipcode">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="submit" class="btn btn-default btn__red animation btn-full pull-right">apply now</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section><!-- Services Section End -->
@endsection
@section('scripts')




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js" integrity="sha512-aFvi2oPv3NjnjQv1Y/hmKD7RNMendo4CZ2DwQqMWzoURKxcqAoktj0nNG4LU8m23+Ws9X5uVDD4OXLqpUVXD5Q==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>
@endsection