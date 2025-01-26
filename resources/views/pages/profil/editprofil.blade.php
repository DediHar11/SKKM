@extends('layouts.master')
@push('plugin-style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/app-user.css')}}">
@endpush
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">

    <div class="content-body">
        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">

            <div class="row">

                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ubah Profil</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{route('profil.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                    {{@csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- awal -->
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>Foto</span>
                                                    </div>
                                                    <div class="col-md-12" style="border-radius:4px;">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" id="images" name="images"></input>
                                                            <div class="form-control-position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>Nama</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="name" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Masukan Nama Lengkap">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>Email</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Masukan Email Anda">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-envelope-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Auth::user()->roles === 'bem')
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>Nomor WhatsApp</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="nohp" class="form-control" name="nohp" value="{{Auth::user()->nohp}}" placeholder="Masukan Nomor WhatsApp Anda">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-phone-incoming"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if(Auth::user()->roles === 'mahasiswa')
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>Prodi</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="position-relative has-icon-left">
                                                            <select class="form-control" name="prodi_id">
                                                                <option disabled value>Prodi</option>
                                                                <option value="{{$user->prodi_id}}">{{ Auth::user()->prodi->prodi }}</option>
                                                                @foreach ($prodi as $row)
                                                                <option value="{{$row->id}}">{{$row->prodi}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="fa fa-graduation-cap"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            
                                            <div class="col-md-4 offset-md-0">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
                                                <a type="button" href="{{route('profil.index')}}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->

</div>

</div>
@endsection