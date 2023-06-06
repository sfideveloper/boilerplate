<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-contact.css')}}">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/feather-icon.css')}}">

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugin/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugin/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugin/select2-bootstrap4.min.css')}}">

    @yield('css')

    <title>@yield('title', 'Bank Syariah Indonesia - UAE')</title>
</head>

<body>
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        <div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
            <div class="hp-sidebar-container">
                <div class="hp-sidebar-header-menu">
                    <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">
                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                            <button type="button" class="btn btn-text btn-icon-only">
                                <i class="ri-menu-unfold-line" style="font-size: 16px;"></i>
                            </button>
                        </div>

                        @include('partials.dashboard.logo')

                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                            <button type="button" class="btn btn-text btn-icon-only">
                                <i class="ri-menu-fold-line" style="font-size: 16px;"></i>
                            </button>
                        </div>
                    </div>

                    @include('partials.dashboard.sidebar')
                </div>
            </div>
        </div>

        <div class="hp-main-layout">
            @include('partials.dashboard.navbar')

            <div class="offcanvas offcanvas-start hp-mobile-sidebar" tabindex="-1" id="mobileMenu"
                aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-end me-16 ms-24 mt-16 p-0">
                    
                    @include('partials.dashboard.logo')

                    <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                        <button type="button" class="btn btn-text btn-icon-only">
                            <i class="ri-close-fill lh-1 hp-text-color-black-80" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
                    <div class="hp-sidebar-container">
                        <div class="hp-sidebar-header-menu">
                            <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">
                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                                    <button type="button" class="btn btn-text btn-icon-only">
                                        <i class="ri-menu-unfold-line" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </div>
                            
                            @include('partials.dashboard.sidebar')
                        </div>
                    </div>
                </div>
            </div>


            <div class="hp-main-layout-content">
                @yield('content')

                @yield('modal')
            </div>

            @include('partials.dashboard.footer')
        </div>
    </main>

    @include('partials.dashboard.custom-theme')

    @include('partials.logout')

    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px"
                width="16px" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z">
                    </path>
                </g>
            </svg>
        </button>
    </div>

    <!-- Plugin -->
    <script src="{{asset('app-assets/js/plugin/jquery.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/autocomplete.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/moment.min.js')}}"></script>
    <script src="{{asset('app-assets/js/croppie.js')}}"></script>

    <!-- Layouts -->
    <script src="{{asset('app-assets/js/layouts/header-search.js')}}"></script>
    <script src="{{asset('app-assets/js/layouts/sider.js')}}"></script>
    <script src="{{asset('app-assets/js/components/input-number.js')}}"></script>

    <!-- Base -->
    <script src="{{asset('app-assets/js/base/index.js')}}"></script>

    <!-- Customizer -->
    <script src="{{asset('app-assets/js/customizer.js')}}"></script>

    <!-- Plugin -->
    <script src="{{asset('app-assets/js/select2/select2.min.js')}}"></script>
    <script src="{{asset('app-assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('app-assets/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('app-assets/js/slug.js')}}"></script>
    <script type="text/javascript">
        function delay(callback, ms) {
            var timer = 0
            return function() {
                var context = this, args = arguments
                clearTimeout(timer)
                timer = setTimeout(function () {
                    callback.apply(context, args)
                }, ms || 0)
            }
        }
    </script>
    @yield('js')

</body>

</html>
