@extends('web.layouts.app')


@section('styles')
<style type="text/css">
h4.widget__title.height_line {
    color: #ef7825;
}
article.blog__post {
    background: #fff6ef;
    padding: 15px 25px;
}
a.btn.btn-default.btn__grey.animation {
    color: #ffffff;
    background: #000000;
}
</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">Community</h1>
			</div>
		</div>
	</div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog">
	<div class="container">
		<div class="row">
			<div class="blog__posts col-md-12">
				<div class="blog__list">
					<h4 class="widget__title">TOPICS</h4>

					<a href="{{ route('community',['category' => 'all']) }}">
						<h4 class="widget__title pull-right widget__titless" >Browse conversations from all topics </h4>
					</a>

					@foreach($community as $comn)

						<article class="blog__post">
							<div class="post__content">
								<a href="{{ route('community.category',['slug' => $comn->slug]) }}">
									<h3 class="post__title">{{ $comn->title }}</h3>
								</a>
							</div>
							<p class="widget-latest__date">RECENT POSTS</p>

							@foreach($comn->topics->take(4) as $topic)
							<div>
								<a href="{{ route('single-post',['slug' => $topic->slug]) }}">
									<h4 class="widget__title height_line" >{{ $topic->title }}</h4>
								</a>
								<p class="widget-latest__date" >Created {{ $topic->created_at->format('M d') }} at {{ $topic->created_at->format('h:i A') }}  By {{ $topic->user->f_name }} {{ $topic->user->l_name }}</p>
							</div>

							@endforeach
							
						 
							{{-- <p class="widget-latest__date height_line">Replies: 3</p> --}}
							<div class="post__meta">
								<span class="post__comments">
								<a href="#"><i class="mdi mdi-comment-text"></i>{{$comn->comments_count ?? 0}} comments</a>
								</span>
								<span class="post__views">
								<i class="mdi mdi-eye"></i>
								{{$comn->topics_sum_views ?? 0}} views
								</span>
								<span class="post__likes">
								<a href="#"><i class="mdi mdi-heart"></i>{{$comn->likes_coun ?? 0}} likes</a>
								</span>
							</div>
							<a href="{{ route('community.category',['slug' => $comn->slug]) }}" class="btn btn-default btn__grey animation">{{ $comn->topics_count }} Conversation</a>
							<a href="{{ route('community.category',['slug' => $comn->slug]) }}" class="btn btn-default btn__grey animation">Follow Topic</a>
						</article>
						
					@endforeach
					

				
					
				</div>
				<!-- end of blog__list -->
 
					

				<nav class="blog__pagination">
					@if ($community->lastPage() > 1)
					    <ul class="pagination">
					        <li class="{{ ($community->currentPage() == 1) ? ' disabled' : '' }}">
					            <a href="{{ $community->url(1) }}">First</a>
					         </li>
					        @for ($i = 1; $i <= $community->lastPage(); $i++)
					            <?php
					            $half_total_links = floor(5 / 2);
					            $from = $community->currentPage() - $half_total_links;
					            $to = $community->currentPage() + $half_total_links;
					            if ($community->currentPage() < $half_total_links) {
					               $to += $half_total_links - $community->currentPage();
					            }
					            if ($community->lastPage() - $community->currentPage() < $half_total_links) {
					                $from -= $half_total_links - ($community->lastPage() - $community->currentPage()) - 1;
					            }
					            ?>
					            @if ($from < $i && $i < $to)
					                <li class="{{ ($community->currentPage() == $i) ? ' active' : '' }}">
					                    <a href="{{ $community->url($i) }}">{{ $i }}</a>
					                </li>
					            @endif
					        @endfor
					        <li class="{{ ($community->currentPage() == $community->lastPage()) ? ' disabled' : '' }}">
					            <a href="{{ $community->url($community->lastPage()) }}">Last</a>
					        </li>
					    </ul>
					@endif
					{{-- 
					<ul class="pagination">
						 
						<li class="active"><a href="#">01 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">02</a></li>
						<li><a href="#">03</a></li>
						<li><a href="#">...</a></li>
						<li>
							<a href="#" class="next" aria-label="Next">
							<span aria-hidden="true">Next</span>
							</a>
						</li>
					</ul> --}}
				</nav>
			</div>
			<!-- end of blog__posts -->
			{{-- <aside class="blog__sidebar col-md-4 col-md-offset-1">
				<div class="sidebar-widget">
					<h4 class="widget__title">Blog search</h4>
					<form class="widget__form">
						<div class="input-group">
							<input type="text" class="form-control" aria-describedby="search-icon">
							<span class="input-group-addon" id="search-icon"><i class="glyphicon glyphicon-search"></i></span>
						</div>
					</form>
				</div>
				<div class="sidebar-widget">
					<h4 class="widget__title">Categories</h4>
					<ul class="widget-category">
						<li class="active"><a href="#">Fashion</a></li>
						<li><a href="#">Milano</a></li>
						<li><a href="#">Models</a></li>
						<li><a href="#">Elite</a></li>
						<li><a href="#">Backstage</a></li>
					</ul>
				</div>
				<div class="sidebar-widget">
					<h4 class="widget__title">we are social</h4>
					<ul class="widget-social">
						<li><i class="mdi mdi-facebook"></i> <a href="#">Facebook</a></li>
						<li><i class="mdi mdi-twitter"></i> <a href="#">Twitter</a></li>
						<li><i class="mdi mdi-youtube-play"></i> <a href="#">Youtube</a></li>
						<li><i class="mdi mdi-instagram"></i> <a href="#">Instagram</a></li>
						<li><i class="mdi mdi-linkedin"></i> <a href="#">Linkedin</a></li>
					</ul>
				</div>
				<div class="sidebar-widget">
					<h4 class="widget__title">Latest posts</h4>
					<div class="widget__latest">
						<figure class="widget-latest__post">
							<span class="pull-left"><a href="single-post.html"><img src="img/jessica-alba-campari-bts-56.jpg" alt=""></a></span>
							<figcaption class="widget-latest__content">
								<a href="single-post.html" class="widget-latest__title">Anti Aging Skin Care The Basics</a>
								<p class="widget-latest__date">19 Oct 2016</p>
							</figcaption>
						</figure>
						<figure class="widget-latest__post">
							<span class="pull-left"><a href="single-post.html"><img src="img/jessica-alba-campari-bts-45.jpg" alt=""></a></span>
							<figcaption class="widget-latest__content">
								<a href="single-post.html" class="widget-latest__title">Ageing Skin Care Does</a>
								<p class="widget-latest__date">15 nov 2016</p>
							</figcaption>
						</figure>
						<figure class="widget-latest__post">
							<span class="pull-left"><a href="single-post.html"><img src="img/jessica-alba-campari-bts-34.jpg" alt=""></a></span>
							<figcaption class="widget-latest__content">
								<a href="single-post.html" class="widget-latest__title">Easy Home Remedy For</a>
								<p class="widget-latest__date">16 Oct 2016</p>
							</figcaption>
						</figure>
						<figure class="widget-latest__post">
							<span class="pull-left"><a href="single-post.html"><img src="img/jessica-alba-campari-bts-57.jpg" alt=""></a></span>
							<figcaption class="widget-latest__content">
								<a href="single-post.html" class="widget-latest__title">Does Hydroderm Work</a>
								<p class="widget-latest__date">16 dec 2016</p>
							</figcaption>
						</figure>
					</div>
				</div>
				<div class="sidebar-widget ">
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
				</div>
			</aside> --}}
		</div>
	</div>
</div>
<!-- Blog Section End -->
@endsection