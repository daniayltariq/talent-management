@extends('web.layouts.app')


@section('styles')
<style type="text/css">


.pick-item:hover
{
    -webkit-animation: swing 1s ease;
    animation: swing 1s ease;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1;
    cursor: pointer;
}


.picklist{
	margin-top: 3rem
}

.pick-item {
    margin-bottom: 15px;
    padding: 20px 25px;
    background: #ffffff;
    border-radius: 0px;
    transition: all 0.3s ease;
    box-shadow: 0px 10px 14px #61616142
}

</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">TOPICS</h1>
			</div>
		</div>
	</div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog picklist">
	<div class="container">
		<div class="row">
			<div class="blog__posts col-sm-10 col-centered">
				<div class="blog__list">
					<h4 class="widget__title">Topics</h4>

					<a href="">
						{{-- <h4 class="widget__title pull-right widget__titless" >Browse all picklists</h4> --}}
					</a>


					<div class="row">
						@foreach($topics as $topic)
							<div class="col-sm-12">
								<a href="{{ route('agent.topic.edit', $topic->id)}}">
									<div class="pick-item">
										<h3>{{ $topic->title }}</h3>
										 <p>
										 	{{ \Illuminate\Support\Str::words(strip_tags($topic->content), 30,'...') }}
										 </p>
									</div>
								</a>
							</div>
						@endforeach
					</div>
					
					
				</div>
				<!-- end of blog__list -->
				<nav class="blog__pagination">
					 @if ($topics->lastPage() > 1)
					    <ul class="pagination">
					        <li class="{{ ($topics->currentPage() == 1) ? ' disabled' : '' }}">
					            <a href="{{ $topics->url(1) }}">First</a>
					         </li>
					        @for ($i = 1; $i <= $topics->lastPage(); $i++)
					            <?php
					            $half_total_links = floor(5 / 2);
					            $from = $topics->currentPage() - $half_total_links;
					            $to = $topics->currentPage() + $half_total_links;
					            if ($topics->currentPage() < $half_total_links) {
					               $to += $half_total_links - $topics->currentPage();
					            }
					            if ($topics->lastPage() - $topics->currentPage() < $half_total_links) {
					                $from -= $half_total_links - ($topics->lastPage() - $topics->currentPage()) - 1;
					            }
					            ?>
					            @if ($from < $i && $i < $to)
					                <li class="{{ ($topics->currentPage() == $i) ? ' active' : '' }}">
					                    <a href="{{ $topics->url($i) }}">{{ $i }}</a>
					                </li>
					            @endif
					        @endfor
					        <li class="{{ ($topics->currentPage() == $topics->lastPage()) ? ' disabled' : '' }}">
					            <a href="{{ $topics->url($topics->lastPage()) }}">Last</a>
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