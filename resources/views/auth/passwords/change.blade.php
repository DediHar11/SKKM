@extends('layouts.master')
@section('content')
        
<!-- <div class="content-overlay"></div> -->
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts"> 
                
                    <div class="row match-height">
                       
                        <div class="col-md-9 col-12">
                            <div class="card" style="height:100%;width:100%;">
                                <div class="card-header">
                                    <h4 class="card-title">Ubah Password</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('passwordupdate') }}">
                                            @csrf

                                            <div class="form-group row {{$errors->has('oldpassword')?'has-error':''}}">
                                                <label for="oldpassword" class="col-md-4 col-form-label text-md-left">{{ __('Password Lama') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password1" type="password" class="form-control" name="oldpassword" placeholder="Masukan Password Lama" autofocus>
                                                    <span toggle="#password1" class="field-icon password-12">
                                                    <i class="feather icon-eye-off"></i>
                                                    </span>
                                                    @if($errors->has('oldpassword'))
                                                        <span class="help-block" role="alert">
                                                            <strong>{{ $oldpassword }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password Baru') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password Baru" required autocomplete="new-password">
                                                    <span toggle="#password" class="field-icon password-eye">
                                                    <i class="feather icon-eye-off"></i>
                                                    </span>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Konfirmasi Password Baru') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Baru" required autocomplete="new-password">
                                                    <span toggle="#password_confirmation"
                                                        class="field-icon password_confirmation password-confirmation-eye"><i
                                                        class="feather icon-eye-off"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
              