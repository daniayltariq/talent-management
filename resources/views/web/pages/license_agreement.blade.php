@extends('web.layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style type="text/css">

#over img {
  margin-left: auto;
  margin-right: auto;
  display: block;
}
</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Looking for talent ?</div> --}}
                <h1 class="page__title">LICENSE AGREEMENT</h1><h4 style="color: #fff">(Terms and Conditions)</h4>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="section how-it-works">
        <div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8" style="text-align: justify;">
                    <p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;'><span style='font-family:"Arial",sans-serif;color:gray;'>This License Agreement (Terms and Conditions) between The Talent Depot, (hereinafter &ldquo;Licensor&rdquo;) and &ldquo;You&rdquo; the individual, corporation, partnership, or other legal entity that will be using The Talent Depot website (hereinafter &ldquo;Licensee&rdquo;).<br> <br> The Licensee acknowledges that website contains proprietary and confidential information that is protected by copyrights, trademarks, service marks, patents or other proprietary rights and laws. Except as expressly authorized by The Talent Depot, Licensee agrees not to modify, rent, lease, loan, sell, distribute, or create derivative works based on the website, in whole or in part.<br> <br> The Licensee is solely responsible for all uploaded Content and understands that uploaded Content may be shared between clients and their peers. The Licensor assumes no responsibility for the misuse of any uploaded files nor can guarantee the security of the files uploaded.<br> <br> The Licensee shall not solicit or otherwise request or require that talent pay for goods or services as a condition prior to auditions or employment.<br> <br> The Licensee shall not upload obscene, pornographic, or otherwise inappropriate Content. The Licensor reserves the right to decide whether Content is appropriate and without prior notice may remove such Content at its sole discretion.<br> <br> Licensee shall defend, indemnify, and hold the Licensor, individually and collectively, harmless and free from and against any claim, loss, damage or other liability based on or otherwise arising out of Licensee&rsquo;s conduct.<br> <br>&nbsp;Licensee agrees that the Licensor may terminate Licensee password, account, or use of the Services if Licensor believes that Licensee has violated or acted inconsistently with the letter or spirit of this Agreement.</span></p>
                    <p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;'><span style="font-size:29px;">&nbsp;</span></p>
				</div>
			</div>
        </div>
    </div>
</section>

@endsection