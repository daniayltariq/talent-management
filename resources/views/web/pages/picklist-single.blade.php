@extends('web.layouts.app')


@section('styles')
<style type="text/css">
.btn-share {
    padding: 16px 32px;
    font-size: 15px;
    margin-left: 10px;
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

					{{-- <a href="">

						<h4 class="widget__title pull-right widget__titless" >Browse conversations from all topics </h4>
					</a> --}}

					<div class="row mb-5">
						<div class="col-sm-10 col-centered">
							<div class="pull-right">
								<button class="btn btn-share"><i class="mdi mdi-message-outline"></i>  Send Message</button>
								<button class="btn btn-share"><i class="mdi mdi-email-outline"></i>  Share Picklist</button>
							</div>
						</div>
					</div>

					


					<div class="row ">
						<div class="col-sm-10 col-centered">
							<div class="single-talent mb-5">
								<div class="row">
									<div class="col-sm-4">
										<div class="profile-sec ml-5 mb-4">
											<img src="{{ asset('web/uploads/profile/talent-1.jpg') }}" class="img img-responsive">
										</div>
										<div class="ml-5 talent-specs">
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
										<div class="talent-intro">
											<h2>John M. Smith</h2>
											<p>www.thetalentdepot.com/johnmsmith</p>
										</div>

										<div class="talent-skill">
											<p><b>Specials Skills</b></p>
											<p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

											<p>Valid Driver’s License and U.S. Passport.</p>
										</div>
									</div>
									
								</div>
							</div>
							<div class="single-talent mb-5">
								<div class="row">
									<div class="col-sm-4">
										<div class="profile-sec ml-5 mb-4">
											<img src="{{ asset('web/uploads/profile/talent-2.jpg') }}" class="img img-responsive">
										</div>
										<div class="ml-5 talent-specs">
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
										<div class="talent-intro">
											<h2>Sally J. Jones</h2>
											<p>www.thetalentdepot.com/johnmsmith</p>
										</div>

										<div class="talent-skill">
											<p><b>Specials Skills</b></p>
											<p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

											<p>Valid Driver’s License and U.S. Passport.</p>
										</div>
									</div>
									
								</div>
							</div>
							<div class="single-talent mb-5">
								<div class="row">
									<div class="col-sm-4">
										<div class="profile-sec ml-5 mb-4">
											<img src="{{ asset('web/uploads/profile/talent-3.jpg') }}" class="img img-responsive">
										</div>
										<div class="ml-5 talent-specs">
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
										<div class="talent-intro">
											<h2>Sally J. Jones</h2>
											<p>www.thetalentdepot.com/johnmsmith</p>
										</div>

										<div class="talent-skill">
											<p><b>Specials Skills</b></p>
											<p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

											<p>Valid Driver’s License and U.S. Passport.</p>
										</div>
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