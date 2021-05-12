
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background:#0c5df4;">
    <div class="container pt-2 pb-2">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto">
            @if (Request::segment(1) == null)
                <a class="nav-item nav-link text-uppercase font-weight-bold active" href="{{App::make('url')->to('/')}}">Beranda</a>
            @else
                 <a class="nav-item nav-link text-uppercase font-weight-bold" href="/">Beranda</a>
            @endif

            {{-- @if (Request::segment(1) == 'login')
                <a class="nav-item nav-link text-uppercase font-weight-bold active" href="{{route('client.tiket.index')}}">Tiket Pelayanan</a>
            @else
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{route('login')}}">Tiket Pelayanan</a>
            @endif --}}

            @if(Auth::guard('user')->check())
                {{-- Hello {{Auth::guard('user')->user()->role_id}} --}}
                @if (Auth::guard('user')->user()->role_id == 1)
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{route('admin.tiket.index')}}">Tiket Pelayanan</a>
                @else
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{route('operator.tiket.index')}}">Tiket Pelayanan</a>
                @endif
            @elseif(Auth::guard('client')->check())
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{route('client.tiket.index')}}">Tiket Pelayanan</a>
            @else
              @if (Request::segment(1) == 'login')
                  <a class="nav-item nav-link text-uppercase font-weight-bold active" href="{{route('login')}}">Tiket Pelayanan</a>
              @else
                  <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{route('login')}}">Tiket Pelayanan</a>
              @endif
            @endif

            @if (Request::segment(1) == 'basis_informasi')
                <a class="nav-item nav-link text-uppercase font-weight-bold active" href="{{route('client.basis_informasi.index')}}">Basis Informasi</a> 
            @else
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{route('client.basis_informasi.index')}}">Basis Informasi</a> 
            @endif

            @if (Request::segment(1) == '#pertanyaan_umum')
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{App::make('url')->to('/')}}#pertanyaan_umum">Pertanyaan Umum</a>    
            @else
                <a class="nav-item nav-link text-uppercase font-weight-bold" href="{{App::make('url')->to('/')}}#pertanyaan_umum">Pertanyaan Umum</a>    
            @endif
        </div>
      </div>
    </div>
  </nav>