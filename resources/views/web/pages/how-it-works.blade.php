@extends('web.layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style type="text/css">
	.max-127 {
		max-width: 127px;
	}

	.text-justify{
		text-align: justify;
	}

	.btn-pad{
		padding: 9px 21px;
	}
</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Looking for talent ?</div> --}}
                <h1 class="page__title">How It Works</h1>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="section how-it-works">
        <div class="container">
        	<div class="text-center">
        		<h2 class="text-dark">How Talent Depot works</h2>
        		{{-- <p>Simplify and streamline your casting process to find the perfect performers for your project.</p> --}}
        	</div>
            <div class="row mt-3">
            	<div class="col-sm-4 text-center">
            		<img class="max-127" src="{{ asset('web/img/vector_users.png') }}">
            		<h3>Become A Member</h3>
            		<p class="text-justify">As a member, The Talent Depot provides access and resources to promote talented individuals in a sleek, professional manner.
					</p>
					<p class="text-justify">A unique URL can be emailed, texted, or posted to anyone around the world looking for talent.Is the member a minor?
					</p>
					<p class="text-justify">Is the member a minor?</p>
					<div class="text-justify" style="width: 100%;display: flex">
						<div style="margin: 0px 20px;"><a href="{{route('pricing',['minor'=>true])}}"><input type="radio" name="member_minor" value="yes" id=""><span> Yes</span></a></div>
						<div><a href="{{route('pricing',['minor'=>false])}}"><input type="radio" name="member_minor" value="no" id=""><span> No</span></a></div>
					</div>
            	</div>
            	<div class="col-sm-4 text-center">
            		<img class="max-127" src="{{ asset('web/img/handshake.png') }}">
            		<h3>Become A Provider</h3>
            		<p class="text-justify">Are you looking for talented individuals for a gig, for a job, or for a project?</p>
					<p class="text-justify">To give our diverse pool of talent a host of opportunities, we offer providers a free account to search for and contact talent, as well as post job opportunities on our community forum.</p>
					<a href="{{route('agent_register')}}" class="btn btn-primary btn-pad">Sign Up</a>
            	</div>
            	<div class="col-sm-4 text-center">
            		<img class="max-127" src="{{ asset('web/img/wallet.png') }}">
            		<h3>Become an Affiliate</h3>
					<p class="text-justify">Do you have a keen eye or a keen ear to spot talent from all walks of life?  Are you the type of person that likes to see others reach their dreams of becoming an actor, model, musician and more?</p>
					<p class="text-justify">Becoming a Talent Depot affiliate allows you to be our eyes and ears in real life or online.</p>
					<a href="#" class="btn btn-primary btn-pad">Learn more</a>
            	</div>
            	
            </div>

            {{-- <div class="text-center mt-5">
            	<a href="{{route('register')}}" class="btn btn__red animation">Join now</a>
            </div> --}}
        </div>
    </div>
</section>

{{-- <section>
    <div class="section how-it-works">
        <div class="container">
        	<div class="text-center">
        		<h2 class="text-dark">How Talent Depot works for agents</h2>
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
            	<a href="{{route('register')}}" class="btn btn__red animation">Join now</a>
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
</section> --}}


@endsection