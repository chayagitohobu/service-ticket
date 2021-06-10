<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            
            <a href="{{route('client')}}" class="logo"><img src="{{asset('assets/images/logo_dark.png')}}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft mt-5">
        
        <div id="sidebar-menu">
            <ul>
                {{-- <li class="menu-title">Main</li> --}}

                {{-- <li>
                    <a href="index.html" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span> Dashboard <span class="badge badge-success badge-pill float-right">3</span></span>
                    </a>
                </li> --}}

                <li class="mt-1">
                    <a href="{{route('client')}}" class="waves-effect"><i class="dripicons-graph-bar"></i><span> Dasbor </span></a>
                </li>
                <li class="mt-1">
                    <a href="{{route('client.show')}}" class="waves-effect"><i class="dripicons-user"></i><span> Profil </span></a>
                </li>
                <li class="mt-1">
                    <a href="{{route('client.tiket.index')}}" class="waves-effect"><i class="dripicons-view-thumb"></i><span> Pertanyaan Saya </span></a>
                </li>
                <li class="mt-1">
                    <a href="{{route('client.tiket.create')}}" class="waves-effect"><i class="dripicons-pencil"></i><span> Ajukan Pertanyaan </span></a>
                </li>



            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>