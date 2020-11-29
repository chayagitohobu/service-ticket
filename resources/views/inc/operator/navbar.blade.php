<div class="topbar">
            
    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
            <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo.png') }}" height="22" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom">

         <!-- Search input -->
         <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="list-inline float-right mb-0">
            
            <li class="list-inline-item dropdown notification-list nav-user">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    {{-- <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" alt="user" class="rounded-circle"> --}}
                    <span class="d-md-inline-block ml-1">{{Auth::guard('user')->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    <a class="dropdown-item" href="{{ route('operator.show')}}"><i class="dripicons-user text-muted"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="dripicons-exit text-muted"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

        </ul>

    </nav>

</div>