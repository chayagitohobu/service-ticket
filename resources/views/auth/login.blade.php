@extends('layouts.app')



@section('content')
@include('inc.navbar')

<div class="jumbotron-fluid pt-5 pb-5" style="background-image: linear-gradient(#0c5df4, #0C94F4); color:#ffff;">
    <div style="min-height: 10vh"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-5 m-auto  text-white text-center">
                <div class="card mb-0 p-5 shadow text-dark" style="background:#ffff;">  
                    <div class="card-body">
                        <div class="p-2 text-center">
                          <a href="index.html" class="logo logo-admin m-auto pt-3"><img src="assets/images/logo_dark.png" height="40" alt="logo"></a>
                            <h3 class="mt-4">Selamat Datang !</h3>
                            <p class="mt-4">Masuk Ke Akun Anda Untuk Mulai Bertanya</p>
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

                                {{-- <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                       <a href=""><button style="background:#FC8404;" class="btn text-white  btn-block waves-effect waves-light" style="border-radius: 10em" type="submit">Log In</button></a> 
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
    </div>
    <div style="min-height: 10vh"></div>
</div>

<div class="container-fluid pt-5" style="background:#0c5df4;">
  <div class="container p-5">
      <div class="row">
        <div class="col-xl-3 text-white pr-5">
          <a href="index.html" class="logo logo-admin m-auto pt-3"><img src="assets/images/logo_dark.png" height="40" alt="logo"></a>
          <hr>
          <p>Aplikasi Kasir Online OASSE dikembangkan oleh <a style="color:#FC8404" href="https://ascon.id/">PT Ascon Inovasi Data</a> berjasama dengan Kantor Jasa Akuntan <a style="color:#FC8404" href="https://kjaahmadsyahfuddin.com/">(KJA) Ahmad Syahfuddin</a>.</p>
        </div>
        <div class="col-xl-3 text-white pl-5 pr-5">
          <b>
            <p>Kontak Kami</p>
          </b>
            <hr>
            <p>Jl Hibrida 15 no 15 B Sidomulyo, Bengkulu, Indonesia 38229</p>
            <p>Telepon : <br>
              0852 6768 1085</p>
            <p>
              E-mail: <br>
              aplikasioasse@gmail.com
            </p>
          
        </div>
        <div class="col-xl-3 text-white pl-5 pr-5">
          <b>
            <p>Tautan Terkait</p>
          </b>
            <hr>
            <a class="text-white" href=""><p>Beranda</p></a>
            <a class="text-white" href=""><p>Tentang</p></a>
            <a class="text-white" href=""><p>Harga</p></a>
            <a class="text-white" href=""><p>Blog</p></a>
            <a class="text-white" href=""><p>Afiliasi</p></a>
            <a class="text-white" href=""><p>Promosi</p></a>
          
        </div>
        <div class="col-xl-3 text-white pl-5">
          <b>
            <p>Bantuan</p>
          </b>
            <hr>
            <a class="text-white" href=""><p>FAQS</p></a>
            <a class="text-white" href=""><p>Kebijakan Privasi</p></a>
            <a class="text-white" href=""><p>Ketentuan Layanan</p></a>
            <a class="text-white" href=""><p>Tutorial</p></a>
            <a class="text-white" href=""><p>Trial</p></a>
            <a class="text-white" href=""><p>Login</p></a>
        </div>
      </div>
      
    </div>
</div>
@endsection
