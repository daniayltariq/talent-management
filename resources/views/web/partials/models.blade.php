	@php
		$grid_layout=collect([
			[
				"width"=>"width1",
				"height"=>"height1"
			],
			[
				"width"=>"width2",
				"height"=>"height2"
			],
			[
				"width"=>"width2",
				"height"=>"height2"
			],
			[
				"width"=>"width2",
				"height"=>"height2"
			],
			[
				"width"=>"width1",
				"height"=>"height2"
			],
			[
				"width"=>"width1",
				"height"=>"height2"
			],
		])
	@endphp
	
	<section class="section portfolio no-padding-top">
		<div class="container">
			<div class="row">
				<h2 class="section__title">Our Models</h2>
				<div class="button-group filters-button-group">
					<button class="button title__grey is-checked" data-filter="*">all</button>
					<button class="button title__grey" data-filter=".women">WOMEN</button>
					<button class="button title__grey" data-filter=".men">MEN</button>
					<button class="button title__grey" data-filter=".stylists">Stylists</button>
					<button class="button title__grey" data-filter=".new-faces">New Faces</button>
					<button class="button title__grey" data-filter=".teenagers">Teenagers</button>
					<button class="button title__grey" data-filter=".lifestyle">Lifestyle</button>
				</div>
                <div class="col-md-12">
                	<div class="grid">
	               		<div class="grid-sizer"></div>
						<div class="grid-gutter"></div>
						@foreach ($models->take(6) as $key => $model)
							@if ($model->profile)
								<a href="{{route('model.single',$model->id)}}" class="effect-bubba grid-item grid-item__{{$grid_layout[$key]['width']}} grid-item__{{$grid_layout[$key]['height']}} teenagers women" data-category="women" style="height: 500px;">
									<img class="img-responsive" src="{{ asset(!is_null($model->profile) ? (!is_null($model->profile->profile_img) && \Storage::exists('public/uploads/profile/'.$model->profile->profile_img)? 'storage/uploads/profile/'.$model->profile->profile_img: 'web/img/default.jpg') : 'web/img/default.jpg') }}" alt="sample image" style="height: 100%;width: 100%;object-fit: cover;">
									<div class="grid-item__contant-info">
										<div class="grid-item__contant-name">Kate Farmer</div>
										<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
										<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
									</div>
								</a>
							@endif
							
						@endforeach
		            	
	                    {{-- <a href="single-model.html" class="effect-bubba grid-item grid-item__width2 grid-item__height2 stylists lifestyle women" data-category="women">
		                    <img class="img-responsive" src="{{ asset('web/img/model4.jpg') }} " alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
			            </a>
	                    <a href="single-model.html" class="effect-bubba grid-item grid-item__width2 grid-item__height2 stylists teenagers women new-faces" data-category="women">
		                    <img class="img-responsive" src="{{ asset('web/img/model5.jpg') }} " alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
			            </a>
	                    <a href="single-model.html" class="effect-bubba grid-item grid-item__width2 grid-item__height2 stylists teenagers men new" data-category="men">
		                    <img class="img-responsive" src="{{ asset('web/img/model2.jpg') }} " alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
                   		</a>
	                    <a href="single-model.html" class="effect-bubba grid-item grid-item__width1 grid-item__height2 women men new-faces new" data-category="women">
		                    <img class="img-responsive" src="{{ asset('web/img/model6.jpg') }} " alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a>
	                    <a href="single-model.html" class="effect-bubba grid-item grid-item__width1 grid-item__height2 men new lifestyle" data-category="men">
		                    <img class="img-responsive" src="{{ asset('web/img/model3.jpg') }} " alt="sample image">
			            	<div class="grid-item__contant-info">
				            	<div class="grid-item__contant-name">Kate Farmer</div>
				            	<div class="grid-item__contant-place title__grey">Lake Adelle, USA</div>
				            	<i class="grid-item__contant-arrow mdi mdi-arrow-right"></i>
			            	</div>
	                    </a> --}}
	                    <div class="grid-item grid-item__width2 view__all women men" data-category="women">
	                    	<a href="{{ route('login') }}" class="more animation">view all models</a>
	                    </div>
	                </div> <!-- end of grid -->
	            </div>
			</div>
		</div>
	</section>