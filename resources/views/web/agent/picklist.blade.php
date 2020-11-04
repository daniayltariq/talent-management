@extends('web.layouts.app')


@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,900">
<style type="text/css">

#picklist-modal {
  font-family: 'Roboto', sans-serif !important;
}
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
    box-shadow: 0px 10px 14px #61616142
}

</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">PICKLIST</h1>
			</div>
		</div>
	</div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog picklist">
	<div class="container">
		<div class="row">
			<div class="blog__posts col-sm-10 col-centered">
				<div class="blog__list">
					<h4 class="widget__title">My Picklists</h4>

					<a href="">
						<h4 class="widget__title pull-right widget__titless" >Browse all picklists</h4>
					</a>


					<div class="row">
						@forelse ($picklist as $item)
							<div class="col-sm-12">
								<a href="{{ route('agent.picklist.show',$item->id) }}">
									<div class="pick-item">
										<h3>{{$item->title}}. ({{count($item->items)}})</h3>
										<p>{{$item->description}}</p>
									</div>
								</a>
							</div>
						@empty
						<div class="col-sm-12">
							<h4 style="text-align: center">No Picklist found</h4>
						</div>
						@endforelse
						
						{{-- <div class="col-sm-12">
							<div class="pick-item">
								<h3>Children 5-8 years old with blue eyes (30)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>Adults over 60 with dancing skills (15)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>Lorem Ipsum (8)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div> --}}
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