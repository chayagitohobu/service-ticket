@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('inc.operator.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
        
                <!-- Top Bar Start -->
                @include('inc.operator.navbar')
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
                                            <label class="mt-0">Jumlah pertanyaan yang dibuat</label>
                                            <br>
                                            <h3 class="mt-0">{{$jumlah_tiket}}</h3>
                                            <br>
                                            <a href="{{route('operator.tiket.create')}}" class="btn btn-primary waves-effect waves-light">Buat pertanyaan baru</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class="mt-0"> pertanyaan yang belum terjawab </label>
                                            <br>
                                            <h3 class="mt-0">{{$belum_terjawab}}</h3>
                                            <br>
                                            <a href="{{route('operator.tiket.status_filter', $status = 'Balasan client')}}" class="btn btn-primary waves-effect waves-light">Lihat pertanyaan</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class="mt-0"> Status pertanyaan buka </label>
                                            <br>
                                            <h3 class="mt-0">{{$status_buka}}</h3>
                                            <br>
                                            <a href="{{route('operator.tiket.status_filter', $status = 'Open')}}" class="btn btn-primary waves-effect waves-light">Lihat pertanyaan</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <label class="mt-0">Status pertanyaan tutup </label>
                                            <br>
                                            <h3 class="mt-0">{{$status_tutup}}</h3>
                                            <br>
                                            <a href="{{route('operator.tiket.status_filter', $status = 'Close')}}" class="btn btn-primary waves-effect waves-light">lihat pertanyaan</a>
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
                                                    <span class="date text-white-50">{{$aktivitas_terbaru->newest_reply}}</span>
                                                    <span class="activity-text text-white">Balasan untuk pertanyaan “{{$aktivitas_terbaru->title}}”</span>
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



