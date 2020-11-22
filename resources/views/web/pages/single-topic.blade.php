@extends('web.layouts.app')
@section('content')
<!-- Slider Section Start -->
	<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="page__subtitle title__grey">from our community topics</div>
					<h1 class="page__title">{{ $category->title }}</h1>
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Blog Section Start -->
	<div class="section blog">
		<div class="container">
			<div class="row">
				<div class="blog__posts col-md-7">
					<div class="blog__list">

						@foreach($data as $topic)
							<article class="blog__post">
								<a href="{{ route('single-post',['slug' => $topic->slug]) }}">
									<div class="post__thumbnail">
										<img src="{{ asset(isset($topic) && $topic->image ? $topic->image : 'backend-assets/images/rec2.jpg') }}" alt="">
									</div>
								</a>
								<div class="post__content">
									<a href="{{ route('single-post',['slug' => $topic->slug]) }}"><h3 class="post__title">{{ $topic->title }}</h3></a>
								</div>
								<p class="post__date date">{{ $topic->created_at->format('d M Y') }}</p>
								<div class="post__excerpt">
									{{ \Illuminate\Support\Str::words(strip_tags($topic->content), 30,'...') }}
								</div>
								<div class="post__meta">
									<span class="post__comments">
										<a href="#"><i class="mdi mdi-comment-text"></i>0 comments</a>
									</span>
									<span class="post__views">
										<i class="mdi mdi-eye"></i>
										152 views
									</span>
									<span class="post__likes">
										<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
									</span>
								</div>
								<a href="{{ route('single-post',['slug' => $topic->slug]) }}" class="btn btn-default btn__grey animation">read more</a>
							</article>
						@endforeach
				  
					</div> <!-- end of blog__list -->
					<nav class="blog__pagination">
					   @if ($data->lastPage() > 1)
					    <ul class="pagination">
					        <li class="{{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
					            <a href="{{ $data->url(1) }}">First</a>
					         </li>
					        @for ($i = 1; $i <= $data->lastPage(); $i++)
					            <?php
					            $half_total_links = floor(5 / 2);
					            $from = $data->currentPage() - $half_total_links;
					            $to = $data->currentPage() + $half_total_links;
					            if ($data->currentPage() < $half_total_links) {
					               $to += $half_total_links - $data->currentPage();
					            }
					            if ($data->lastPage() - $data->currentPage() < $half_total_links) {
					                $from -= $half_total_links - ($data->lastPage() - $data->currentPage()) - 1;
					            }
					            ?>
					            @if ($from < $i && $i < $to)
					                <li class="{{ ($data->currentPage() == $i) ? ' active' : '' }}">
					                    <a href="{{ $data->url($i) }}">{{ $i }}</a>
					                </li>
					            @endif
					        @endfor
					        <li class="{{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
					            <a href="{{ $data->url($data->lastPage()) }}">Last</a>
					        </li>
					    </ul>
					@endif
					</nav>
				</div> <!-- end of blog__posts -->

				<aside class="blog__sidebar col-md-4 col-md-offset-1">
					<div class="sidebar-widget">
						<h4 class="widget__title">Post search</h4>
						<form class="widget__form">
							<div class="input-group">
							  	<input type="text" class="form-control" aria-describedby="search-icon">
							  	<span class="input-group-addon" id="search-icon"><i class="glyphicon glyphicon-search"></i></span>
							</div>
						</form>
					</div>
					
{{-- 
					<div class="sidebar-widget">
						<h4 class="widget__title">Latest Topics</h4>
						<div class="widget__latest">
							<figure class="widget-latest__post">
								<span class="pull-left"><a href="{{ route('single-post') }}"><img src="img/jessica-alba-campari-bts-56.jpg" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="{{ route('single-post') }}" class="widget-latest__title">Anti Aging Skin Care The Basics</a>
									<p class="widget-latest__date">19 Oct 2016</p>
								</figcaption>
							</figure>

							<figure class="widget-latest__post">
								<span class="pull-left"><a href="{{ route('single-post') }}"><img src="img/jessica-alba-campari-bts-45.jpg" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="{{ route('single-post') }}" class="widget-latest__title">Ageing Skin Care Does</a>
									<p class="widget-latest__date">15 nov 2016</p>
								</figcaption>
							</figure>

							<figure class="widget-latest__post">
								<span class="pull-left"><a href="{{ route('single-post') }}"><img src="img/jessica-alba-campari-bts-34.jpg" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="{{ route('single-post') }}" class="widget-latest__title">Easy Home Remedy For</a>
									<p class="widget-latest__date">16 Oct 2016</p>
								</figcaption>
							</figure>

							<figure class="widget-latest__post">
								<span class="pull-left"><a href="{{ route('single-post') }}"><img src="img/jessica-alba-campari-bts-57.jpg" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="{{ route('single-post') }}" class="widget-latest__title">Does Hydroderm Work</a>
									<p class="widget-latest__date">16 dec 2016</p>
								</figcaption>
							</figure>
						</div>
					</div>
					 --}}

					<div class="sidebar-widget">
						<h4 class="widget__title">our social media urls</h4>
						@include('web.components.widget-social')
					</div>

					{{-- <div class="sidebar-widget ">
						<h4 class="widget__title">Popular Tags</h4>
						<div class="widget__tagcloud">
							<a href="#" class="tagcloud__item">Backstage</a>
							<a href="#" class="tagcloud__item">Elite</a>
							<a href="#" class="tagcloud__item">Fashion</a>
							<a href="#" class="tagcloud__item">Milano</a>
						</div>
					</div>

					<div class="sidebar-widget widget-archives">
						<h4 class="widget__title">Archives</h4>
						<ul>
							<li><a href="#">November 2016</a></li>
							<li><a href="#">May 2016</a></li>
							<li><a href="#">December 2016</a></li>
							<li><a href="#">October 2016</a></li>
							<li><a href="#">April 2016</a></li>
						</ul>
					</div> --}}

				</aside>
			</div>
		</div>
	</div><!-- Blog Section End -->
@endsection