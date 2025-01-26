@extends('layouts.master')
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-body">
        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card" style="height:100%; width:100%;">
                        <div class="card-header">
                            <h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-award"></i>KETERANGAN DI TOLAK</h4>
                        </div>
                        <hr>

                        <div class="card-content">
                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <img src="{{asset('/admin/app-assets/images/ico/Lambang_POLIWANGI.png')}}" height="40" width="40" alt="">
                                    <h7 class="text" style="color:black; font-weight: bold;">
                                        Identitas Mahasiswa
                                    </h7>
                                    <h6 class="text ml-3" style="color:black;">#Nama : {{$mahasiswa->name}} #Nim : {{$data->nim}} #Prodi : {{$mahasiswa->prodi->prodi}}</h6>
                                </div>
                                <!-- gambar -->
                                <!-- <div class="rounded float-right">

									<img id="gambar" src="{{ asset ('scan_sertifikat/'.$data->scan_sertifikat) }}" height="200" width="320" alt="">

								</div> -->
                                <!-- endgambar -->
                                <form class="form form-horizontal" action="{{route('verifikasi.keterangan',$data->id)}}" method="post" enctype="multipart/form-data">
                                    
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Keterangan Di Tolak</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <textarea style="resize:none;width:100%;height:100%;" id="keterangan" name="keterangan" class="from-control" placeholder="Keterangan di tolak"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- button     -->
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn-sm btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection