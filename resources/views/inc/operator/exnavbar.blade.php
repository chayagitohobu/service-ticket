<div class="topbar">
        
    <div id="bg-white" class="topbar-left d-none d-lg-block">
        <div class="text-center">
            <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo_dark.png') }}" height="22" alt="logo"></a>
        </div>
    </div>
    <nav id="bg-white" class="navbar-custom">
         <!-- Search input -->
        <ul class="pt-2 pb-2 list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list nav-user">
                <i class="text-muted ml-4 dripicons-home"></i> Beranda
                <i class="text-muted ml-4 dripicons-question "></i> Pertanyaan umum
                <i class="text-muted ml-4 dripicons-folder-open "></i> Basis Informasi
                {{-- <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    <span class="text-dark d-md-inline-block ml-1 text-uppercase"> | {{Auth::guard('user')->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a> --}}
                <button id="bg-blue" class="btn btn-sm btn-primary dropdown-toggle mt-3 mb-3 mr-4 ml-5 waves-effect text-uppercase" data-toggle="dropdown"> {{Auth::guard('user')->user()->name}} </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    <a class="dropdown-item" href="{{route('admin.show')}}"><i class="dripicons-user text-muted"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href=""><i class="dripicons-exit text-muted"></i> Logout</a> --}}
                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="dripicons-exit text-muted"></i>
                        {{ __('logout') }}
                    </a>   
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button id="bg-white" type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="text-dark mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
    </nav>

</div>