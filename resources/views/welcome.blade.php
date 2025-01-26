<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Satuan Kredit Kegiatan Mahasiswa Politeknik Negeri Banyuwangi</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/admin/app-assets/images/ico/Lambang_POLIWANGI.png')}}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/swiper.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/app-ecommerce-details.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <img src="{{asset('/admin/app-assets/images/ico/Lambang_POLIWANGI.png')}}" class="img-responsive" style="width:35px; height:35px;" alt="#">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" style="font-size:20px; font-weight:bold; color:white;" href="#">SKKM POLIWANGI</a>
            </div>
        </div>
        <p class="about mt-1" style="color:white ;"><i class="feather icon-alert-octagon"></i> Tentang</p>
    </nav>

    <div class="content-wrapper">
        <div class="content-body">
            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="img-fluid" src="{{asset('admin/app-assets/images/slider/12.jpg')}}" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="{{asset('admin/app-assets/images/slider/10.jpg')}}" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="{{asset('admin/app-assets/images/slider/09.jpg')}}" alt="Fourth slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="{{asset('admin/app-assets/images/slider/11.jpg')}}" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 class="tittle" style="text-align:center; font-size:24px; font-weight:bold; color:midnightblue;">SATUAN KREDIT KEGIATAN MAHASISWA
                                </h5>
                                <p class="text" style="text-align:center; font-size:16px; font-weight:bold; font-style:initial;color:midnightblue;">POLITEKNIK NEGERI BANYUWANGI</p>
                                <div class="ecommerce-details-price d-flex flex-wrap">

                                    <p class="text font-medium-3 mr-1 mb-0" style="color:red ;font-weight:bold;">PEMBERITAHUAN !</p>
                                </div>
                                <hr>
                                <p style="color:black ;">
                                    <a><i class="fa fa-dot-circle-o"></i> DOWNLOAD BUKU PEDOMAN SKKM :</a><br>
                                    <!-- <a><i class="fa fa-dot-circle-o"></i> Bagi mahasiswa Politeknik Negeri Banyuwangi <a style="font-weight:bold; color:red;">wajib</a> membuat akun (Register) terlebih dahulu pada tombol <a style="font-weight:bold ;color:black;">"Register"</a>.</a><br> -->
                                    <a><i class="fa fa-dot-circle-o"></i> Diberitahukan kepada seluruh mahasiswa bahwa daftar kegiatan yang dapat diunggah di website SKKM adalah daftar kegiatan yang diikuti selama masa studi di Politeknik Negeri Banyuwangi. Daftar kegiatan di luar masa studi tidak dapat dihitung dalam angka kredit SKKM</a><br>
                                    <a><i class="fa fa-dot-circle-o"></i> Diwajibkan mengunggah foto formal pada masing-masing akun pada menu "profil".</a><br>
                                    <a><i class="fa fa-dot-circle-o"></i> Berhak mendapatkan fasilitas percepatan birokrasi SKKM khusus mahasiswa yang diterima kerja lebih awal sebelum wisuda atau mahasiswa yang mengikuti sidang skripsi/TA jalur khusus karena diterima kerja, dengan menunjukkan bukti telah diterima kerja dari perusahaan secara tertulis kepada BEM.</a><br>
                                    <a><i class="fa fa-dot-circle-o"></i> Untuk mahasiswa alumni yang belum menyelesaikan tanggungan SKKM mohon segera menghubungi BEM.</a><br>
                                    <a><i class="fa fa-dot-circle-o"></i> Sertifikat yang tidak ada namanya harap di beri nama sebelum di upload!</a><br>
                                    <a><i class="fa fa-dot-circle-o"></i> Penguploadtan sertifikat, wajib dalam bentuk scan berwarna! Selain dalam bentuk scan tersebut, sertifikat tidak dapat diverifikasi!</a>
                                </p>
                                <hr>
                                <!-- <p><span style="color:darkblue">Silahkan klik login jika sudah memiliki akun.</span> <span style="color: red;">Jika belum memiliki akun klik <a style="font-weight: bold;color:red;">register</a>.</span></p> -->

                                <div class="d-flex flex-column flex-sm-row">

                                    <a class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0" href="{{ route('login') }}">Login</a>

                                    <!-- <a class="btn btn-outline-danger" href="{{ route('register') }}">Register</a> -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- app ecommerce details end -->

        </div>
    </div>

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/app-assets/js/scripts/pages/app-ecommerce-details.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/forms/number-input.js')}}"></script>
    <!-- END: Page JS-->
</body>

</html>