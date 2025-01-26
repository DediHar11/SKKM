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
                            <h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-info"></i> INFO KEGIATAN WAJIB</h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <p class="mb-0" style="color:black">
                                        Halaman ini menampilkan informasi <h9 style="font-weight:bold ;">kegiatan wajib</h9> bagi <h9 style="font-weight:bold ;">mahasiswa baru</h9> yang ada di SKKM. Berikut uraiannya dibawah ini.
                                    </p>
                                </div>
                                <h5 class="font" style="font-weight: bold;">
                                    1. KEGIATAN WAJIB
                                </h5>
                                <h7 class="text">
                                    A. KEGIATAN MAHASISWA BARU
                                </h7><br>
                                <h8 class="text">
                                    <i class="fa fa-arrow-circle-right"></i> PKKMB & Pra Studi
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