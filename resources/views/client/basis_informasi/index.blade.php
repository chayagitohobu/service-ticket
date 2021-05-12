@extends('layouts.app')

@section('content')
@include('inc.navbar')

<div class="jumbotron-fluid pt-5 pb-5">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-8 m-auto">
              <img class="mb-4" width="400" src="{{asset('assets/images/ilustrasi/help2.svg')}}" alt="">
              <div>
                  {{-- <div >
                      <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="60" alt="logo"></a>
                  </div> --}}
                  <h3 class="mb-5">Cari jawaban anda disini ...</h3>
                  <hr>
                  <form action="{{route('client.basis_informasi.cari')}}">
                  <div class="input-group rounded mb-5 p-1" style="background: #FC8404; ">
                      @csrf
                        <input name="cari" type="search" class="form-control rounded p-4 shadow" 
                        placeholder="Cari ... " aria-label="Search"
                        aria-describedby="search-addon" />
                      {{-- < type="submit"> --}}
                        <button class="input-group-text border-0 pr-4 pl-4" style="background: #FC8404; color:#ffff;" id="search-addon">
                          <i class="fas fa-search"></i>
                        </button>
                      {{-- </> --}}
                      
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
    <div style="min-height: 10vh"></div>
</div>

{{-- <div class="container">
    <h5> <i class="fas fa-search mr-5 mb-4" style="font-size: 1em; color:#0c5df4;"></i> Saya adalah kontak pewaris. Bagaimana cara mengelola profil kenangan di Facebook?
    </h5>
    <p style="padding-left: 6em; padding-right: 6em;">
      {{Str::limit('
      Sebagai kontak pewaris, Anda juga bisa meminta untuk menghapus akun kenangan yang Anda kelola. Untuk mengirimkan permintaan penghapusan akun atau jika ada pertanyaan terkait kontak pewaris, isi formulir ini.', 200)}}
    </p>
</div> --}}
<div class="container">
  @if (count($pertanyaans) < 1)
  <div class="text-center">
    <img class="mb-4 m-auto" width="250" src="{{asset('assets/images/ilustrasi/nothing.svg')}}" alt="">
    <h5>Kami tidak menemukan hasil</h5>
    <p>Pastikan semuanya dieja dengan benar atau coba kata kunci lainnya.</p>
  </div>
  @else
    <div id="accordion">
      @foreach ($pertanyaans as $pertanyaan)
      <div class="card shadow">
        <button class="btn text-dark btn-link collapsed pt-3 pb-3"  data-toggle="collapse" data-target="#collapse{{$pertanyaan->id}}" aria-expanded="false" aria-controls="collapse{{$pertanyaan->id}}">
          <div class="bg-white" id="heading{{$pertanyaan->id}}">
          <p class="mb-0 text-left">
            <i class="fas fa-search mr-5"></i>
            <b>
              {{$pertanyaan->pertanyaan}}
            </b>
            </p>
          </div>
        </button>
        <div id="collapse{{$pertanyaan->id}}" class="collapse" aria-labelledby="heading{{$pertanyaan->id}}" data-parent="#accordion">
          <div class="card-body pb-5 " style="padding-left: 6em; padding-right: 6em;">
            {!! $pertanyaan->jawaban !!}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @endif
  
</div>
<div style="min-height: 30vh"></div>
<div class="jumbotron" style="background-image: linear-gradient(#0c5df4, #0C94F4); color:#ffff;">
  <div class="container p-5">
      <div class="row">
        <div class="col-xl-8">
          <h3>Mulai Bergabung bersama kami sekarang !</h3>
          <p>Aplikasi OASSE sangat mendukung pengembangan Bisnis mitra dengan menyajikan berbagai fitur dan layanan terbaik.</p>
          <hr class="my-4">
        </div>
        <div class="col-xl-4 mt-4 text-right">
          <p class="lead">
            <a style="background:#FC8404;" class="btn text-white  btn-lg pt-3 pb-3 pr-5 pl-5 shadow" href="https://oasse.id/" role="button">TENTANG OASSE</a>
            </p>
        </div>
      </div> 
    </div>
</div>
<div style="min-height: 10vh"></div>
<div>
  <div class="container p-5">
      <div class="row">
        <div class="col-xl-12 text-center">
          <img class="mb-4" width="400" src="{{asset('assets/images/ilustrasi/call.svg')}}" alt="">
          <h3>Hubungi Tim OASSE</h3>
          <p class="mt-3">Jika anda lebih nyaman melakukan percakapan langsung dengan tim kami, <br> anda dapat menuliskan nomor handphone anda pada link di bawah, TIM kami yang akan menghubungi anda.</p>
          <hr class="my-4">
          <p class="lead">
            <a style="background:#FC8404;" class="btn text-white btn-lg shadow" href="https://oasse.id/#kontak" role="button">Masukan Nomor Handphone</a>
            </p>
        </div>
      </div> 
    </div>
</div>
<div style="min-height: 10vh"></div>
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
            <a class="text-white" href=""><p>Faq</p></a>
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
