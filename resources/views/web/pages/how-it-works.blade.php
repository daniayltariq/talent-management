@extends('web.layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style type="text/css">


</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Looking for talent ?</div> --}}
                <h1 class="page__title">HOW IT WORKS</h1>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="section how-it-works">
        <div class="container">
        	<div class="text-center">
        		<h2 class="text-dark">How Talent Depot works for agents</h2>
        		<p>Simplify and streamline your casting process to find the perfect performers for your project.</p>
        	</div>
            <div class="row mt-3">
            	<div class="col-sm-4 text-center">
            		<img class="max-250" src="{{ asset('web/img/howitworks/how-1.jpg') }}">
            		<h2>SignUp</h2>
            		<p>List your casting notices and auditions to immediately broadcast your project to thousands of actors and performers.</p>
            	</div>
            	<div class="col-sm-4 text-center">
            		<img class="max-250" src="{{ asset('web/img/howitworks/how-2.jpg') }}">
            		<h2>Find Talent</h2>
            		<p>List your casting notices and auditions to immediately broadcast your project to thousands of actors and performers.</p>
            	</div>
            	<div class="col-sm-4 text-center">
            		<img class="max-250" src="{{ asset('web/img/howitworks/how-3.jpg') }}">
            		<h2>Cast talent</h2>
            		<p>List your casting notices and auditions to immediately broadcast your project to thousands of actors and performers.</p>
            	</div>
            	
            </div>

            <div class="text-center mt-5">
            	<a href="http://127.0.0.1:8000/register" class="btn btn__red animation">Join now</a>
            </div>
        </div>
    </div>
</section>


<section class="section" >
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="outer">
					<div class="middle">
						<h4 class="u-text u-text-default u-text-palette-2-base u-text-1">Why Trust Us</h4>
						<p class="u-text u-text-default u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.&nbsp;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<img src="{{ asset('web/img/howitworks/whytrustus.jpg') }}" class="img img-responsive">
			</div>
		</div>
	</div>      
</section>


@endsection