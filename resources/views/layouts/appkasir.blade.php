<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFEPOS - Kasir | @yield('title')</title>

    {{-- Google Font --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- FontAwesome Local --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- FontAwesome CDN Backup --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Custom Theme Kasir (Rapi & Profesional) --}}
    <style>
        body {
            background: linear-gradient(135deg, #323f70, #3e444e) !important;
            font-family: "Source Sans Pro", sans-serif;
        

        font-family: "Source Sans Pro",
        sans-serif;
        }

        .content-wrapper {
            background: transparent !important;
        }

        /* Navbar */
        .main-header.navbar {
            background: rgba(230, 230, 239, 0.9) !important;
            border-bottom: 1px solid rgba(255, 0, 76, 0.20) !important;
        }

        /* Sidebar */
        .main-sidebar {
            background: rgba(10, 10, 15, 0.95) !important;
            border-right: 1px solid rgba(255, 0, 76, 0.20) !important;
        }

        .brand-link {
            background: rgba(255, 0, 76, 0.08) !important;
            border-bottom: 1px solid rgba(255, 0, 76, 0.20) !important;
        }

        /* Sidebar menu */
        .nav-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75) !important;
            border-radius: 8px;
            margin: 3px 8px;
        }

        .nav-sidebar .nav-link.active {
            background: rgba(255, 0, 76, 0.22) !important;
            color: white !important;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255, 0, 76, 0.15) !important;
            color: white !important;
        }

        /* Card */
        .card {
            border-radius: 14px !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            background: rgba(255, 255, 255, 0.06) !important;
            backdrop-filter: blur(8px);
            color: white !important;
        }

        .card-header {
            background: transparent !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.10) !important;
            color: white !important;
        }

        .card-title {
            font-weight: 700;
        }

        /* Text muted */
        .text-muted {
            color: rgba(255, 255, 255, 0.65) !important;
        }

        /* Table */
        table {
            color: white !important;
        }

        /* Footer */
        .main-footer {
            background: rgba(10, 10, 15, 0.90) !important;
            border-top: 1px solid rgba(255, 0, 76, 0.20) !important;
            color: rgba(255, 255, 255, 0.75) !important;
        }
    </style>

    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        {{-- Navbar --}}
        @include('layouts.kasir.navbar')

        {{-- Sidebar --}}
        @include('layouts.kasir.sidebar')

        {{-- Content --}}
        <div class="content-wrapper p-3">
            @yield('content')
        </div>

        {{-- Footer --}}
        @include('layouts.kasir.footer')

    </div>

    {{-- jQuery --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- AdminLTE --}}
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    @stack('js')

</body>

</html>