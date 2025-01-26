@extends('layouts.master3')

@section('content2')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <section class="row flexbox-container">
            <div class="col-xl-8 col-10 d-flex justify-content-center">
                <div class="card bg-authentication rounded-0 mb-0">
                    <div class="row m-0">
                        <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                            <img src="{{asset('admin/app-assets/images/pages/register.jpg')}}" alt="branding logo" />
                        </div>
                        <div class="col-lg-6 col-12 p-0">
                            <div class="card rounded-0 mb-0 p-2">
                                <div class="card-header pt-50 pb-1">
                                    <div class="card-title">
                                        <h4 class="mb-0">Create Account</h4>
                                    </div>
                                </div>
                                <p class="px-2">Fill the below form to create a new account.</p>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="form-label-group">
                                                <input id="nim" placeholder="Nim" type="nim" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus>
                                                @error('nim')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-label-group">
                                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-label-group">
                                                <select class="form-control" name="prodi_id">
                                                    <option value="">Prodi</option>
                                                    @foreach ($prodi as $row)
                                                    <option value="{{$row->id}}">{{$row->prodi}}</option>
                                                    @endforeach
                                                </select>
                                                @error('prodi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- <div class="form-label-group">
                                                <select class="form-control" name="angkatan_id">
                                                    <option value="">Angkatan</option>

                                                    <option value=""></option>

                                                </select>
                                                @error('angkatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div> -->
                                            <div class="form-label-group">
                                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-label-group">
                                                <input id="password1" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                <span toggle="#password1" class="field-icon password-satu">
                                                    <i class="feather icon-eye-off"></i>
                                                </span>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-label-group">
                                                <input id="password2" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                <span toggle="#password2" class="field-icon password-dua">
                                                    <i class="feather icon-eye-off"></i>
                                                </span>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <fieldset class="checkbox">
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" checked />
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class=""> I accept the terms & conditions.</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            @if (Route::has('login'))
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                            @endif
                                            <button type="submit" class="btn btn-primary float-right btn-inline mb-50">{{ __('Register') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection