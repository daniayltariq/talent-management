@extends('web.layouts.app')

@section('content')

  <!-- Slider Section Start -->
  <section class="page__img" style="background-image: url('/img/apply_bg.jpg')">
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
        <h3 class="text__quote centered">Please provide us with your contact information.</h3>
        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
          <form class="apply-form form-horizontal">
            <div class="form-block">
                    <div class="form-group">
                        <label for="f_name" class="col-sm-4 control-label">First Name <span class="req">*</span></label>
                        <div class="col-sm-8">
                         <input type="file"  accept="image/gif, image/jpeg, image/png" name="image" id="file"><p><label for="file" style="cursor: pointer;">Upload Image</label></p>
                        <img id="output" width="200" /> 
                        <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="l_name" class="col-sm-4 control-label">Last name <span class="req">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="l_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-4 control-label">Gender <span class="req">*</span></label>
                        <div class="col-sm-8">
                          <select name="gender" id="gender" class="form-control" required>
                    <option label="Select"></option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                          </select>
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="b-date" class="col-sm-4 control-label">Date of birth <span class="req">*</span></label>
                        <div class="col-sm-8 form-row">
                          <div class="form-row__col form-row__col_xs">
                            <input type="text" class="form-control" id="b-date">
                          </div>
                          <div class="form-row__col form-row__col_s">
                            <select name="b-month" id="b-month" class="form-control" required>
                      <option label="Select"></option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                          <div class="form-row__col form-row__col_m">
                            <input type="text" class="form-control" id="b-year" required>
                          </div>
                       </div>
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
<script>
var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

@endsection