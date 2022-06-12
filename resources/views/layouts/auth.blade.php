<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('app-assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('app-assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('app-assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('app-assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('app-assets/favicon/safari-pinned-tab.svg')}}" color="#0010f7">
    <meta name="msapplication-TileColor" content="#0010f7">
    <meta name="theme-color" content="#ffffff">

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugin/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/icons/iconly/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/icons/remix-icon/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/base/font-control.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/base/typography.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/base/base.css')}}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/theme/colors-dark.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/theme/theme-dark.css')}}">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/sider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">

    <!-- Customizer -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/customizer.css')}}">

    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/authentication.css')}}">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <title>@yield('title', 'Auth | Bank Syariah Indonesia - UAE')</title>
</head>

<body>
    <div class="row hp-authentication-page">
        <div class="col-12 col-lg-6 bg-primary-4 hp-bg-color-dark-90 position-relative auth-image">
            <div class="row hp-image-row h-100 px-8 px-sm-16 px-md-0 pb-32 pb-sm-0 pt-32 pt-md-0">
                <div class="col-12 hp-logo-item m-16 m-sm-32 m-md-64 w-auto px-0">
                    <img class="hp-dark-none" src="../../../app-assets/img/logo/logo-vector-blue.svg" alt="Logo">
                    <img class="hp-dark-block" src="../../../app-assets/img/logo/logo-vector.svg" alt="Logo">
                </div>

                <div class="col-12">
                    <div class="row align-items-center justify-content-center h-100">
                        <div class="col-12 col-md-10 hp-bg-item text-center mt-64 mb-32 mb-md-0">
                            <img class="hp-dark-none m-auto"
                                src="../../../app-assets/img/pages/authentication/authentication-bg.svg"
                                alt="Background Image">
                            <img class="hp-dark-block m-auto"
                                src="../../../app-assets/img/pages/authentication/authentication-bg-dark.svg"
                                alt="Background Image">
                        </div>

                        <div class="col-12 col-md-11 col-lg-9 hp-text-item text-center">
                            <h2 class="text-primary-1 hp-text-color-dark-0 mx-16 mx-lg-0 mb-16">Very good works are
                                waiting for you 🤞</h2>
                            <p class="mb-0 text-black-80 hp-text-color-dark-30">Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 py-sm-64 py-lg-0">
            <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Plugin -->
    <script src="{{asset('app-assets/js/plugin/jquery.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/autocomplete.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/moment.min.js')}}"></script>

    <!-- Layouts -->
    <script src="{{asset('app-assets/js/layouts/header-search.js')}}"></script>
    <script src="{{asset('app-assets/js/layouts/sider.js')}}"></script>
    <script src="{{asset('app-assets/js/components/input-number.js')}}"></script>

    <!-- Base -->
    <script src="{{asset('app-assets/js/base/index.js')}}"></script>
    <!-- Customizer -->
    <script src="{{asset('app-assets/js/customizer.js')}}"></script>

    <!-- Custom -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
