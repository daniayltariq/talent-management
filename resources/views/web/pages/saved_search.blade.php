@extends('web.layouts.app')


@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,900">
<style type="text/css">

#picklist-modal {
  font-family: 'Roboto', sans-serif !important;
}
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

.bl{
	border-left: 5px solid #de7023;
}

</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
	<div class="container">
		<div class="row">
			<div class="title__wrapp">
				<h1 class="page__title">PICKLIST</h1>
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
					<h4 class="widget__title">Saved Searches</h4>

					{{-- <a href="">
						<h4 class="widget__title pull-right widget__titless" >Browse all picklists</h4>
					</a> --}}


					<div class="row">
						@forelse ($search as $item)
							<div class="col-sm-12">
								<a href="{{ route('backend.apply_saved_search',$item->id) }}">
									<div class="pick-item bl">
										<h3>{{$item->name}}</h3>
									</div>
								</a>
							</div>
						@empty
						<div class="col-sm-12">
							<h4 style="text-align: center">No search found</h4>
						</div>
						@endforelse
						
						{{-- <div class="col-sm-12">
							<div class="pick-item">
								<h3>Children 5-8 years old with blue eyes (30)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>Adults over 60 with dancing skills (15)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pick-item">
								<h3>Lorem Ipsum (8)</h3>
								<p>Upon payment of one of the following tiers packages, the user’s account becomes Active and they are able to create a profile</p>
							</div>
						</div> --}}
					</div>
					
					
				</div>
				<!-- end of blog__list -->
				{{-- <nav class="blog__pagination">
					@if ($picklist->lastPage() > 1)
					    <ul class="pagination">
					        <li class="{{ ($picklist->currentPage() == 1) ? ' disabled' : '' }}">
					            <a href="{{ $picklist->url(1) }}">First</a>
					         </li>
					        @for ($i = 1; $i <= $picklist->lastPage(); $i++)
					            <?php
					            $half_total_links = floor(5 / 2);
					            $from = $picklist->currentPage() - $half_total_links;
					            $to = $picklist->currentPage() + $half_total_links;
					            if ($picklist->currentPage() < $half_total_links) {
					               $to += $half_total_links - $picklist->currentPage();
					            }
					            if ($picklist->lastPage() - $picklist->currentPage() < $half_total_links) {
					                $from -= $half_total_links - ($picklist->lastPage() - $picklist->currentPage()) - 1;
					            }
					            ?>
					            @if ($from < $i && $i < $to)
					                <li class="{{ ($picklist->currentPage() == $i) ? ' active' : '' }}">
					                    <a href="{{ $picklist->url($i) }}">{{ $i }}</a>
					                </li>
					            @endif
					        @endfor
					        <li class="{{ ($picklist->currentPage() == $picklist->lastPage()) ? ' disabled' : '' }}">
					            <a href="{{ $picklist->url($picklist->lastPage()) }}">Last</a>
					        </li>
					    </ul>
					@endif
				</nav> --}}
			</div>
			
		</div>
	</div>
</div>
<!-- Blog Section End -->
@endsection