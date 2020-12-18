@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('inc.client.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
        
                <!-- Top Bar Start -->
                @include('inc.client.navbar')
                <!-- Top Bar End -->
        
                <div class="page-content-wrapper ">
            
                    <div class="container-fluid">
                        <div style="min-height: 5vh;"></div>
                        @include('inc.messages')
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class=" mt-0">Jumlah tiket yang dibuat</label>
                                            <br>
                                            <h3 class="mt-0">{{$jumlah_tiket}}</h3>
                                            <br>
                                            <a href="{{route('client.tiket.create')}}" class="btn btn-primary waves-effect waves-light">Buat tiket baru</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class="mt-0"> Tiket yang belum terjawab </label>
                                            <br>
                                            <h3 class="mt-0">{{$belum_terjawab}}</h3>
                                            <br>
                                            <a href="{{route('client.tiket.status_filter', $status = 'Balasan operator')}}" class="btn btn-primary waves-effect waves-light">Lihat tiket</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class="mt-0"> Status tiket buka </label>
                                            <br>
                                            <h3 class="mt-0">{{$status_buka}}</h3>
                                            <br>
                                            <a href="{{route('client.tiket.status_filter', $status = 'Buka')}}" class="btn btn-primary waves-effect waves-light">Lihat tiket</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class="mt-0">Status tiket tutup </label>
                                            <br>
                                            <h3 class="mt-0">{{$status_tutup}}</h3>
                                            <br>
                                            <a href="{{route('client.tiket.status_filter', $status = 'Tutup')}}" class="btn btn-primary waves-effect waves-light">lihat tiket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Aktivitas terbaru</h4>
                                        <ol class="activity-feed mb-0">
                                            @foreach ($aktivitas_terbarus as $aktivitas_terbaru)
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <span class="date text-white-50">{{$aktivitas_terbaru->balasan_terbaru}}</span>
                                                    <span class="activity-text text-white">Balasan untuk tiket “{{$aktivitas_terbaru->judul}}”</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- end row -->
        
                              
        
                    </div><!-- container fluid -->
        
                </div> <!-- Page content Wrapper -->
        
            </div> <!-- content -->
        
        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->
@endsection

