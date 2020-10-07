<meta charset="utf-8"/>

<title>4Vision Solutions | Dashboard</title>
<meta name="description" content="Updates and statistics">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script><!-- ... Then all the javascripts you need --> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.9/jquery.jcarousel.min.js" integrity="sha512-5TU8T3STShZiLsdqDqiKnj0Z72ccPZpIDCuItxc2S7G3lyiwqiuLuDFVNsLQ7Hgu5f33DlZ2KAJspbn6NAXqnA==" crossorigin="anonymous"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<!--begin::Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('backend-assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->


<!--begin:: Global Mandatory Vendors -->
<link href="{{ asset('backend-assets/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="{{ asset('backend-assets/assets/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/quill/dist/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/dual-listbox/dist/dual-listbox.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->

<link href="{{ asset('backend-assets/assets/css/demo1/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles -->

<!--begin::Layout Skins(used by all pages) -->

<link href="{{ asset('backend-assets/assets/css/demo1/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/css/demo1/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/css/demo1/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend-assets/assets/css/demo1/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />        <!--end::Layout Skins -->

<link rel="shortcut icon" href="{{ asset('backend-assets/assets/media/logos/favicon.ico" />