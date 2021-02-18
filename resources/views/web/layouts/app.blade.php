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
	<style>
		.text-white{color: white;}

		@media only screen and (max-width: 767px)
		{
			.main__menu {
				width: 200%;
			}

			.cd-hero-slider{
				height: 500px !important;
			}

			.cd-full__contant {
				padding-left: 0;
			}
		}

		@media only screen and (max-width: 1220px)
		{
			.role-nav {
				padding: 0 0 10px 30px;
			}
		}

		@media only screen and (min-width: 768px) and (max-width: 1220px)
		{
			.main__menu {
				width: 100% !important;
			}
		}
			
		@media only screen and (max-width: 1220px)
		{
			.m-menu__sub {
				display: none;
				position: static;
				visibility: visible;
				opacity: 1;
				background: #0f0f0f;
			}
		}
			
	</style>
  @include('web.partials.header')
  <script type="text/javascript">
	(function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src='https://cdn.firstpromoter.com/fprom.js',t.onload=t.onreadystatechange=function(){var t=this.readyState;if(!t||"complete"==t||"loaded"==t)try{$FPROM.init("lye8vetq",".thetalentdepot.com")}catch(t){}};var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)})();</script>
  @yield('styles')


	
</head>

<body>
	
	@include('web.partials.navbar')

	@yield('content')

	@include('web.partials.footer-content')

	@auth
		@include('web.partials.picklist-modal')
		@include('web.partials.referal-modal')
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
			  function(res, status){
				if (res.alert_type=='error') {
					toastr.error(res.message);
				} else {
					$('.post__likes_wrapper_'+topic_id).html(res);
				}
			  	
			     
			  });

 		 }
		
		$(function() {
			//----- OPEN
			$('[pd-popup-open]').on('click', function(e)  {
				var targeted_popup_class = jQuery(this).attr('pd-popup-open');
				$('[pd-popup="' + targeted_popup_class + '"]').fadeIn(100);
		
				e.preventDefault();
			});
		
			//----- CLOSE
			$('[pd-popup-close]').on('click', function(e)  {
				var targeted_popup_class = jQuery(this).attr('pd-popup-close');
				$('[pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
		
				e.preventDefault();
			});
		});
		
	 </script>
	 <script>
		function copyToClipboard() {
			/* Get the text field */
			var copyText = document.getElementById("refer_link");
	
			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /*For mobile devices*/
	
			/* Copy the text inside the text field */
			document.execCommand("copy");
	
			/* Alert the copied text */
			$('.copy-btn').html('Copied');
			setTimeout(function() { 
			  $('.copy-btn').text("copy"); 
		   }, 1000);
		}
	
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	
		$(document).on('click','#refer-btn',function(e){
			
			@if(\Auth::guest())
				window.location.replace("{{route('login')}}");
			@else
				$.ajax({
					url: "{{ route('agent.generate_referal') }}",
					
					type: 'get',
					success: function(res) {
						console.log(res);
						$('[name="refer_link"]').val(res);
						$('.refer__div').show();
						/* if (res.alert_type) {
							toastr.success(res.message);
						} else {
							toastr.error(res.message);
						} */
					},
					error: function(error) {
					}
				});
			@endif
	
			
		});
	</script>

</html>