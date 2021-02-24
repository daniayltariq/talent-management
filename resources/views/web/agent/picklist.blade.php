@extends('web.layouts.app')

@section('title', 'My Picklist')
@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,900">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.css" integrity="sha512-WfDqlW1EF2lMNxzzSID+Tp1TTEHeZ2DK+IHFzbbCHqLJGf2RyIjNFgQCRNuIa8tzHka19sUJYBO+qyvX8YBYEg==" crossorigin="anonymous" />
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

.text-red{
	color: red;
}

.del_pl{
	padding: 2px 10px;
}

.del_pl:hover{
    border: 1px solid #f75959;
    border-radius: 7px;
}

h3{
    font-family: 'Source Sans Pro' !important;
}

.p-1{
	padding: 1rem;
}

.swal2-styled.swal2-confirm {
	font-size: 1.625em !important;
}

.swal2-styled.swal2-cancel {
	font-size: 1.625em !important;
}

.swal2-popup {
	width: 37em !important;
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
					<h4 class="widget__title">My Picklists</h4>

					{{-- <a href="">
						<h4 class="widget__title pull-right widget__titless" >Browse all picklists</h4>
					</a> --}}


					<div class="row">
						@forelse ($picklist as $item)
							<div class="col-sm-12">
								<div class="row pick-item">
									<div class="col-md-11">
											<div class="">
												<a href="{{ route('agent.picklist.show',$item->id) }}"><h3>{{$item->title}} ({{$item->items_count}})</h3>
												</a>
												<p>{{$item->description}}</p>
											</div>
									</div>
									
									<div class="col-sm-1">
										<a class="del_pl" href="{{route('agent.delete_picklist',$item->id)}}"><i class="fa fa-trash text-red"></i></a>
									</div>
								</div>
							</div>
						@empty
						<div class="col-sm-12">
							<h4 style="text-align: center">No Picklist found</h4>
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
				<nav class="blog__pagination">
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
			
		</div>
	</div>
</div>


<!-- Blog Section End -->
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.js" integrity="sha512-+uGHdpCaEymD6EqvUR4H/PBuwqm3JTZmRh3gT0Lq52VGDAlywdXPBEiLiZUg6D1ViLonuNSUFdbL2tH9djAP8g==" crossorigin="anonymous"></script>
	<script>
		$('.del_pl').on('click',function(e){
			var that=$(this);
			e.preventDefault();
			
			
			Swal.fire({
				title: 'Are you sure?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
				}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
					'Deleted!',
					'Picklist deleted.',
					'success'
					)
					window.location.href=that.attr('href');
				}
			})
		})
	</script>
@endsection