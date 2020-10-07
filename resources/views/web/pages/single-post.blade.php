@extends('web.layouts.app')

@section('content')

<!-- Slider Section Start -->
	<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="page__subtitle title__grey">Forum Jobs & Castings</div>
					<h1 class="page__title">Free acting lessons</h1>
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Blog Section Start -->
	<div class="section blog">
		<div class="container">
			<div class="row">
				<div class="post-single col-md-7">
					<article class="post-single__content">
						<div class="post__thumbnail">
							<img src="{{ asset('web/img/single-post.jpg') }}" alt="">
						</div>
						<div class="post__meta post__meta_single">
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

						<h2 class="post__title">The 6 Step Non Surgical Facial Rejuvenation Program</h2>
						<p class="post__date date">01 dec 2016</p>
						<div class="post__text">
							<p>Cosmetic surgery, like other forms of elective surgery, involves a physical change to one’s appearance. Also known as plastic surgery, there are two kinds: cosmetic and reconstruction. The latter involves returning an individual’s sense of self after some form of injury and/or illness. The former allows the ability to overcome the physical characteristics one was born with. In a way, the former represents the forefront of how changes in technology can allow changes to the human body.</p>

							<p>This surgery comes in all types, from the use of prosthetics as in breast augmentation and liposuction to non-invasive forms of surgery like laser hair removal or even laser correction of the eyes to eliminate the need for eye glasses.</p>

							<cite>The fact remains that human beings have been altering their appearance for quite some time now</cite>

							<p>None of this comes without a price however. Besides financial concerns, it remains the responsibility of the individual who will undergo such surgery. For this reason, they do need the support of those around them. This is the kind of support that not only affects their decision, but their ability to assimilate the surgical changes to the body.</p>

							<p>In the case of surgery for cosmetic – as oppposed to reconstruction – purposes is the issue of aesthetics. Those around them need to understand the significance societies place upon appearance. How the appearance of someone can alter how they are perceived not only as a person, but as a human being. Surgery for aesthetic reasons, provides people with the opportunity to overcome stigmas associated with their appearance. However, what remains most important is that it’s a choice.</p>

						</div>
					</article> <!-- end of blog__post -->


					<div class="post__widget">
						<h4 class="widget__title">Popular Tags</h4>
						<div class="widget__tagcloud">
							<a href="#" class="tagcloud__item">Backstage</a>
							<a href="#" class="tagcloud__item">Elite</a>
							<a href="#" class="tagcloud__item">Fashion</a>
							<a href="#" class="tagcloud__item">Milano</a>
						</div>
					</div>

					<nav class="post__navigation">
					  <div class="nav-links row">
				  		<figure class="nav-links__previous col-sm-6">
							<span class="pull-left"><a href="#"><img src="{{ asset('web/img/nav-prev.jpg') }}" alt=""></a></span>
							<figcaption class="widget-latest__content">
								<a href="#" class="widget-latest__title">Easy Home Remedy For</a>
								<p class="widget-latest__date">16 Oct 2016</p>
							</figcaption>
						</figure>

						<figure class="nav-links__next col-sm-6">
							<span class="pull-right"><a href="#"><img src="{{ asset('web/img/nav-next.jpg') }}" alt=""></a></span>
							<figcaption class="widget-latest__content">
								<a href="#" class="widget-latest__title">Does Hydroderm Work</a>
								<p class="widget-latest__date">13 Dec 2016</p>
							</figcaption>
						</figure>

					  </div>
					</nav>
					<div class="comments">
   						<h3>4 comments</h3>
   						<hr />
   						<ol class="comment-list">
   							<li class="comment-list__item">
	   							<div class="comment__body">
	   								<div class="comment__avatar">
	   									<img src="{{ asset('web/img/ida.jpg') }}" alt="">
	   								</div>
	   								<div class="comment__info">
	   									<p class="comment__author">Ida Tyler</p>
	   									<p class="comment__date date">2 hours ago</p>
	   								</div>
	   								<div class="comment__content">
	   									Aloe is grown mainly in the dry regions of Africa, Asia, Europe and America. Because of its many therapeutic uses, it is now commercially cultivated in the United States, Japan, and countries in the Caribbean and Mediterranean.
	   								</div>
	   								<div class="comment__reply">
   										<button type="button" class="btn btn__grey animation">Reply</button>
   									</div>
	   							</div>
   								<ol class="comment-list children">
   									<li class="comment-list__item">
   										<div class="comment__body">
			   								<div class="comment__avatar">
			   									<img src="{{ asset('web/img/testimonal-photo.png') }}" alt="">
			   								</div>
			   								<div class="comment__info">
			   									<p class="comment__author">Ruby Little</p>
			   									<p class="comment__date date">2 days ago</p>
			   								</div>
			   								<div class="comment__content">Have you recently been engaged? If you have, have you started planning your wedding yet? If you haven’t, you will want to get started with the planning soon.
			   								</div>
			   								<div class="comment__reply">
		   										<button type="button" class="btn btn__grey animation">Reply</button>
		   									</div>
			   							</div>
   									</li>
   									<li class="comment-list__item">
   										<div class="comment__body">
			   								<div class="comment__avatar">
			   									<img src="{{ asset('web/img/testimonal-photo2.png') }}" alt="">
			   								</div>
			   								<div class="comment__info">
			   									<p class="comment__author">Jonathan Miles</p>
			   									<p class="comment__date date">2 days ago</p>
			   								</div>
			   								<div class="comment__content">Before we begin to give you additional information on this topic, take a moment to think about how much you already know.
			   								</div>
			   								<div class="comment__reply">
		   										<button type="button" class="btn btn__grey animation">Reply</button>
		   									</div>
			   							</div>
   									</li>
   								</ol>
   							</li>
   							<li class="comment-list__item">
   								<div class="comment__body">
	   								<div class="comment__avatar">
	   									<img src="{{ asset('web/img/testimonal-photo3.png') }}" alt="">
	   								</div>
	   								<div class="comment__info">
	   									<p class="comment__author">Richard Morton</p>
	   									<p class="comment__date date">2 hours ago</p>
	   								</div>
	   								<div class="comment__content">What would you do if you could achieve the benefits of a professional skin care treatment at home for a fraction of the cost of a visit to the doctor or aesthetician? Cancel your next appointment, of course!</div>
	   								<div class="comment__reply">
   										<button type="button" class="btn btn__grey animation">Reply</button>
   									</div>
	   							</div>
   							</li>
   						</ol>
   						<div class="comment__respond">
	   						<h3>Leave your comment</h3>

	   						<form class="vertical-form">
								<div class="form-group">
			    					<label for="c-name">Name <span class="req">*</span></label>
			    					<input type="text" class="form-control" id="c-name">
				    			</div>
				    			<div class="form-group">
			    					<label for="c-email">Email <span class="req">*</span></label>
			    					<input type="email" class="form-control" id="c-email">
								</div>
								<div class="form-group">
				    				<label for="c-text">Your message <span class="req">*</span></label>
									<textarea name="c-text" id="c-text" class="form-control"></textarea>
								</div>
								<input type="submit" class="btn btn__red animation" name="update_cart" value="Submit comment" />
							</form>

						</div>
   					</div>
				</div>

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

					<div class="sidebar-widget">
						<h4 class="widget__title">Latest Topics</h4>
						<div class="widget__latest">
							<figure class="widget-latest__post">
								<span class="pull-left"><a href="#"><img src="{{ asset('web/img/jessica-alba-campari-bts-56.jpg') }}" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="#" class="widget-latest__title">Anti Aging Skin Care The Basics</a>
									<p class="widget-latest__date">19 Oct 2016</p>
								</figcaption>
							</figure>

							<figure class="widget-latest__post">
								<span class="pull-left"><a href="#"><img src="{{ asset('web/img/jessica-alba-campari-bts-45.jpg') }}" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="#" class="widget-latest__title">Ageing Skin Care Does</a>
									<p class="widget-latest__date">15 nov 2016</p>
								</figcaption>
							</figure>

							<figure class="widget-latest__post">
								<span class="pull-left"><a href="#"><img src="{{ asset('web/img/jessica-alba-campari-bts-34.jpg') }}" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="#" class="widget-latest__title">Easy Home Remedy For</a>
									<p class="widget-latest__date">16 Oct 2016</p>
								</figcaption>
							</figure>

							<figure class="widget-latest__post">
								<span class="pull-left"><a href="#"><img src="{{ asset('web/img/jessica-alba-campari-bts-57.jpg') }}" alt=""></a></span>
								<figcaption class="widget-latest__content">
									<a href="#" class="widget-latest__title">Does Hydroderm Work</a>
									<p class="widget-latest__date">16 dec 2016</p>
								</figcaption>
							</figure>
						</div>
					</div>
					
					<div class="sidebar-widget">
						<h4 class="widget__title">we are social</h4>
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