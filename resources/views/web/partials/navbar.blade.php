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
		<div class="container cust-cont">
			<div class="row">
				<div class="logo col-md-2 col-sm-4 col-xs-7">
					<a class="navbar-brand" href="{{ route('/') }}">
					{{-- <span class="logo__text">Talent DB</span> --}}
					<img src="{{ asset('web/img/logo/generic_logo_banner_orange.png') }}" class="logo img img-fluid">
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

							{{-- <li class="m-menu__list-item  {{ Request::is('how-it-works') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('how-it-works') }}">How it works</a>
							</li> --}}
							@if(Auth::guest()) 
								<li class="m-menu__list-item  {{ Request::is('how-it-works') ? 'm-menu__list-item_active' : '' }}">
									<a href="{{ route('how-it-works') }}">Join Us</a>
								</li>
							@endif
							<li class="m-menu__list-item  {{ Request::is('featured-talents') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('featured_talents') }}">Featured</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('testimonials') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('testimonials') }}">Testimonials</a>
							</li>
							<li class="m-menu__list-item {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('pricing') }}">Plans</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('community') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('community') }}">Community</a>
							</li>
							<li class="m-menu__list-item  {{ Request::is('about-us') ? 'm-menu__list-item_active' : '' }}">
								<a href="{{ route('about-us') }}">About</a>
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
							
							
							{{-- @if (\Auth::guest() || (\Auth::user()->hasRole('candidate') && count(auth()->user()->subscriptions()->active()->get()) == 0)) --}}
								
									{{-- <li class="m-menu__list-item {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}">
										<a href="{{ route('pricing') }}">Plans</a>
									</li> --}}
								
							{{-- @endif --}}
							
							
							@if(Auth::guest()) 
							
								{{-- <li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}"  >
									<a href="javascript:;">Join <span style="color: #df691a;font-weight: 500;">US</span> Us</a>
									<ul class="m-menu__sub d-hide">
										<li class="m-menu__sub-item">
											<a href="{{ route('how-it-works') }}">Learn more</a>
										</li>
										@if (\Auth::guest() || (\Auth::user()->hasRole('candidate') && count(auth()->user()->subscriptions()->active()->get()) == 0))
											<li class="m-menu__sub-item">
												<a href="{{ route('pricing') }}">Membership Plans</a>
											</li>
										@endif
										<li class="m-menu__sub-item">
											<a href="{{ route('how-it-works') }}">Join <span style="color: #df691a;font-weight: 500;">US</a>
										</li>
									</ul>
								</li> --}}
								
								<li class="m-menu__list-item menu-item-has-children" style="padding-top: 0;">
									<button type="button" class="btn-cust btn-warning bg-talent" style="height: unset !important">
										<span style="left: -3px;background: none;"><i class="fas fa-list"></i></span>
										<span style="border-radius: 22px;"><i class="fas fa-user"></i></span>
									</button>
									<ul class="m-menu__sub mt-2 d-hide">
										<li class="m-menu__sub-item">
											<a href="{{ route('login') }}">Sign In</a>
										</li>
									</ul>
								</li>
							@else
								
								<li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}"  >
									<div style="display: grid">
										<a href="#" class="ptb-0">{{auth()->user()->f_name ?? ''}}</a>
										@if (auth()->user()->hasRole('candidate') && auth()->user()->hasActiveSubscription())
											<span class="role-nav">{{auth()->user()->getActivePlan()->name ?? ''}}</span>
										@else
											<span class="role-nav">{{auth()->user()->roles->first()->alias ?? ''}}</span>
										@endif
										
									</div>
									<ul class="m-menu__sub">

										@role('candidate')
											<li class="m-menu__sub-item">
												<a href="{{ route('account.dashboard') }}">My Account</a>
											</li>
											
											@if (auth()->user()->profile()->exists() && auth()->user()->profile->custom_link)
												<li class="m-menu__sub-item">
													<a href="{{route('model',auth()->user()->profile->custom_link)}}">My Profile</a>
												</li>
											@endif

											@if (auth()->user()->referal_code && auth()->user()->referal_code->points > 1)
												<li class="m-menu__sub-item">
													<a href="{{ url('/') }}/account/reward">Reward</a>
												</li>
											@endif

											
										@endrole
										
										@role('superadmin')
											<li class="m-menu__sub-item">
												<a href="{{ route('backend.dashboard') }}">Dashboard</a>
											</li>
										@endrole

										@if (\Auth::guest() || auth()->user()->hasRole('candidate'))
											{{-- <li class="m-menu__sub-item">
												<a href="{{ route('account.talent.profile') }}">Resume Wizard</a>
											</li> --}}
											{{-- <li class="m-menu__sub-item">
												<a href="{{ route('account.talent.detail') }}">Talent Resume</a>
											</li> --}}
										@endif

										@role('agent')
											<li class="m-menu__sub-item">
												<a href="{{ route('agent.picklist.index') }}">My saved picklists</a>
											</li>
											<li class="m-menu__sub-item">
												<a href="{{ route('agent.topic.create') }}">Create Topic</a>
											</li>
											<li class="m-menu__sub-item">
												<a href="#" pd-popup-open="popupReferal">Refer a friend</a>
											</li>
											<li class="m-menu__sub-item">
												<a href="{{ route('agent.topic.index') }}">Topics</a>
											</li>
										@endrole
										<li class="m-menu__sub-item">
											<a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();.getElementById('logout-form').submit();">
												@impersonating($guard = null)
													Admin Dashboard
												@else
													{{ __('Logout') }}
												@endImpersonating
											</a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf
											</form>
										</li>
									</ul>
								</li>
 
							@endif

							@hasanyrole('superadmin|agent')
								<li class="m-menu__list-item  {{ Request::is('findtalent') ? 'm-menu__list-item_active' : '' }}">
									<a href="{{ route('findtalent') }}" style="color: #fff !important"><i class="fas fa-search"></i></a>
								</li>
							@endhasanyrole
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