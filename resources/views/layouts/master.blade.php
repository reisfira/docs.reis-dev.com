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
    <link rel="stylesheet" href="{{ asset('css/datatables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}"/>
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    {{-- code-blocks --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/styles/vs.min.css"/> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">

    @stack('head')
</head>

@php
    /**
     * available sidebar_options: [
     *  'sidebar-collapse',
     *  'sidebar-collapse sidebar-mini',
     *  'sidebar-mini', // default
     * ]
     * */
    $sidebar_option = isset($sidebar_option) ? $sidebar_option : 'sidebar-mini sidebar-collapse';
@endphp
<body class="hold-transition skin-blue {{ $sidebar_option }}">
    <div class="global-params" data-app-url="{{ url('/') }}"
        {{-- select2 ajax --}}
        data-select2-debtor-account-code-route="{{ route('select2.fetch-debtor-account-code') }}"
    ></div>

    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('layouts.top-bar')
        </nav>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar sidebar-dark-primary  elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <div class="brand-image mt-1">
                    <i class="fab fa-laravel"></i>
                </div>
                <span class="brand-text font-weight-light ml-2">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    @include('layouts.menu')
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('layouts.header')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        @yield('modals')
        @include('components.modal.loading')

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Version: 1.0.0
            </div>
            <strong>Copyright &copy; {{ date("Y") }}</strong> All rights reserved.
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('js/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    {{-- inputmask --}}
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.binding.js') }}"></script>

    {{-- datepickers --}}
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>

    {{-- code-blocks --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@heppokofrontend/html-code-block-element/lib/html-code-block-element.common.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    @stack('scripts-include')
    <script>
        (function() {

            @include('components.js.bootstrap-js')
            @include('components.js.datepicker-js')
            @include('components.js.form-js')
            @include('components.js.inputmask-js')
            @include('components.js.number-js')
            @include('components.js.select2-js')
            @include('components.js.loading-modal-js')
            @include('components.js.toastr-js')
            @include('components.js.sweetalert-js')
            @include('components.js.master-js')

            @stack('scripts')
        }) ()
    </script>
</body>

</html>
