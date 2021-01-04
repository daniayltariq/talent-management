<!DOCTYPE html>
<html lang="en" >
    
    <head>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        @include('backend.partials.header')
        <style>
            .btn-bg-white{
                background-color: #ffffff;
            }
        </style>
        @yield('styles') 
        
    </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
        <!-- begin:: BODY -->

        <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
            <div class="kt-header-mobile__logo">
                <a href="demo1/index.html">
                <img alt="Logo" src="{{asset('backend-assets/images/TD_only_white.png')}}" style="width: 15%;"/>
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
            </div>
        </div>
        <!-- end:: Header Mobile -->    
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <!-- begin:: Aside -->
                <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                

                @include('backend.partials.sidebar')
                <!-- end:: Aside -->            


                

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    <!-- begin:: Header -->
                    @include('backend.partials.navbar')
                    <!-- end:: Header -->
                    
                    @yield('content')

                    <!-- begin:: Footer -->
                    @include('backend.partials.footbar')
                    <!-- end:: Footer -->           
                </div>
            </div>
        </div>
        <!-- end:: Page -->
        

        
        @include('backend.partials.extra')
        

        @include('backend.partials.footer')
        @yield('scripts')
    </body>
</html>