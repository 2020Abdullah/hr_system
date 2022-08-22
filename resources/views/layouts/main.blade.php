<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('page-title')</title>
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset("assets/images/ico/apple-icon-60.html")}}">
        <link rel="icon" sizes="60x60" type="image/png" href="{{asset("assets/images/logo.png")}}">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/fonts/feather/style.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/simple-line-icons/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/perfect-scrollbar.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/chartist.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/toastr.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    </head>
    <body class="pace-done">
        <div class="pace pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
            <div class="wrapper">
                <x-sidebar/>
                <x-header/>
                <div class="main-panel">
                    <div class="main-content">
                        <div class="content-wrapper">
                            @yield("content")
                        </div>
                    </div>
                </div>
                <x-setting/>
            </div>
        </div>
        <script src="{{asset("assets/vendors/js/core/jquery-3.3.1.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/core/popper.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/core/bootstrap.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/perfect-scrollbar.jquery.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/prism.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/jquery.matchHeight-min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/screenfull.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/pace/pace.min.js")}}"></script>
        <script src="{{asset("assets/vendors/js/chartist.min.js")}}"></script>
        <script src="{{asset("assets/js/app-sidebar.js")}}"></script>
        <script src="{{asset("assets/js/notification-sidebar.js")}}"></script>
        <script src="{{asset("assets/js/customizer.js")}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset("assets/vendors/js/toastr.min.js")}}"></script>
        @yield('js')
    </body>
</html>
