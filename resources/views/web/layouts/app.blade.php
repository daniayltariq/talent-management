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