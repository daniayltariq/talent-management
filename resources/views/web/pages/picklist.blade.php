@extends('web.layouts.app')


@section('styles')
<style type="text/css">


.pick-item:hover
{
    -webkit-animation: swing 1s ease;
    animation: swing 1s ease;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1;
    cursor: pointer;
}


.picklist{
	margin-top: 3rem
}

.pick-item {
    margin-bottom: 15px;
    padding: 20px 25px;
    background: #ffffff;
    border-radius: 0px;
    transition: all 0.3s ease;
    box-shadow: 0px 0px 50px #61616121;
}

</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">Picklist</h1>
			</div>
		</div>
	</div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog picklist">
	<div class="container">
		<div class="row">
			<div class="blog__posts col-md-12">
				<div class="blog__list">
					<h4 class="widget__title">My Picklists</h4>

					<a href="">
						<h4 class="widget__title pull-right widget__titless" >Browse all the picklist</h4>
					</a>


					<div class="row">
						<div class="col-sm-12">
							<a href="{{ route('picklist-single') }}">
								<div class="pick-item">
									<h3>My Favourite Pickilist (10)</h3>
									<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
								</div>
							</a>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>My Favourite Pickilist (30)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>My Favourite Pickilist (15)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>My Favourite Pickilist (8)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
					</div>
					
					
				</div>
				<!-- end of blog__list -->
				<nav class="blog__pagination">
					<ul class="pagination">
						<!-- <li>
							<a href="#" class="prev" aria-label="Previous">
							  <span aria-hidden="true">Previous</span>
							</a>
							</li> -->
						<li class="active"><a href="#">01 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">02</a></li>
						<li><a href="#">03</a></li>
						<li><a href="#">...</a></li>
						<li>
							<a href="#" class="next" aria-label="Next">
							<span aria-hidden="true">Next</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			
		</div>
	</div>
</div>
<!-- Blog Section End -->
@endsection