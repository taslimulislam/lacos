<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .menu-active {
            color: #de7f03 !important;
        }
    </style>

   @include('backend.layouts.assets.css')
   @stack('css')
</head>



<body class="d-flex flex-column h-100">
    @include('backend.layouts.header')
    
     <!-- NAV -->
    <main class="flex-shrink-0">
        @yield('content')
        <!-- Sidebar  -->
    </main>

    @include('backend.layouts.footer')

    @include('backend.layouts.assets.js')
    @stack('js')
</body>
</html>
