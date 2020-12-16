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
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret','April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober' , 'November', 'Desember',],
            datasets: [{
                label: 'Jumlah Tiket',
                
                data: [{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$mei}},
                {{$jun}},{{$jul}},{{$agu}},{{$sep}},{{$okt}},{{$nov}},{{$des}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    '#46cd93'
                ],
                
                borderWidth: 4
            }],
            
        },
        options: {
            // This chart will not respond to mousemove, etc
            // events: ['click']
            // onClick: testClick
            onClick: handleClick
        }
    }); 
    
    function handleClick(evt) {
        var col;

        this.getElementsAtEventForMode(evt, "x", 1).forEach(function(item) { col = item._index });

        if (!col) {
            return;
        }

        alert("Column " + col + " was selected");
    };
    
</script>
@endsection