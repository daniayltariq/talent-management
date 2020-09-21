@extends('web.layouts.app')

@section('content')
	<!-- Slider Section Start -->
	<section class="page__img" style="background-image: url('img/blog_bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="page__subtitle title__grey">from our blog</div>
					<h1 class="page__title">Blog</h1>
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

						<article class="blog__post">
							<a href="single-post.html">
								<div class="post__thumbnail">
									<img src="img/post1.jpg" alt="">
								</div>
							</a>
							<div class="post__content">
								<a href="single-post.html"><h3 class="post__title">The 6 Step Non Surgical Facial Rejuvenation Program</h3></a>
							</div>
							<p class="post__date date">01 dec 2016</p>
							<div class="post__excerpt">
								<p>Cosmetic surgery, like other forms of elective surgery, involves a physical change to one’s appearance. Also known as plastic surgery, there are two kinds: cosmetic and reconstruction. The latter involves returning an individual’s sense of self after some form of injury and/or</p>
							</div>
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
							<a href="single-post.html" class="btn btn-default btn__grey animation">read more</a>
						</article>


						<article class="blog__post">
							<a href="single-post.html">
								<div class="post__thumbnail">
									<img src="img/post2.jpg" alt="">
								</div>
							</a>
							<div class="post__content">
								<a href="single-post.html"><h3 class="post__title">Breast Augmentation Breast Enlargement Medical Tourism In The Philippine</h3></a>
							</div>
							<p class="post__date date">01 dec 2016</p>
							<div class="post__excerpt">
								<p>Cosmetic surgery, like other forms of elective surgery, involves a physical change to one’s appearance. Also known as plastic surgery, there are two kinds: cosmetic and reconstruction. The latter involves returning an individual’s sense of self after some form of injury and/or</p>
							</div>
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
							<a href="single-post.html" class="btn btn-default btn__grey animation">read more</a>
						</article>


						<article class="blog__post">
							<a href="single-post.html">
								<div class="post__thumbnail">
									<img src="img/post3.jpg" alt="">
								</div>
							</a>
							<div class="post__content">
								<h3 class="post__title"><a href="single-post.html">Having Your Breasts Reduced With Breast Augmentation</a></h3>
							</div>
							<p class="post__date date">23 sep 2016</p>
							<div class="post__excerpt">
								<p>There’s good news for parents who have a child born with significant hearing loss. Advances in technology are making it possible to address profound hearing loss in children as young as 12 months of age. Approximately one of every 1,000 newborns in the United States-about 33</p>
							</div>
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
							<a href="single-post.html" class="btn btn-default btn__grey animation">read more</a>
						</article>
					</div> <!-- end of blog__list -->
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
					    <li><a href="#">04</a></li>
					    <li><a href="#">05</a></li>
					    <li><a href="#">...</a></li>
					    <li><a href="#">06</a></li>
					    <li>
					      <a href="#" class="next" aria-label="Next">
					        <span aria-hidden="true">Next</span>
					      </a>
					    </li>
					  </ul>
					</nav>
				</div> <!-- end of blog__posts -->

				<aside class="blog__sidebar col-md-4 col-md-offset-1">
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

				</aside>
			</div>
		</div>
	</div><!-- Blog Section End -->



@endsection