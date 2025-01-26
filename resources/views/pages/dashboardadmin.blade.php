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
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{$admin1}}</h2>
                            <p class="mb-0"><a href="{{route('dataadmin.index')}}">Total User Admin</a></p>
                        </div>
                        <div class="card-content">
                            <div id="subscribe-gain-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-credit-card text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{$seluruh}}</h2>
                            <a href="{{route('seluruhdata')}}" class="mb-0">Seluruh kegiatan mahasiswa</a>
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
                            <h2 class="text-bold-700 mt-1">{{$usermahasiswa}}</h2>
                            <a class="mb-0" href="{{route('datamahasiswa')}}">User Mahasiswa</a>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{$bem}}</h2>
                            <p class="mb-0"><a href="{{route('databem')}}">Admin BEM</a></p>
                        </div>
                        <div class="card-content">
                            <div id="orders-received-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dashboard -->
        </section>
    </div>

</div>

@endsection