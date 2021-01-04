@extends('web.layouts.app')

@section('content')
<section class="page__img" style="background-image: url('img/blog_bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
					<div class="{{-- page__subtitle --}} title__grey">from our magznines</div>
					<h1 class="page__title">Magzine</h1>
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Blog Section Start -->
	<div class="section blog">
		<div class="container">
			<div class="blog-grid row">
				<div class="blog-grid__sizer"></div>
				<div class="blog-grid__gutter"></div>
				<article class="blog-grid__post col-sm-4">
					<a href="{{route('magzine-single')}} ">
						<div class="post__thumbnail">
							<img src={{asset("img/blog-masorny_01.jpg")}} alt="">
						</div>
					</a>
					<div class="post__content">
						<a href="{{route('magzine-single')}} "><h3 class="post__title">The 6 Step Non Surgical Facial Rejuvenation</h3></a>
					</div>
					<p class="post__date date">01 dec 2016</p>
					<div class="post__excerpt">
						Cosmetic surgery, like other forms of elective surgery, involves a physical change to one’s appearance. Also known as plastic surgery, there are
					</div>
					<a href="{{route('magzine-single')}} " class="btn btn-default btn__grey animation">read more</a>
				</article>
				<article class="blog-grid__post col-sm-4">
					<a href="{{route('magzine-single')}} ">
						<div class="post__thumbnail">
							<img src={{asset("img/blog-masorny_02.jpg")}} alt="">
						</div>
					</a>
					<div class="post__content">
						<a href="{{route('magzine-single')}} "><h3 class="post__title">Breast Augmentation Breast Enlargement Medical Tourism In The Philippine</h3></a>
					</div>
					<p class="post__date date">01 dec 2016</p>
					<div class="post__excerpt">
						Some people find it hard to find the right perfume. This may smell good when this is sprayed into the air but this changes when this reacts with the skin.
					</div>
					<a href="{{route('magzine-single')}} " class="btn btn-default btn__grey animation">read more</a>
				</article>
				<article class="blog-grid__post col-sm-4">
					<a href="{{route('magzine-single')}} ">
						<div class="post__thumbnail">
							<img src={{asset("img/blog-masorny_03.jpg")}} alt="">
						</div>
					</a>
					<div class="post__content">
						<h3 class="post__title"><a href="{{route('magzine-single')}} ">Having Your Breasts Reduced With Breast Augmentation</a></h3>
					</div>
					<p class="post__date date">23 sep 2016</p>
					<div class="post__excerpt">
						There’s good news for parents who have a child born with significant hearing loss. Advances in technology are making it possible to address profound hearing loss in children as young as 12 months of age.
					</div>
					<a href="{{route('magzine-single')}} " class="btn btn-default btn__grey animation">read more</a>
				</article>
				<article class="blog-grid__post col-sm-4">
					<a href="{{route('magzine-single')}} ">
						<div class="post__thumbnail">
							<img src={{asset("img/blog-masorny_04.jpg")}} alt="">
						</div>
					</a>
					<div class="post__content">
						<h3 class="post__title"><a href="{{route('magzine-single')}} ">Summer Skin Care Tips For Radiant Skin</a></h3>
					</div>
					<p class="post__date date">01 dec 2016</p>
					<div class="post__excerpt">
						Cosmetic surgery, like other forms of elective surgery, involves a physical change to one’s appearance. Also known as plastic surgery, there are
					</div>
					<a href="{{route('magzine-single')}} " class="btn btn-default btn__grey animation">read more</a>
				</article>
				<article class="blog-grid__post col-sm-4">
					<a href="{{route('magzine-single')}} ">
						<div class="post__thumbnail">
							<img src={{asset("img/blog-masorny_05.jpg")}} alt="">
						</div>
					</a>
					<div class="post__content">
						<h3 class="post__title"><a href="{{route('magzine-single')}} ">Sleek Hair Sedu Style</a></h3>
					</div>
					<p class="post__date date">14 jul 2016</p>
					<div class="post__excerpt">
						Some people find it hard to find the right perfume. This may smell good when this is sprayed into the air but this changes when this reacts with the skin.
					</div>
					<a href="{{route('magzine-single')}} " class="btn btn-default btn__grey animation">read more</a>
				</article>
				<article class="blog-grid__post col-sm-4">
					<a href="{{route('magzine-single')}} ">
						<div class="post__thumbnail">
							<img src={{asset("img/blog-masorny_06.jpg")}} alt="">
						</div>
					</a>
					<div class="post__content">
						<h3 class="post__title"><a href="{{route('magzine-single')}} ">Types Of Cosmetics</a></h3>
					</div>
					<p class="post__date date">23 sep 2016</p>
					<div class="post__excerpt">
						There’s good news for parents who have a child born with significant hearing loss. Advances in technology are making it possible to address
					</div>
					<a href="{{route('magzine-single')}} " class="btn btn-default btn__grey animation">read more</a>
				</article>
			</div> <!-- end of blog__list -->

			<div>
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
  </ul>
</div>

		</div> <!-- end of container -->
	</div>
@endsection