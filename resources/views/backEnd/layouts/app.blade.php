<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="/assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>BASIS Standing And Forums</title>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta name="description" content=""/>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://basis.org.bd/public/images/favicon.png"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>
    {{--  @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
    <link rel="stylesheet" href="{{asset("assets/vendor/css/core.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/css/theme-default.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/demo.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fonts/boxicons.css")}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{asset("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset("assets/vendor/libs/apex-charts/apex-charts.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/brands.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/fontawesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/regular.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/solid.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/svg-with-js.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/v4-font-face.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/v5-font-face.min.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <!-- Helpers -->
    <script src="{{asset("assets/vendor/js/helpers.js")}}"></script>
    <script src="{{asset("assets/js/config.js")}}"></script>
    @stack('style')
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @include('backEnd.shared.menu')
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('backEnd.shared.navbar')
            <!-- / Navbar -->
            <!-- Content wrapper -->
            <div class="content-wrapper" id="app">
                <!-- Content -->
                <div class="container-fluid flex-grow-1 container-p-y">
                    {{$breadcumb??""}}
                    {{$slot}}
                </div>
                <!-- / Content -->
                <!-- Footer -->
                @include('backEnd.shared.footer')
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<script src="{{asset("assets/vendor/libs/jquery/jquery.js")}}"></script>
<script src="{{asset("assets/vendor/libs/popper/popper.js")}}"></script>
<script src="{{asset("assets/vendor/js/bootstrap.js")}}"></script>
<script src="{{asset("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>
<script src="{{asset("assets/vendor/js/menu.js")}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="/assets/js/daterangepicker.min.js"></script>
<script src="{{asset("assets/vendor/libs/apex-charts/apexcharts.js")}}"></script>
<script src="{{asset("assets/js/main.js")}}"></script>
<script src="{{asset("assets/js/dashboards-analytics.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
{{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="{{asset("assets/vendor/summernote/summernote-lite.min.js")}}"></script>
<script src="{{asset("assets/vendor/ckeditor/ckeditor.js")}}"></script>
<script src="{{asset("assets/vendor/fontawesome/js/all.min.js")}}"></script>
<script src="{{asset("assets/vendor/fontawesome/js/brands.min.js")}}"></script>
{{--  <script src="{{asset("assets/vendor/fontawesome/js/conflict-detection.min.js")}}"></script>  --}}
<script src="{{asset("assets/vendor/fontawesome/js/fontawesome.min.js")}}"></script>
<script src="{{asset("assets/vendor/fontawesome/js/regular.min.js")}}"></script>
<script src="{{asset("assets/vendor/fontawesome/js/solid.min.js")}}"></script>
<script src="{{asset("assets/vendor/fontawesome/js/v4-shims.min.js")}}"></script>
@stack('script')
</body>
</html>
