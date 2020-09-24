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
					<div class="logo col-md-2 col-sm-4 col-xs-12">
						<a class="navbar-brand" href="index.html">
							<span class="logo__text">Backstage</span>
						</a>
					</div>
					<div class="main__menu-wrap col-md-8 col-sm-7 col-xs-6 width_h">
						<span class="responsive-menu__button" id="responsive-menu"><i class="mdi mdi-menu"></i></span>
						<nav class="main__menu pull-right" id="main__nav">
							<ul class="m-menu__list clearfix">
								<li class="m-menu__list-item {{ Request::is('/') ? 'm-menu__list-item_active' : '' }}">
									<a href="{{ route('index') }}">Home</a>
								</li>
					<li class="m-menu__list-item menu-item-has-children  {{ Request::is('models') ? 'm-menu__list-item_active' : '' }}""  >
									<a href="{{ route('models') }}">Models</a>
									<ul class="m-menu__sub">
										
										<li class="m-menu__sub-item">
											<a href="{{ route('models.grid') }}">Grid style</a>
										</li>
										<li class="m-menu__sub-item">
											<a href="{{ route('models.single') }}">Signle Model</a>
										</li>
										
									</ul>
								</li>
					
								<li class="m-menu__list-item  {{ Request::is('register') ? 'm-menu__list-item_active' : '' }}"">
									<a href="{{ route('register') }}">Apply</a>
								</li>
								<li class="m-menu__list-item  {{ Request::is('community') ? 'm-menu__list-item_active' : '' }}"">
									<a href="{{ route('community') }}">community</a>

								</li>
								<li class="m-menu__list-item  {{ Request::is('magzine') ? 'm-menu__list-item_active' : '' }}"">
									<a href="{{ route('magzine') }}">Magzine</a>

								</li>
								<li class="m-menu__list-item  {{ Request::is('findtalent') ? 'm-menu__list-item_active' : '' }}"">
									<a href="{{ route('findtalent') }}">Find Talent</a>

								</li>
								<li class="m-menu__list-item  {{ Request::is('find-productions') ? 'm-menu__list-item_active' : '' }}"">
									<a href="{{ route('findproductions') }}">Find Productions Jobs</a>

								</li>
								
						  @if(Auth::guest()) 
								           <li class="m-menu__list-item {{ Request::is('login') ? 'm-menu__list-item_active' : '' }}">
									<a href="{{ route('login') }}">Login</a>
								</li>

								<li class="m-menu__list-item {{ Request::is('register') ? 'm-menu__list-item_active' : '' }}">
									<a href="{{ route('register') }}">Register</a>
								</li>
								</ul>
				            @else
								<li class="m-menu__list-item" >
					<a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</li>
								 
					    	@endif
							</ul>
						</nav>
					</div>
				{{-- 	<div class="col-sm-1 col-xs-6 main__search">
						<a href="#0" class="form-search__input_search">
							<i class="mdi mdi-magnify"></i>
						</a>
					</div> --}}
				</div>
			</div>
		</div>
	</header>