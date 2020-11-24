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
                                            <h3 class="card-title font-16 mt-0">Tiket yang telah dibuat </h3>
                                            <h3 class="card-title font-16 mt-0">5</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Buat tiket baru</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0"> Tiket yang belum terjawab </h3>
                                            <h3 class="card-title font-16 mt-0">3</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Lihat tiket</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0"> Status tiket buka </h3>
                                            <h3 class="card-title font-16 mt-0">3</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Lihat tiket</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0">Status tiket tutup </h3>
                                            <h3 class="card-title font-16 mt-0">2</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">lihat tiket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Aktivitas terbaru</h4>
                                        <ol class="activity-feed mb-0">
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <span class="date text-white-50">Jan 10 (20:30)</span>
                                                    <span class="activity-text text-white">Balasan untuk tiket “Lorem ipsum dolor sit amet.”</span>
                                                </div>
                                            </li>
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <span class="date text-white-50">Jan 10 (20:30)</span>
                                                    <span class="activity-text text-white">Balasan untuk tiket “Lorem ipsum dolor sit amet.”</span>
                                                </div>
                                            </li>
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <span class="date text-white-50">Jan 10 (20:30)</span>
                                                    <span class="activity-text text-white">Balasan untuk tiket “Lorem ipsum dolor sit amet.”</span>
                                                </div>
                                            </li>
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <span class="date text-white-50">Jan 10 (20:30)</span>
                                                    <span class="activity-text text-white">Balasan untuk tiket “Lorem ipsum dolor sit amet.”</span>
                                                </div>
                                            </li>
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

