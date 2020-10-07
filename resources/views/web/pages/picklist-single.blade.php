@extends('web.layouts.app')


@section('styles')
<style type="text/css">



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
						<h4 class="widget__title pull-right widget__titless" >Browse conversations from all topics </h4>
					</a>


					<div class="row">
						<div class="col-sm-12">
							<div class="single-talent">
								<div class="row">
									<div class="col-sm-4">
										<div class="profile-sec">
											<img src="{{ asset('web/uploads/profile/talent-1.jpg') }}" class="img img-responsive">
										</div>
										<div>
											<table>
												<tr>
													<th>Height</th>
													<td>5.8</td>
												</tr>
												<tr>
													<th>Weight</th>
													<td>162 lbs</td>
												</tr>
												<tr>
													<th>Hair</th>
													<td>Brown</td>
												</tr>
												<tr>
													<th>Eyes</th>
													<td>Blonde</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-sm-8">
										
									</div>
									
								</div>
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