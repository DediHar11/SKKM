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
                            <h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-info"></i> INFO KEGIATAN PILIHAN</h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <p class="mb-0" style="color:black">
                                        Halaman ini menampilkan informasi kegiatan <H9 style="font-weight: bold;">Kepanitiaan</H9>. Berikut rincian tingkat kegiatan tersebut dapat di lihat dibawah ini.
                                    </p>
                                </div>
                                <h5 class="font" style="font-weight: bold;">
                                    2. KEGIATAN PILIHAN
                                </h5>
                                <h7 class="text">
                                    C. KEPANITIAAN
                                </h7><br>
                                <h8 class="text" style="color:black; font-weight:bold;">
                                    <i class="fa fa-list-ol"></i> TINGKAT KEGIATAN
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> INTERNASIONAL
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> NASIONAL
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> REGIONAL
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> KABUPATEN/KOTA
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> KECAMATAN
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> DESA
                                </h8><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> INTERNAL KAMPUS
                                </h8><br><br>
                                <a href="{{route('skkm.index')}}" class="btn-sm bg-gradient-info">Back</a>
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