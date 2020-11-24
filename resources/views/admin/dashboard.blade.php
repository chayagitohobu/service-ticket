@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('inc.admin.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
        
                <!-- Top Bar Start -->
                @include('inc.admin.navbar')
                <!-- Top Bar End -->
        
                <div class="page-content-wrapper ">
        
                    <div class="container-fluid">
                        <div style="min-height: 5vh;"></div>
                        
                        <div class="row">
                            <div class="col-xl-12">
                                @include('inc.messages')
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0">Jumlah Tiket </h3>
                                            <h3 class="card-title font-16 mt-0">5</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Lihat Tiket</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0"> Jumlah Client </h3>
                                            <h3 class="card-title font-16 mt-0">3</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Lihat Client</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-3">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0"> Jumlah User </h3>
                                            <h3 class="card-title font-16 mt-0">3</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Lihat User</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="card m-b-30 card-body text-center">
                                            <h3 class="card-title font-16 mt-0"> Jumlah Divisi</h3>
                                            <h3 class="card-title font-16 mt-0">3</h3>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Lihat Divisi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title mb-4">File Laporan Tiket</h4>
                                                <table class="table table-striped mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2015</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2016</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2017</h6>
                                                                <p class="text-muted mb-0">pretium quis</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2018</h6>
                                                                <p class="text-muted mb-0">ultricies nec</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title mb-4">File Laporan Client</h4>
                                                <table class="table table-striped mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2015</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2016</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2017</h6>
                                                                <p class="text-muted mb-0">pretium quis</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2018</h6>
                                                                <p class="text-muted mb-0">ultricies nec</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title mb-4">File Laporan User</h4>
                                                <table class="table table-striped mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2015</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2016</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2017</h6>
                                                                <p class="text-muted mb-0">pretium quis</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2018</h6>
                                                                <p class="text-muted mb-0">ultricies nec</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title mb-4">File Laporan Divisi</h4>
                                                <table class="table table-striped mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2015</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2016</h6>
                                                                <p class="text-muted mb-0">dolor sit amet</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2017</h6>
                                                                <p class="text-muted mb-0">pretium quis</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                                            <td>
                                                                <h6 class="mt-0">2018</h6>
                                                                <p class="text-muted mb-0">ultricies nec</p></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                    
                                            </div>
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
                        <div class="row">
                            <div class="col-xl-4">
                                <canvas id="myChart" width="400" height="400"></canvas>
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

@section('script')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Client', 'User', 'Divisi','Tiket'],
            datasets: [{
                label: 'Jumlah record',
                data: [{{count($clients)}}, {{count($users)}}, {{count($divisis)}}, {{count($tikets)}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
@endsection