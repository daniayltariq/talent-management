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
					<h4 class="widget__title">{{$picklist->title}}.</h4>

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
							@foreach ($items as $item)
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
												<h2>{{$item->member->profile->legal_first_name ?? ''}}
													{{$item->member->profile->legal_last_name ?? ''}}</h2>
												<p>www.thetalentdepot.com/johnmsmith</p>
											</div>

											<div class="talent-skill">
												<p><b>Specials Skills</b></p>
												{{-- {{dd($item->member->skills)}} --}}
												@if ($item->member()->exists() && $item->member->skills()->exists())
													<p>
														@foreach ($item->member->skills as $skill)
														<span>{{$skill->skill->title. (!$loop->last ?',':'')}} </span>
														@endforeach
													</p>
												@endif
												
												{{-- <p>Basketball, Baseball, Golf, Rollerblading, Juggling, Scuba (PADI certified), Photography</p>

												<p>Valid Driver’s License and U.S. Passport.</p> --}}
											</div>
										</div>
										
									</div>
								</div>
							@endforeach
							
							{{-- <div class="single-talent mb-5">
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
							</div> --}}
							
						</div>
					</div>
					
					
				</div>
				<!-- end of blog__list -->
				<nav class="blog__pagination">
					@if ($items->lastPage() > 1)
					    <ul class="pagination">
					        <li class="{{ ($items->currentPage() == 1) ? ' disabled' : '' }}">
					            <a href="{{ $items->url(1) }}">First</a>
					         </li>
					        @for ($i = 1; $i <= $items->lastPage(); $i++)
					            <?php
					            $half_total_links = floor(5 / 2);
					            $from = $items->currentPage() - $half_total_links;
					            $to = $items->currentPage() + $half_total_links;
					            if ($items->currentPage() < $half_total_links) {
					               $to += $half_total_links - $items->currentPage();
					            }
					            if ($items->lastPage() - $items->currentPage() < $half_total_links) {
					                $from -= $half_total_links - ($items->lastPage() - $items->currentPage()) - 1;
					            }
					            ?>
					            @if ($from < $i && $i < $to)
					                <li class="{{ ($items->currentPage() == $i) ? ' active' : '' }}">
					                    <a href="{{ $items->url($i) }}">{{ $i }}</a>
					                </li>
					            @endif
					        @endfor
					        <li class="{{ ($items->currentPage() == $items->lastPage()) ? ' disabled' : '' }}">
					            <a href="{{ $items->url($items->lastPage()) }}">Last</a>
					        </li>
					    </ul>
					@endif
				</nav>
			</div>
			
		</div>
	</div>
</div>
<!-- Blog Section End -->
@endsection