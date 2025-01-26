@extends('layouts.master')
@push('plugin-style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/app-user.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <!-- page users view start -->
        <section class="page-users-view">
            <!-- account start -->
            <div class="col-12">
                <div class="card" style="height:100%;width:100%;">
                    <div class="card-header">
                        <div class="card-title">Profile</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="users-view-image">
                                <img src="{{ asset ('gambar/'.Auth()->user()->images) }}" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" height="130" alt="Tidak ada foto" />
                            </div>
                            <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Nama</td>
                                            <td>{{Auth::user()->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Email</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        @if(Auth::user()->roles === 'bem')
                                        <tr>
                                            <td class="font-weight-bold">Nomor WhatsApp</td>
                                            <td>{{ Auth::user()->nohp }}</td>
                                        </tr>
                                        @endif
                                        @if(Auth::user()->roles === 'mahasiswa')
                                        <tr>
                                            <td class="font-weight-bold">Prodi</td>
                                            <td>{{ Auth::user()->prodi->prodi }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="col-12 col-md-12 col-lg-5">
                                <table class="ml-0 ml-sm-0 ml-lg-0">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Status</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Role</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Company</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->
                            <div class="col-12">
                                <a href="{{route('profil.edit', Auth::user()->id)}}" class="btn btn-primary mr-1 waves-effect waves-light"><i class="feather icon-edit-1"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account end -->
        </section>
        <!-- page users view end -->
    </div>
</div>

@endsection