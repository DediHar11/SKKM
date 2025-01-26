<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Satuan Kredit Kegiatan Mahasiswa Poliwangi</title>
    <!-- css -->
    @include('layouts.style')
    <!-- end css -->
    @stack('plugin-style')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; SKKM POLIWANGI</span>
            <!-- <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button> -->
        </p>
    </footer>
    <!-- END: Footer-->

    <!-- menampilkan file sertifikat pada form input poin baru -->
    <!-- <script type="text/javascript">
        var tm_pilih = document.getElementById('file');
        var file = document.getElementById('file');
        tm_pilih.addEventListener('click', function() {
            file.click();
        })
        file.addEventListener('change', function() {
            gambar(this);
        })

        function gambar(a) {
            if (a.files && a.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-upload').src = e.target.result;
                }
                reader.readAsDataURL(a.files[0]);
            }

        }
    </script> -->
    <!-- ENDmenampilkan file sertifikat pada form input poin baru -->
    <!-- peringatan jika file panduan tata cara ukuran lebih 4MB -->
    <script type="text/javascript">
        var uploadField = document.getElementById("panduan_file");
        uploadField.onchange = function() {
            if (this.files[0].size > 2000000) { 
                alert("Maaf. File Foto Anda Terlalu Besar ! Maksimal Upload 2000 KB/2MB");
                this.value = "";
            };
        };
    </script>
    <!-- peringatan jika file panduan tata cara ukuran lebih 4MB -->

    <!-- peringatan jika file foto ukuran lebih 2MB -->
    <script type="text/javascript">
        var uploadField = document.getElementById("images");
        uploadField.onchange = function() {
            if (this.files[0].size > 2000000) { 
                alert("Maaf. File Foto Anda Terlalu Besar ! Maksimal Upload 2000 KB/2MB");
                this.value = "";
            };
        };
    </script>
    <!--END peringatan jika file foto ukuran lebih 2MB -->

    <!-- peringatan jika file scan sertifikat lebih 3MB dan menampilkan file scan -->
    <script type="text/javascript">
        var uploadField = document.getElementById("scan_sertifikat");
        uploadField.onchange = function() {
            if (this.files[0].size > 2000000) { 
                alert("Maaf. File Terlalu Besar ! Maksimal Upload 2000 KB/2MB");
                this.value = "";
            }if (this.files[0].size < 2000000){
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-upload').src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            };
        };
    </script>
    <!-- END peringatan jika file scan sertifikat lebih 3MB dan menampilkan file scan-->

    <!-- update sertifikat -->
    <script type="text/javascript">
        var uploadField = document.getElementById("file");
        uploadField.onchange = function() {
            if (this.files[0].size > 2000000) { 
                alert("Maaf. File Terlalu Besar ! Maksimal Upload 2000 KB/2MB");
                this.value = "";
            }if (this.files[0].size < 2000000){
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-dash').src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            };
        };
    </script>
    <!-- end update sertifikat -->


    @include('layouts.script')
    @stack('plugin-script')
    @stack('custom-script')

</body>

</html>