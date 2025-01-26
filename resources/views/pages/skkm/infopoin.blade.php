@extends('layouts.master')
@section('content')

<!-- <div class="content-overlay"></div> -->
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-body">
        <!--native-font-stack -->
        <section id="alerts-closable">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-info"></i> INFO POIN</h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <p class="mb-0" style="color:black">
                                        Halaman ini menampilkan informasi kegiatan tentang kategori-kategori kegiatan yang ada di SKKM. Untuk melihat keterangan lebih detail dari tiap-tiap kegiatan tersebut,
                                        silahkan klik pada kategori-kategori kegiatan dibawah ini.
                                    </p>
                                </div>
                                <h5 class="font" style="font-weight: bold;">
                                    1. KEGIATAN WAJIB
                                </h5>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data1')}}">A. KEGIATAN MAHASISWA BARU</a>
                                </h7><br><br>
                                <h5 class="font" style="font-weight: bold;">
                                    2. KEGIATAN PILIHAN
                                </h5>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data2')}}">A. KEPENGURUSAN ORGANISASI SELAIN ORGANISASI KEMAHASISWAAN INTRA</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data3')}}">B. KEANGGOTAAN ORGANISASI INTERNAL KAMPUS POLIWANGI</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data4')}}">C. KEPANITIAAN</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data5')}}">D. KEJUARAAN / KOMPETENSI / PERLOMBAAN</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data6')}}">E. PENELITIAN, PENGABDIAN MASYARAKAT, SEMINAR, KULIAH TAMU, PEMATERI DAN KEGIATAN ILMIAH LAINNYA.</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data7')}}">F. PENGHARGAAN AKADEMIK DAN NON AKADEMIK</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data8')}}">G. HAK PATEN, HAK CIPTA</a>
                                </h7><br>
                                <h7 class="text">
                                    <a href="{{route('datainfo.data9')}}">H. PERTANDINGAN PERSAHABATAN ANTAR KAMPUS/JURUSAN/DENGAN PIHAK LAIN/INDUSTRI/INSTITUSI</a>
                                </h7>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- // Basic Horizontal form layout section end -->

</div>
</div>

@endsection