@extends('layouts.app')

@section('content')
@include('inc.navbar')

<div class="jumbotron-fluid pt-5 pb-5" style="background-image: linear-gradient(#0c5df4, #0C94F4); color:#ffff;">
    <div style="min-height: 10vh"></div>
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-6 m-auto">
              @include('inc.messages')
              <img class="mb-4" width="400" src="{{asset('assets/images/ilustrasi/help.svg')}}" alt="">
              <div>
                  {{-- <div >
                      <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="60" alt="logo"></a>
                  </div> --}}
                  <h5 class="mb-5 text-uppercase"> Apa yang bisa kami bantu ?</h5>
                  <hr>
                  <form action=" {{route('client.basis_informasi.cari')}} ">
                    <div class="input-group rounded mb-5">
                      <input type="search" class="form-control rounded" placeholder="Cari" aria-label="Search"
                        aria-describedby="search-addon" />
                      <span class="input-group-text border-0 pr-5 pl-5" style="background: #FC8404; color:#ffff;" id="search-addon">
                        <i class="fas fa-search"></i>
                      </span>
                    </div>
                  </form>
                  
              </div>
            </div>
        </div>
    </div>
    <div style="min-height: 10vh"></div>
</div>
<div style="min-height: 10vh"></div>
<div class="container p-5">
  <h5 class="text-center">Pelayanan Pelanggan OASSE</h5>
  <p class="text-center">Pengguna OASSE akan mendapatkan dukungan layanan, tutorial hingga pelatihan langsung dari TIM Profesional kami.</p>
  <div style="min-height: 10vh"></div>  
  {{-- <div class="card-deck">
        <div class="card p-5 shadow">
          <img class="card-img-top" id="card-image" src="{{asset('assets/images/ilustrasi/fast.svg')}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Respon Yang Cepat</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card p-5 shadow">
          <img class="card-img-top" id="card-image" src="{{asset('assets/images/ilustrasi/friend.svg')}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Operator Yang Ramah</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card p-5 shadow">
          <img class="card-img-top" id="card-image" src="{{asset('assets/images/ilustrasi/check.svg')}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Masalah Langsung Terselesaikan</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
    </div> --}}
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
            <div class="card p-5 shadow h-100">
                <img class="card-img-top" id="card-image" src="{{asset('assets/images/ilustrasi/fast.svg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5>Tiket Pelayanan</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
        </div>
        <div class="col mb-4">
            <div class="card p-5 shadow h-100">
                <img class="card-img-top" id="card-image" src="{{asset('assets/images/ilustrasi/friend.svg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5>Basis Informasi</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
        </div>
        <div class="col mb-4">
            <div class="card p-5 shadow h-100">
                <img class="card-img-top" id="card-image" src="{{asset('assets/images/ilustrasi/check.svg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5>Pertanyaan Umum</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
        </div>
    </div>
</div>
<div style="min-height: 10vh"></div>
<div class="container p-5" id="pertanyaan_umum">
  <h5  class="text-left">Pertanyaan Umum</h5>
  <p>Pertanyaan umum yang sering ditanyakan oleh para client</p>
  <hr>
  <div id="accordion">
      @foreach ($informations as $information)
      <div class="card shadow">
        <button class="btn text-dark btn-link collapsed pt-3 pb-3"  data-toggle="collapse" data-target="#collapse{{$information->id}}" aria-expanded="false" aria-controls="collapse{{$information->id}}">
          <div class="bg-white" id="heading{{$information->id}}">
          <p class="mb-0 text-left">
            <i class="fas fa-arrow-down mr-5"></i>
            <b>
              {{$information->question}}
            </b>
            </p>
          </div>
        </button>
        <div id="collapse{{$information->id}}" class="collapse" aria-labelledby="heading{{$information->id}}" data-parent="#accordion">
          <div class="card-body pb-5 " style="padding-left: 6em; padding-right: 6em;">
            {!! $information->answer !!}
          </div>
        </div>
      </div>
      @endforeach
  </div>
</div>
<div style="min-height: 10vh"></div>
<div class="jumbotron" style="background-image: linear-gradient(#0c5df4, #0C94F4); color:#ffff;">
  <div class="container p-5">
      <div class="row">
        <div class="col-xl-8">
          <h5>Mulai Bergabung bersama kami sekarang !</h5>
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
          <h5>Hubungi Tim OASSE</h5>
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
