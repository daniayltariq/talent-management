<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8" />

	<!--Meta Tegs-->
	<title>Backstage</title>
	<meta content="" name="description" />

	<!--Icons-->
	<link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon" />
	<link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}" />
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-touch-icon-114x114.png') }}" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Google font -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('libs/animate/animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('libs/icons/materialdesignicons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('libs/icons/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('libs/hero-slider/hero-style.css') }}">

	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/media.css') }}" rel="stylesheet">
   
	

</head>


<body>
	@include('web.partials.header')
	 @yield('content')

	 @include('web.partials.footer')
</body>

	<script src="{{ asset('libs/jquery/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('libs/modernizr/modernizr.js') }}"></script>

	<script src=" {{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src=" {{ asset('libs/plugins-scroll/plugins-scroll.js') }}"></script>
	<script src=" {{ asset('libs/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
	<script src=" {{ asset('libs/izotope/isotope.pkgd.min.js') }}"></script>
	<script src=" {{ asset('libs/hero-slider/hero-slider.js') }}"></script> <!-- Resource jQuery -->
	<script src=" {{ asset('js/common.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
	<script>
            @if (Session::has('message'))
             console.log('asd');
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':

           
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
            case 'success':

           
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
            case 'warning':

           
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
            case 'error':

           
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
            }
            @endif</script>
	 @yield('scripts') 


</html>