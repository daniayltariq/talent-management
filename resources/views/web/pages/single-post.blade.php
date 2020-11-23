@extends('web.layouts.app')

@section('styles')
	<style>
		.stage {
			padding:40px;
			text-align:center;}
			.stage a {
			line-height:1em;
			letter-spacing:0.06em;
			font-family: 'Lato', sans-serif;
			font-weight:normal;
			font-size:16px;
			text-decoration:none;
			color:#fff;
			background:#231f20;
			display:inline-block;
			padding:15px 12px 15px 15px;
			transition:background 200ms;
			border-radius:4px;
		}
		.stage a:hover {
			background:#c26322;
			color:#ffffff;
		}
		.stage a:after {
			font-weight:300;
			margin-left:20px;
			color:#cea052;
			font-size:18px;
			vertical-align:middle;
			transition:color 200ms;
		}

		.stage a:hover:after {
			color:#231f20;
		}

		.search .results {
			width: 91%;
			max-height: 350px;
			min-height: 140px;
			overflow: auto;
			display: none;
			position: absolute;
			top: 115px;
			left: 0;
			right: 0;
			z-index: 10;
			padding: 0;
			margin: 0;
			border-width: 1px;
			border-style: solid;
			border-color: #cbcfe2 #c8cee7 #c4c7d7;
			border-radius: 3px;
			background-color: #fdfdfd;
			
			-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			-ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			-o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		}

		.search .results li { display: block }

		.search .results li:first-child { margin-top: -1px }

		.search .results li:first-child:before, .search .results li:first-child:after {
			display: block;
			content: '';
			width: 0;
			height: 0;
			position: absolute;
			left: 50%;
			margin-left: -5px;
			border: 5px outset transparent;
		}

		.search .results li:first-child:before {
			border-bottom: 5px solid #c4c7d7;
			top: -11px;
		}

		.search .results li:first-child:after {
			border-bottom: 5px solid #fdfdfd;
			top: -10px;
		}

		.search .results li:first-child:hover:before, .search .results li:first-child:hover:after { display: none }

		.search .results li:last-child { margin-bottom: -1px }

		.search .results a {
			display: block;
			position: relative;
			margin: 0 -1px;
			padding: 6px 6px 6px 10px;
			color: #808394;
			font-weight: 500;
			/* text-shadow: 0 1px #fff; */
			border: 1px solid transparent;
			border-radius: 3px;
		}

		.search .results a span { font-size: 12px; }

		/* .search .results a:before {
			content: '';
			width: 18px;
			height: 18px;
			position: absolute;
			top: 50%;
			right: 10px;
			margin-top: -9px;
			background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
		} */

		.search .results li:hover {
			color: #fff;
			border-color: #ee7322;
    		background-color: #e88e54;
		}

		.search .results li:hover .hover-text-clr{
			color: #fff;
		}
	</style>
@endsection

@section('content')

	@include('web.partials.loader')
<!-- Slider Section Start -->
	<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					{{-- <div class="page__subtitle title__grey">Forum Jobs & Castings</div> --}}
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
							<img class="w-100"  src="{{ asset(isset($data) && $data->image ? $data->image : 'backend-assets/images/rec2.jpg') }}" alt="">
						</div>
						<div class="post__meta post__meta_single">
							<span class="post__comments">
								<a href="#comment-form-heading"><i class="mdi mdi-comment-text"></i>{{ count($data->comments) }} comments</a>
							</span>
							<span class="post__views">
								<i class="mdi mdi-eye"></i>
								{{ $data->views }} views
							</span>
							<span class="post__likes post__likes_wrapper_{{ $data->id }}">
								<a href="#" class="@if(\Auth::check()) mark_post_like @endif" data-topic="{{ $data->id }}"><i class="mdi mdi-heart"></i>{{ $data->likes_count }} likes</a>
							</span>
						</div>

						<h2 class="post__title">{{ $data->title }}</h2>
						<p class="post__date date">{{ $data->created_at->format('d M Y') }}</p>
						<div class="post__text">
							 {!! $data->content !!}
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
						<div id="comments">
							<h3>{{ count($comments) }} comments</h3>
							<hr />
							
							<ol class="comment-list" id="comments-list">	
								@include('web.components.comments',["comments"=>$comments])
								{{-- <h3>{{ count($data->comments) }} comments</h3>
								<hr />
								<ol class="comment-list">
									@foreach($data->comments as $comment)
									<li class="comment-list__item">
										<div class="comment__body">
											<div class="comment__avatar">
												<img src="{{ asset('web/img/ida.jpg') }}" alt="">
											</div>
											<div class="comment__info">
												<p class="comment__author">{{ $comment->user->f_name }} {{ $comment->user->l_name }}</p>
												<p class="comment__date date">{{ $comment->created_at->diffForHumans() }}</p>
											</div>
											<div class="comment__content">
												{{ $comment->comment }}
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
									@endforeach
									
								</ol> --}}
							</ol>
						</div>
						<div class="stage">
							<a href="#" id="read-more-btn" data-skipcount="{{count($comments)}}">Read More <i class="fas fa-arrow-down"></i></a>
						</div>
   						<div class="comment__respond">
	   						<h3 id="comment-form-heading">Leave your comment</h3>

	   						<form action="{{ route('post_comment') }}" method="post" class="vertical-form" id="comment-form">
	   							@csrf
								{{-- <div class="form-group">
			    					<label for="c-name">Name <span class="req">*</span></label>
			    					<input name="name" type="text" class="form-control" id="c-name">
				    			</div>
				    			<div class="form-group">
			    					<label for="c-email">Email <span class="req">*</span></label>
			    					<input name="" type="email" class="form-control" id="c-email">
								</div> --}}
								<input type="hidden" value="{{ $data->id }}" name="topic_id">
								{{-- <input type="hidden" value="{{ $data->id }}" name="topic_id"> --}}
								<div class="form-group">
				    				<label for="c-text">Your message <span class="req">*</span></label>
									<textarea name="comment" id="c-text" class="form-control"></textarea>
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
							  	<input type="text" class="form-control" name="search_post" id="search_post" aria-describedby="search-icon">
							  	<span class="input-group-addon" id="search-icon"><i class="glyphicon glyphicon-search"></i></span>
							</div>

							<div class="search">
                                
                            </div>
						</form>
					</div>

					<div class="sidebar-widget">
						<h4 class="widget__title">Latest Topics</h4>
						<div class="widget__latest">
							@foreach ($latest as $topic)
								<figure class="widget-latest__post">
									<span class="pull-left"></span>
									<figcaption class="widget-latest__content">
										<a href="#" class="widget-latest__title">{{$topic->title}}</a>
										<p class="widget-latest__date">{{$topic->created_at->diffForHumans()}}</p>
									</figcaption>
								</figure>
							@endforeach
							
						</div>
					</div>
					
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

@section('scripts')
<script>

	$(document).on('click','.reply_btn',function(e){
	  	
		$('<input>').attr({
			type: 'hidden',
			name: 'parent_comment',
			value: $(this).data('commentid')
		}).appendTo('form');

		$('#comment-form-heading').text('Replying to '+$(this).data('commentowner'));

		$('html, body').animate({
			scrollTop: $("#comment-form").offset().top
		}, 1000);
	});


	$(document).on('click','#read-more-btn',function(e){
		e.preventDefault();
		fullPageLoader(true);
		var skip=$(this).data('skipcount');
		$.ajax({
			url: "{{ route('read_more_comments') }}",
			type: 'get',
			data:{
				topic:"{{ $data->id }}",
				skipcount:$('#read-more-btn').attr('data-skipcount'),
			},
			success: function(res) {
				console.log(res);
				fullPageLoader(false);
				$('#comments-list').append(res);
				$('#read-more-btn').attr('data-skipcount',++skip);
			},
			error: function(error) {
			}
		});
	});
  
</script>

<script>
	$(document).on('keyup','#search_post',function(){
		$('.search').empty();
		if ($(this).val() !=='') {
			/* fullPageLoader(true); */
			$.get( "{{ route('post.suggest') }}",{
					q: $(this).val(),
					_token : "{{ csrf_token() }}"
				}, function( data ) {
					/* fullPageLoader(false); */
					$('.search').html(data);
					$('.results').show();
					/* updateSearchResult(data); */
			});
		}
		
	})

	$(document).on('click','.suggested-post',function(){
		var post_slug=$(this).data('postslug');
		window.location.replace('{{url('/')}}/community/single-post/'+post_slug);
	})
</script>
@endsection