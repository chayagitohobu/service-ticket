@extends('layouts.app')

@section('content')
<div class="account-pages">
            
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div>
                    <div >
                        <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="60" alt="logo"></a>
                    </div>
                    <h5 class="font-14 text-muted mb-4">SISTEM INFORMASI TIKET PELAYANAN</h5>
                    <p class="text-muted mb-4">
                        Sistem informasi tiket pelayanan digunakan untuk menjawab, memanajemen, dan menjaga daftar masalah yang biasa di alami oleh client
                    </p>
                    <h5 class="font-14 text-muted mb-4">DOSEN PEMBIMBING :</h5>
                    <div>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Desi Andreswari, S.T., M.Cs.</p>
                    </div>
                    <h5 class="font-14 text-muted mb-4">DAFTAR ANGGOTA KELOMPOK :</h5>
                    <div>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Meli Tri Yanti (G1A018008)</p>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Naufal Rizky Ananda (G1018037)</p>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Harizaldy Cahya Pratama (G1A018057)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="card mb-0">
                    <div class="card-body">
                        
                        <div class="p-2">
                            <h4 class="text-muted float-right font-18 mt-4">Sign In</h4>
                            <div>
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="40" alt="logo"></a>
                            </div>
                        </div>
                        
                        <div class="p-2">
                            @include('inc.messages')
                            <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                                @csrf    
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                       <a href=""><button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button></a> 
                                    </div>
                                </div>

                                <div class="form-group m-t-10 mb-0 row">
                                    <div class="col-sm-7 m-t-20">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        @endif
                                    </div>
                                    <div class="col-sm-5 m-t-20">
                                        {{-- <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a> --}}
                                        
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
@endsection
