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
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
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
                                <label for="ppersonel" class="col-sm-4 control-label">Production Company <span class="req">*</span></label>
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
                                <label for="phone" class="col-sm-4 control-label">Union Status</label>
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
                                <label for="password" class="col-sm-4 control-label">Compensation & Contract Details <span class="req">*</span></label>
                                <div class="col-md-6">
                            <textarea id="contract_details" name="contract_details" rows="4" cols="50" placeholder="At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
                            "></textarea>

                            </div>
                            </div>

                            <hr>
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
                                <label for="address" class="col-sm-4 control-label">Home Address 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="h_adress_1" id="h_adress_1">
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
        </section>
@endsection