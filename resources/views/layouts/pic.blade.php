<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}" type="image/png">
    
<link rel="stylesheet" href="{{ asset('css/shared/iconly.css') }}">
<link rel="stylesheet" href="{{ asset('extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/simple-datatables.css') }}">
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <div id="app">
        @include('components.sidebar')
        <div class="loader"></div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <!-- Navbar content goes here -->
                @include('components.navbar')
            </header>
            <div id="main-content">
                <!-- Content goes here -->
                @yield('content')
                <!-- Footer content goes here -->
                @include('components.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('script')
    
<!-- Need: Apexcharts -->
<script src="{{ asset('js/pages/dashboard.js') }}"></script>
<script src="{{ asset('extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('js/pages/simple-datatables.js') }}"></script>

</body>

</html>