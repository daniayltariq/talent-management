<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8" />

	<!--Meta Tegs-->
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta content="" name="description" />

  @include('web.partials.header')
  @yield('styles')
	<style>
		/* 3 DOT LOADER */
		.fullpage-loader{
			position: fixed;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			display: none;
			z-index: 9999;
			background: #272727c9;
		}

		.fullpage-loader .loader-wrapper{
			display: flex;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%,-50%);
			z-index: 9999;
			text-align: center;
		}

		.dot-loader {
		height: 30px;
		width: 30px;
		border-radius: 50%;
		background-color: #df691a;
		position: relative;
		-webkit-animation: 1.2s grow ease-in-out infinite;
		animation: 1.2s grow ease-in-out infinite;
		}

		.dot-loader--2 {
		-webkit-animation: 1.2s grow ease-in-out infinite 0.15555s;
		animation: 1.2s grow ease-in-out infinite 0.15555s;
		margin: 0 20px;
		}
		.dot-loader--3 {
		-webkit-animation: 1.2s grow ease-in-out infinite 0.3s;
		animation: 1.2s grow ease-in-out infinite 0.3s;
		}

		@-webkit-keyframes grow {
		0%, 40%, 100% {
			-webkit-transform: scale(0);
					transform: scale(0);
		}
		40% {
			-webkit-transform: scale(1);
					transform: scale(1);
		}
		}
		@keyframes grow {
		0%, 40%, 100% {
			-webkit-transform: scale(0);
					transform: scale(0);
		}
		40% {
			-webkit-transform: scale(1);
					transform: scale(1);
		}
		}

		@-webkit-keyframes triforce {
		0% {
			border-bottom-color: rgb(206, 181, 2);
		}
		40% {
			border-bottom-color: rgba(206, 181, 2, 0);
		}
		80% {
			border-bottom-color: rgb(206, 181, 2);
		}
		100% {
			border-bottom-color: rgb(206, 181, 2);
		}
		}

		.error{
			color: red;
		}

	</style>
</head>

<body>
	
  @include('web.partials.navbar')

	@yield('content')

	@include('web.partials.footer-content')

	@auth
		@include('web.partials.picklist-modal')
	@endauth

</body>

	
	@include('web.partials.footer') 
 	@yield('scripts') 

 	<script>

 		  $(document).on('click','.mark_post_like',function(e){
 		  	e.preventDefault();
 			mark_post_like($(this).data('topic'));
 		  });

 		 function mark_post_like(topic_id){

 		 	$.post("{{ route('post_like') }}",
			  {
			    topic_id: topic_id,
			    _token: "{{ csrf_token() }}",
			  },
			  function(data, status){

			  	$('.post__likes_wrapper_'+topic_id).html(data);
			     
			  });

 		 }
 		
 	</script>

</html>