<!DOCTYPE html>
<html>

<head>
    <style>
        /* style form */
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        /* end style form */
    </style>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/app-user.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>

<body>
    <div class="card">
        <h1 align="center">FORM SATUAN KREDIT KEGIATAN MAHASISWA (SKKM)</h1>
        <div class="card-header">
            <div class="card-title">Saya yang bertanda tangan dibawah ini :</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="users-view-image">
                    <img src="{{ asset ('gambar/'.Auth()->user()->images) }}" width="90" height="120" alt="avatar">
                </div>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                    <table>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Nama</td>
                                <td>: {{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nim</td>
                                <td>: {{Auth::user()->nim}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>: {{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Prodi</td>
                                <td>: {{ Auth::user()->prodi->prodi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="title mt-2">
                <h5>Telah mengikuti kegiatan di dalam maupun diluar kampus Politeknik Negeri Banyuwangi sebagai berikut :</h5>
            </div>
            <table id="customers">
                <tr>
                    <th>NO</th>
                    <th>NAMA KEGIATAN</th>
                    <th>JABATAN/PRESTASI</th>
                    <th>ANGKA KREDIT</th>
                </tr>
                @php
                $no=1;
                @endphp
                @foreach($data as $row)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$row->nama_kegiatan_bhsindonesia}}</td>
                    <td>{{$row->prestasi_kegiatan->prestasi_kegiatan ?? ''}}</td>
                    <td>{{$row->point}}</td>
                </tr>
                @endforeach
                <tr>
                    <td rowspan="1" colspan="3" align="center">JUMLAH ANGKA KREDIT</td>
                    <td>{{$sudah_validasi}}</td>
                </tr>
            </table>
        </div>
    </div>


    <script type="text/javascript">
        window.print();
    </script>
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/app-assets/js/scripts/pages/app-user.js')}}"></script>
    <!-- END: Page JS-->
</body>

</html>