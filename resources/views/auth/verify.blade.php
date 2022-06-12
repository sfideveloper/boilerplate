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

    <title>Verify Email - Bank Syariah Indonesia - UAE</title>
</head>

<body>
    <div class="row bg-primary-4 hp-bg-color-dark-90 text-center" style="height:100vh">
        <div class="col-12 hp-error-content py-32">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-12">
                    <div class="position-relative mt-0 mt-sm-64 mb-32">
                        <div class="hp-error-content-circle hp-bg-dark-100"></div>
                        <img class="position-relative d-block mx-auto"
                            src="{{asset('app-assets/img/email-verify.svg')}}" alt="Email Verify" width="150px">
                    </div>

                    <h2 class="h2 mb-0 mb-sm-16 font-weight-600">Email Verifikasi Telah Dikirim</h2>
                    <h5 class="h5 mb-32 font-weight-600">Silahkan cek kotak masuk atau kotak spam</h5>

                    <button type="button" class="btn btn-primary toast-btn" data-id="liveToast" id="liveToastBtn">
                        Kirim Email
                    </button>

                    <div class="position-fixed bottom-0 end-0 p-16" style="z-index: 99">
                        <div data-id="liveToast" class="toast bg-success" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Bank Syariah Indonesia</strong>
                                <button type="button"
                                    class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                                    data-bs-dismiss="toast" aria-label="Close">
                                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>

                            <div class="toast-body">
                                Email Telah Dikirim
                            </div>
                        </div>
                    </div>
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
        <script>
            $(".toast-btn").click(function () {
                let btnItem = $(this),
                    btnId = btnItem.data("id");

                $(".toast").each(function () {
                    let eachItem = $(this),
                        eachItemId = eachItem.data("id");

                    if (eachItemId) {
                        if (btnId === eachItemId) {
                            new bootstrap.Toast($(this)).show();
                        }
                    }
                });
            });
        </script>
</body>

</html>
