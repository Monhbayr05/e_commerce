<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

{{--    css--}}
    <link href="{{asset('assets/user/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/flex-slider.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/magnific-popup.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/niceselect.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/owl-carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/slicknav.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/style.css')}}" rel="stylesheet">

{{--    swiper--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>
<body>
    @include('layouts.inc.user.header')

    @yield('content')
    @livewireScripts

    @include('layouts.inc.user.footer')



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


    <script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/active.js') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/easing.js') }}"></script>
    <script src="{{ asset('assets/user/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/finalcountdown.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/flex-slider.js') }}"></script>
    <script src="{{ asset('assets/user/js/gmap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/ytplayer.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/user/js/map-script.js') }}"></script>
    <script src="{{ asset('assets/user/js/nicesellect.js') }}"></script>
    <script src="{{ asset('assets/user/js/onepage-nav.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/user/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/scrollup.js') }}"></script>
    <script src="{{ asset('assets/user/js/slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/waypoints.min.js') }}"></script>

</body>
</html>
