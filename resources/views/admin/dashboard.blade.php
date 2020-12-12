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
                        <div class="container" style="min-height: 5vh"></div>
                        <div class="row">
                            <div class="card col-xl-8">
                                
                                <div class="card-body">
                                    <canvas id="myChart" width="400" height="300"></canvas>
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
                    </div>
        
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

    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret','April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober' , 'November', 'Desember',],
            datasets: [{
                label: 'Jumlah Tiket',
                
                data: [{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$mei}},
                {{$jun}},{{$jul}},{{$agu}},{{$sep}},{{$okt}},{{$nov}},{{$des}}],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                ],
                borderColor: [
                    '#46cd93'
                ],
                borderWidth: 4
            }],
            
        },
        options: {
            // This chart will not respond to mousemove, etc
            events: ['click']
            // onClick: testClick
        }
    }); 
    
    function testClick(){
        console.log('test');
    }
</script>
@endsection