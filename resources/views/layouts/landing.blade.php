<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Appvilla - Creative Landing Page HTML Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/main.css') }}" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    @extends('components.landing.navbar')
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    @yield('content')

    <!-- Start Footer Area -->
    @extends('components.landing.footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    {{-- <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a> --}}

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/count-up.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">

        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    </script>
</body>

</html>