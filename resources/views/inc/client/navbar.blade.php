<!-- Top Bar Start -->
<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
            <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo_dark.png') }}" height="22" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom" id="bg-white">

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
            {{-- <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="badge badge-danger badge-pill noti-icon-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Notification (3)</h5>
                    </div>

                    <div class="slimscroll-noti">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                            <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                            <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                            <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                        </a>

                    </div>
                    

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-all">
                        View All
                    </a>

                </div>
            </li> --}}
            <li class="list-inline-item dropdown notification-list nav-user">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    
                    <span class="d-none d-md-inline-block ml-1 text-dark">{{Auth::guard('client')->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
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
                <button type="button" class="button-menu-mobile open-left waves-effect" id="bg-white">
                    <i class="mdi mdi-menu text-dark"></i>
                </button>
            </li>
            {{-- <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    Create New <i class="mdi mdi-plus"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li> --}}
            <li class="list-inline-item notification-list d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link waves-effect text-dark">
                    Beranda <i class="ml-1 dripicons-home"></i>
                </a>
            </li>
            <li class="list-inline-item notification-list d-none d-sm-inline-block">
                <a href="{{App::make('url')->to('/')}}#pertanyaan_umum" class="nav-link waves-effect text-dark">
                    Pertanyaan Umum <i class="ml-1 dripicons-question"></i>
                </a>
            </li>
            <li class="list-inline-item notification-list d-none d-sm-inline-block">
                <a href="{{route('client.basis_informasi.index')}}" class="nav-link waves-effect text-dark">
                    Basis Informasi <i class="ml-1 dripicons-folder-open"></i>
                </a>
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->