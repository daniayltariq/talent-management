<div class="popup" pd-popup="popupReferal">
    <div class="popup-inner">
       <div class="popup-contact-wrapper">
          <h4 class="popup-header mx-auto">{{auth()->user()->f_name ?? ''}} {{auth()->user()->l_name ?? ''}}</h4>

            <div class="row">
                <div class="col-md-12">
                    @if (auth()->user()->referal_code()->exists())
                        <div class="input-group d-flex p-4 mb-3">
                            <input type="text" class="form-control h-43" id="refer_link" value="{{url('/').'/signup/?referal='.auth()->user()->referal_code->refer_code}}" placeholder="Refer url" aria-label="Refer url" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-outline-secondary p-10-13 copy-btn" style="height: 43px;" onclick="copyToClipboard()" type="button">Copy</button>
                            </div>
                        </div>
                    @else
                        <button class="btn btn-primary p-10-13" id="refer-btn">Generate Referal link</button>
                        <div class="refer__div">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control h-43" id="refer_link" name="refer_link" placeholder="Refer url" aria-label="Refer url" aria-describedby="basic-addon2">
                                <div >
                                <button class="btn btn-outline-secondary p-10-13 copy-btn" onclick="copyToClipboard()" type="button">Copy</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
          <a class="popup-close" pd-popup-close="popupReferal" href="#"> </a>
       </div>
       
    </div>
</div>