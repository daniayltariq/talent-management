@extends('web.layouts.app')

@section('content')

  <!-- Slider Section Start -->
  <section class="page__img" style="background-image: url('/img/apply_bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="title__wrapp">
          <div class="{{-- page__subtitle --}} title__grey">Apply</div>
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
                   <label for="f_name" class="col-sm-4 control-label">Photos <span class="req">*</span></label>
                  <div class="col-sm-8">
                      <input id="file-input" type="file" style="margin-top: 20px" multiple>
                      <br>
                      <div id="preview" style="display: flex" ></div>
                   </div>
              </div>

              <div class="form-group">
                    <label for="f_name" class="col-sm-4 control-label">Videos <span class="req">*</span></label>
                <div class="col-sm-8">    
              <input type="file" name="file[]" class="file_multi_video" style="margin-top: 20px" accept="video/*">
              <br>
                  <video width="200" controls style="display: none" id="video_preview">
                <source src="mov_bbb.mp4" id="video_here">
                  Your browser does not support HTML5 video.
              </video>
                </div>

              </div>  

            
              <div class="form-group">
                    <label for="f_name" class="col-sm-4 control-label">Videos <span class="req">*</span></label>
                <div class="col-sm-8">    
              <input id="uploadPDF"  style="margin-top: 20px"  type="file" name="myPDF"/>&nbsp;
        <input type="button" value="Preview" onclick="PreviewImage();" />

        <div style="clear:both">
           <iframe id="viewer" frameborder="0" scrolling="no" width="200" height="200" style="display: none"></iframe>
        </div>
                </div>

              </div>  

            
        {{--       <div class="form-group">
                    <label for="f_name" class="col-sm-4 control-label">Videos <span class="req">*</span></label>
                <div class="col-sm-8">    
             <input type="file" id="myfile" name="myfile" size="30" onchange="doTest()"></p>
              <br>
                    <img id="uploadPreview" src="" width="100" style="display:none" />
                </div>

              </div> --}}
               
                  <div class="form-group">
                        <label for="address2" class="col-sm-4 control-label">Home Address 2</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="address2">
                      </div>
                    </div>
                
                    <div class="form-group">
                        <label for="zip" class="col-sm-4 control-label">ZipCode</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="zip">
                      </div>
                    </div>
                    <div class="row">
                <div class="col-sm-8 col-sm-offset-4">
                  <button type="submit" class="btn btn-default btn__red animation btn-full pull-right">apply now</button>
                </div>
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

function previewImages() {

  var $preview = $('#preview').empty();
  if (this.files) $.each(this.files, readAndPreview);

  function readAndPreview(i, file) {
    
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
      return alert(file.name +" is not an image");
    } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:100}));
    });

    reader.readAsDataURL(file);
    
  }

}

$('#file-input').on("change", previewImages);
$(document).on("change", ".file_multi_video", function(evt) {
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
  $('#video_preview').css('display','block');
});

 function PreviewImage() {
                pdffile=document.getElementById("uploadPDF").files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                $("#viewer").css('display','block');
                $('#viewer').attr('src',pdffile_url);
            }
 // if (window.FileReader) {
    
 //      var reader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i; 
      
 //      reader.onload = function (oFREvent) { 
 //        preview = document.getElementById("uploadPreview")
 //        preview.src = oFREvent.target.result;  
 //        preview.style.display = "block";
 //      };  
  
 //      function doTest() {
        
 //        if (document.getElementById("myfile").files.length === 0) { return; }  
 //        var file = document.getElementById("myfile").files[0];  
 //        if (!rFilter.test(file.type)) { alert("You must select a valid image file!"); return; }  
 //        reader.readAsDataURL(file); 
 //      }
        
 //  } else {
 //    alert("FileReader object not found :( \nTry using Chrome, Firefox or WebKit");
 //  }
</script>

@endsection