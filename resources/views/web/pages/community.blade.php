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

					<a href="">
						<h4 class="widget__title pull-right widget__titless" >Browse conversations from all topics </h4>
					</a>


					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">General</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="{{ route('single-post') }}">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="{{ route('single-post') }}">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="{{ route('single-post') }}">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>
					

					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">Jobs & Castings</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>

					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">Q & A</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>

					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">Career Development</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>

					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">Events</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>

					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">Congratulations</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>

					<article class="blog__post">
						<div class="post__content">
							<a href="{{ route('single-topic') }}">
								<h3 class="post__title">Industry News</h3>
							</a>
						</div>
						<p class="widget-latest__date">RECENT POSTS</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date">Replies: 0</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line" >Replies: 2</p>
						<a href="">
							<h4 class="widget__title height_line" >Free Acting Lessons</h4>
						</a>
						<p class="widget-latest__date" >Created July 2 at 6:47 PM By Theaterhippie  |  Last post by ShayaJ1215: September 13 at 12:46 AM</p>
						<p class="widget-latest__date height_line">Replies: 3</p>
						<div class="post__meta">
							<span class="post__comments">
							<a href="#"><i class="mdi mdi-comment-text"></i>167 comments</a>
							</span>
							<span class="post__views">
							<i class="mdi mdi-eye"></i>
							152 views
							</span>
							<span class="post__likes">
							<a href="#"><i class="mdi mdi-heart"></i>67 likes</a>
							</span>
						</div>
						<a href="single-post.html" class="btn btn-default btn__grey animation">28 Conversation</a>
						<a href="single-post.html" class="btn btn-default btn__grey animation">Follow Topic</a>
					</article>

					
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