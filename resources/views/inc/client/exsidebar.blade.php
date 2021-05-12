<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            
            <a href="index.html" class="logo"><img src=" {{asset('assets/images/logo_dark.png')}}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('client')}}" class="waves-effect mt-5">
                        <i class="dripicons-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('client.show')}}" class="waves-effect">
                        <i class="dripicons-user"></i>
                        <span> Profile </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('client.tiket.index')}}" class="waves-effect">
                        <i class="dripicons-view-thumb"></i>
                        <span> Tiket saya</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('client.tiket.create')}}" class="waves-effect">
                        <i class="dripicons-pencil"></i>
                        <span> Buat tiket </span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>