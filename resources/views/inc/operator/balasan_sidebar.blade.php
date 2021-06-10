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
                    <a href="{{route('operator.tiket.index')}}" class="waves-effect mt-3">
                        <i class="dripicons-home"></i>
                        <span> Kembali </span>
                    </a>
                </li>
                <li class="menu-title  mt-2">INFORMASI TIKET</li>
                <li>
                    <div class="card m-b-30 p-2">
                        <div class="card m-b-30">
                            <div class="card-body">
                                
                                @switch($message->division)
                                    @case('technology')
                                        <p class="card-text"><span class=" text-uppercase ">Divisi</span> | <br> <br> <i class="mdi mdi-office-building text-secondary"></i> Teknologi</p>
                                        @break
                                    @case('marketing')
                                        <p class="card-text"><span class=" text-uppercase ">Divisi</span> | <br> <br> <i class="mdi mdi-office-building text-secondary"></i> Pemasaran </p>
                                        @break
                                    @case('human resource')
                                        <p class="card-text"><span class=" text-uppercase ">Divisi</span> | <br> <br> <i class="mdi mdi-office-building text-secondary"></i> Sumber Daya Manusia</p>
                                        @break
                                    @case('finance')
                                        <p class="card-text"><span class=" text-uppercase ">Divisi</span> | <br> <br> <i class="mdi mdi-office-building text-secondary"></i> Keuangan </p>
                                        @break
                                    @default
                                        
                                @endswitch
                                <hr>
                                @switch($message->status)
                                    @case('Open')
                                        <p class="card-text"><span class=" text-uppercase ">Status</span> | <br> <br> <i class="mdi mdi-record text-success"></i> Buka</p>
                                        @break
                                    @case('Close')
                                        <p class="card-text"><span class=" text-uppercase ">Status</span> | <br> <br> <i class="mdi mdi-record text-danger"></i> Tutup</p>
                                        @break
                                    @case('Client reply')
                                        <p class="card-text"><span class=" text-uppercase ">Status</span> | <br> <br> <i class="mdi mdi-record text-info"></i> Balasan Client</p>
                                        @break
                                    @case('Operator reply')
                                        <p class="card-text"><span class=" text-uppercase ">Status</span> | <br> <br> <i class="mdi mdi-record text-primary"></i> Balasan Operator</p>
                                        @break
                                    @default
                                        <p class="card-text"><span class=" text-uppercase ">Status</span> | <br> <br> <i class="mdi mdi-record text-success"></i> Buka</p>
                                @endswitch
                                
                                <hr>

                                @switch($message->priority)
                                    @case('Low')
                                        <p class="card-text"><span class=" text-uppercase ">Prioritas</span> | <br> <br> <i class="mdi mdi-note-multiple text-secondary"></i> Rendah</p>        
                                        @break
                                    @case('Medium')
                                        <p class="card-text"><span class=" text-uppercase ">Prioritas</span> | <br> <br> <i class="mdi mdi-note-multiple text-secondary"></i> Sedang</p>
                                        @break
                                    @case('High')
                                        <p class="card-text"><span class=" text-uppercase ">Prioritas</span> | <br> <br> <i class="mdi mdi-note-multiple text-secondary"></i> Tinggi</p>
                                        @break
                                    @default
                                        <p class="card-text"><span class=" text-uppercase ">Prioritas</span> | <br> <br> <i class="mdi mdi-note-multiple text-secondary"></i> Rendah</p>
                                @endswitch

                                
                                <hr>
                                <p class="card-text">Update terakhir | <br> <br> <i class="mdi mdi-update text-secondary"></i> 
                                    
                                    @if ( empty($message->balasan_terbaru))
                                        {{$message->created_at}}
                                    @else
                                        {{$message->balasan_terbaru}}
                                    @endif
                                    
                                </p>
                                <hr>
                                <p class="card-text">Dibuat pada | <br> <br> <i class="mdi mdi-calendar-check-outline text-secondary"></i> {{$message->created_at}}</p>
                                <hr>
                                <br>
                                @if (!empty($message))
                                    @if ($message->status != 'Tutup')
                                        <a class="row justify-content-center" href="{{route('operator.tiket.tutup',$message->id)}}">
                                            <button class="btn btn-primary text-center"> <i class="mdi mdi-close-box"></i> Tutup Tiket</button>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>