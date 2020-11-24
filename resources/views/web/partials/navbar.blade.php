<div class="full-search-wrap">
	<div class="full-search container">
		<div class="close-s"><a href="#">Close</a></div>
		<form action="/" class=" search-full-form">
			<input type="text" id="s-full" class="form-search__input form-search__input_search-full" placeholder="Search">
			<button type="submit" class="form-search__input_icon pull-right">
			<i class="mdi mdi-magnify"></i>
			</button>
			<p class="hint">Type in your search and press enter</p>
		</form>
	</div>
</div>
<header class="header" id="header">
	<div class="header-sticky__wrapp">
		<div class="container">
			<div class="row">
				<div class="logo col-md-2 col-sm-4 col-xs-7">
					<a class="navbar-brand" href="{{ route('/') }}">
					{{-- <span class="logo__text">Talent DB</span> --}}
					<img src="{{ asset('web/img/logo/talent-logo.png') }}" class="logo img img-fluid">
					</a>
				</div>
				<div class="main__menu-wrap col-md-10 col-sm-8 col-xs-5">
					<span class="responsive-menu__button" id="responsive-menu"><i class="mdi mdi-menu"></i></span>
					<nav class="main__menu pull-right" id="main__nav">
						<ul class="m-menu__list clearfix">
							
							{{-- <li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}"  >
								<a href="{{ route('models') }}">Models</a>
								<ul class="m-menu__sub">
									<li class="m-menu__sub-item">
										<a href="{{ route('models.grid') }}">Grid style</a>
									</li>
									<li class="m-menu__sub-item">
										<a href="{{ route('models.single') }}">Signle Model</a>
									</li>
								</ul>
							</li> --}}

							<li class="m-menu__list-item  {{ Request::is('how-it-works') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('how-it-works') }}">How it works</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('about-us') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('about-us') }}">About Us</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('findtalent') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('findtalent') }}">Featured Talent</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('community') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('community') }}">Community</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('testimonials') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('testimonials') }}">Testimonials</a>
							</li>

							{{-- <li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}"  >
								<a href="{{ route('login') }}">pages</a>
								<ul class="m-menu__sub">
									<li class="m-menu__sub-item">
										<a href="{{ route('agent.picklist.index') }}">Picklist Favorites</a>
									</li>
									@auth
										<li class="m-menu__sub-item">
											<a href="{{ route('agent.picklist.show',auth()->user()->id) }}">Picklist Single</a>
										</li>
									@endauth
									
									
									@if (\Auth::guest() || \Auth::user()->hasRole('candidate'))
										<li class="m-menu__sub-item">
											<a href="{{ route('pricing') }}">Pricing</a>
										</li>
									@endif
									
									
									<li class="m-menu__sub-item">
										<a href="{{ route('single-topic') }}">Community Topics</a>
									</li>
									<li class="m-menu__sub-item">
										<a href="{{ route('single-post') }}">Single Topic</a>
									</li>
									<li class="m-menu__sub-item">
										<a href="{{ route('404') }}">404</a>
									</li>
									<li class="m-menu__sub-item">
										<a href="{{ route('403') }}">403</a>
									</li>
								</ul>
							</li> --}}
							
							
							@if (\Auth::guest() || \Auth::user()->hasRole('candidate'))
								<li class="m-menu__list-item {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}">
									<a href="{{ route('pricing') }}">Pricing</a>
								</li>
							@endif
							
							
							@if(Auth::guest()) 
							
							<li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}"  >
								<a href="{{ route('login') }}">Join Now</a>
								<ul class="m-menu__sub">
									<li class="m-menu__sub-item">
										<a href="{{ route('login') }}">Login</a>
									</li>
									<li class="m-menu__sub-item">
										<a href="{{ route('register') }}">Register</a>
									</li>
								</ul>
							</li>
							@else

							<li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}"  >
								<a href="#">Account</a>
								<ul class="m-menu__sub">
									<li class="m-menu__sub-item">
										<a href="{{ route('account.dashboard') }}">Dashboard</a>
									</li>

									@role('candidate')
										@if (auth()->user()->referal_code && auth()->user()->referal_code->points > 2)
											<li class="m-menu__sub-item">
												<a href="{{ url('/') }}/account/reward">Reward</a>
											</li>
										@endif
										
									@endrole
									

									@if (\Auth::guest() || auth()->user()->hasRole('candidate'))
										<li class="m-menu__sub-item">
											<a href="{{ route('account.talent.profile') }}">Resume Wizard</a>
										</li>
										<li class="m-menu__sub-item">
											<a href="{{ route('account.talent.detail') }}">Talent Resume</a>
										</li>
									@endif

									@role('agent')
										<li class="m-menu__sub-item">
											<a href="{{ route('agent.picklist.index') }}">Picklist Favorites</a>
										</li>
										<li class="m-menu__sub-item">
											<a href="{{ route('agent.topic.create') }}">Create Post</a>
										</li>
										<li class="m-menu__sub-item">
											<a href="{{ route('agent.topic.index') }}">Posts</a>
										</li>
									@endrole
									<li class="m-menu__sub-item">
										 <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();.getElementById('logout-form').submit();">
										{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</li>
								</ul>
							</li>
 
							@endif
						</ul>
					</nav>
				</div>
				{{-- 	
				<div class="col-sm-1 col-xs-6 main__search">
					<a href="#0" class="form-search__input_search">
					<i class="mdi mdi-magnify"></i>
					</a>
				</div>
				--}}
			</div>
		</div>
	</div>
</header>