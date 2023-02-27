<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('head')
</head>

<body class="hold-transition sidebar-collapse">
    <div class="global-params" data-app-url="{{ url('/') }}"></div>

    <div class="wrapper" id="app">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Version: 1.0.0
            </div>
            <strong>Copyright &copy; {{ date("Y") }}</strong> All rights reserved.
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts-include')
    <script>
        (function() {
            @stack('scripts')
        }) ()
    </script>
</body>

</html>
