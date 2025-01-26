@extends('layouts.master')
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-credit-card text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{$noverifi}}</h2>
                            <a href="{{route('verifikasi.belumverifi')}}">
                                <p class="mb-0">Verifikasi Belum Di Proses</p>
                            </a>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-check-circle text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{$verifi}}</h2>
                            <a href="{{route('verifikasi.sudahverifi')}}">
                                <p class="mb-0">Verifikasi Di Proses</p>
                            </a>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-check-circle text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{$ditolak}}</h2>
                            <a href="{{route('verifikasi.ditolak')}}">
                                <p class="mb-0">Verifikasi Di Tolak</p>
                            </a>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dashboard -->
        </section>
    </div>

</div>
@endsection