
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background:#0c5df4;">
    <div class="container pt-2 pb-2">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto">
            @if (Request::segment(1) == null)
                <a class="nav-item nav-link active" href="">Beranda</a>
            @else
                <a class="nav-item nav-link" href="">Beranda</a>
            @endif

            @if (Request::segment(1) == 'login')
                <a class="nav-item nav-link active" href="">Tiket Pelayanan</a>
            @else
                <a class="nav-item nav-link" href="">Tiket Pelayanan</a>
            @endif

            @if (Request::segment(1) == 'basis_informasi')
                <a class="nav-item nav-link active" href="">Basis Informasi</a> 
            @else
                <a class="nav-item nav-link" href="">Basis Informasi</a> 
            @endif

            @if (Request::segment(1) == '#pertanyaan_umum')
                <a class="nav-item nav-link" href="">Pertanyaan Umum</a>    
            @else
                <a class="nav-item nav-link" href="">Pertanyaan Umum</a>    
            @endif
          
             
          
        </div>
      </div>
    </div>
  </nav>