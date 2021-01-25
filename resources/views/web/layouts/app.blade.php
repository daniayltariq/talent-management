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

		.role-nav{
			text-transform: uppercase;
			color: #fff;
			font-size: 11px;
			font-weight: 800;
			font-family: Roboto, Arial, sans-serif;
		}

		@media only screen and (max-width: 992px) {
			.role-nav{
				padding-left: 3rem!important;
			}
		}

		.ptb-0{
			padding-top:0 !important;
			padding-bottom:0 !important; 
		}

		@media only screen and (max-width: 1252px)
		{
			.main__menu {
				display: none;
				width: 100%;
				padding: 0;
				background: black;
			}
		}
			
		@media only screen and (max-width: 1252px)
		{
			.responsive-menu__button {
				display: block;
			}
		}

		@media only screen and (min-width: 1220px)
		{
			.cust-cont {
				width: 1321px;
			}
		}
		
		@media (min-width: 1200px)
		{
			.cust-cont {
				max-width:1310px !important;
			}
		}

		.single-testimonial{
			outline: none !important; 
		}

		.testimonal__list-item{
			outline: none !important; 
		}
		
		.page__img {
			height: 324px !important;
		}

		.title__wrapp {
			text-align: center;
			margin-top: 16%;
		}

		.header.sticky {
			position: fixed;
			height: 100px;
		}

		.m-menu__list-item {
    		padding: 5px 0;
		}

		.btn-cust{
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 20px;
			padding-top: 0;
			padding-bottom: 0;
		}

		.btn-cust span{
			position: relative;
			left: 8px;
			display: inline-block;
			padding: 6px 12px;
			background: rgba(0,0,0,0.15);
			border-radius: 3px 0 0 3px;
		}

		@media only screen and (max-width: 1220px)
		{
			.m-nav__expanded {
				display: block !important;
			}

			.m-menu__list-item {
				margin-left: 21px !important;
			}

			.m-menu__list {
				display: grid;
			}

			.m-menu__list-item {
				margin-left: 0 !important;
			}

			.btn-cust{
				margin-left: 27px !important;
			}
		}

		@media only screen and (max-width: 1220px)
		{
			.m-menu__list-item a {
				display: block;
				padding: 0 0 10px 30px;
			}
		}

		@media only screen and (max-width: 1220px)
		{
			.d-hide{
				display: none;
			}
			.m-menu__list-item {
				float: none;
				margin-left: 0;
				padding: 10px 0 0;
				border-bottom: 1px solid #fff;
			}

			.m-menu__sub {
    			position: static;
			}

			.m-menu__sub>li {
				margin-left: 16px !important;
			}

			.menu-item-has-children:hover ul{
				display: block;
			}
		}
			
		.bg-talent{
			background-color:#df691a !important;
		}

		.m-menu__list-item a {
			color: #f37c2c !important;
			font-weight: 500;
		}
			
		.w-100{
		width: 100%;
		}

		.w-25{
		width: 25%;
		}

		.m-menu__sub {
			padding: 20px 0 0;
		}

		/* Book talent modal */
		.popup {
      
		overflow-x: hidden;
		overflow-y: auto;
		font-family: "Google Sans",Roboto,Arial,sans-serif;
		width: 100%;
		height: 100%;
		display: none;
		position: fixed;
		top: 0px;
		left: 0px;
		background: rgba(0, 0, 0, 0.75);
		}

		.popup {
			z-index: 999999;
			text-align: center;
		}

		.popup:before {
		content: '';
		display: inline-block;
		height: 100%;
		margin-right: -4px;
		vertical-align: middle;
		}

		.popup-header {
			color: white;
			font-family: "Google Sans",Roboto,Arial,sans-serif;
			width: fit-content;
			background-color: #e77826;
			border-radius: 0px 0px 6px 6px;
			margin-top: 0;
			padding: 0px 11px;
		}

		.popup-inner {
		display: inline-block;
		text-align: left;
		vertical-align: middle;
		position: relative;
		max-width: 700px;
		width: 90%;
		padding: 40px;
		box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
		border-radius: 3px;
		background: #fff;
		text-align: center;
		}

		.popup-inner h1 {
		font-family: 'Roboto Slab', serif;
		font-weight: 700;
		}

		.popup-inner p {
			padding: 0px 27px;
		font-size: 19px;
		font-weight: 400;
		}

		.popup-contact-wrapper{
			border-radius: 8px;
			border: 2px solid #dadce0;
			border-top: 4px solid #e77826;
		}

		.popup-close {
		width: 34px;
		height: 34px;
		padding-top: 4px;
		display: inline-block;
		position: absolute;
		top: 20px;
		right: 20px;
		-webkit-transform: translate(50%, -50%);
		transform: translate(50%, -50%);
		border-radius: 100%;
		background: transparent;
		border: solid 4px #808080;
		}

		.popup-close:after,
		.popup-close:before {
		content: "";
		position: absolute;
		top: 11px;
		left: 5px;
		height: 4px;
		width: 16px;
		border-radius: 30px;
		background: #808080;
		-webkit-transform: rotate(45deg);
		transform: rotate(45deg);
		}

		.popup-close:after {
		-webkit-transform: rotate(-45deg);
		transform: rotate(-45deg);
		}

		.popup-close:hover {
		-webkit-transform: translate(50%, -50%) rotate(180deg);
		transform: translate(50%, -50%) rotate(180deg);
		background: #f00;
		text-decoration: none;
		border-color: #f00;
		}

		.popup-close:hover:after,
		.popup-close:hover:before {
		background: #fff;
		}

		.color-td{
			color: #e77826;
		}

		.color-td-2{
			color: rgb(9, 51, 83);
			font-weight: 550;
		}

		.text-left{
			text-align: left;
		}

		#send_mail:hover{
			color: #404040;
			text-decoration: underline;
		}

		.d-none{
			display: none;
		}
		.popup-form{
			text-align: left;
			padding: 28px;
		}
		/* End book talent modal */

		.refer__div{
			display: none;
		}

		.p-10-13{
			padding: 10px 13px;
		}

		.d-flex{
			display: flex;
		}

		.h-43{
			height: 43px;
		}
	</style>
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