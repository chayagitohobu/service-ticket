<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            
            <a href="index.html" class="logo"><img src="assets/images/logo_dark.png" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="/client/tiket" class="waves-effect mt-3">
                        <i class="dripicons-home"></i>
                        <span> Back </span>
                    </a>
                </li>
                <li class="menu-title  mt-2">INFORMASI TIKET</li>
                <li>
                    <div class="card m-b-30 p-2">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <p class="card-text">Status | <i class="mdi mdi-record text-success"></i> {{$tiket->status}}</p>
                                <hr>
                                <p class="card-text">Divisi | <i class="mdi mdi-office-building text-secondary"></i> {{$tiket->divisi}}</p>
                                <hr>
                                <p class="card-text">Prioritas | <i class="mdi mdi-note-multiple text-secondary"></i> {{$tiket->prioritas}}</p>
                                <hr>
                                <p class="card-text">Update terakhir | <br> <br> <i class="mdi mdi-update text-secondary"></i> 
                                    
                                    @if ( empty($tiket->balasan_terbaru))
                                        {{$tiket->created_at}}
                                    @else
                                        {{$tiket->balasan_terbaru}}
                                    @endif
                                    
                                </p>
                                <hr>
                                <p class="card-text">Dibuat pada | <br> <br> <i class="mdi mdi-calendar-check-outline text-secondary"></i> {{$tiket->created_at}}</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>