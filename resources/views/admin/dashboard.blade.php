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
                                    <canvas id="lineChart" width="400" height="300"></canvas>
                                </div>
                              </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p class="header-title"> <small>Distribusi Divisi Tiket Pada Bulan</small> </p>
                                        
                                        @if (empty($bulan))
                                        <p class="header-title"><b> JANUARI</b></p>
                                        @else
                                        <p class="header-title"><b> {{$bulan}}</b></p>
                                        @endif
                                        
                                        <hr>
                                        <canvas id="pieChart" width="400" height="300"></canvas>
                                    </div>
                                  </div>
                                  <div class="card card-body text-center">
                                    <p class="header-title"> <small>jumlah client</small> </p>
                                    <hr>
                                    <h5 class="mt-0" style="font-size: 3em"> <b>{{$jumlah_client}}</b></h5>
                                    <br>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script>
    
    // Chart.plugins.unregister(ChartDataLabels);

    var lineChart = document.getElementById('lineChart').getContext('2d');
    var pieChart = document.getElementById('pieChart').getContext('2d');
    

    var myLineChart = new Chart(lineChart, {
        type: 'bar',
        data: {
            labels: ['Januari ', 'Februari', 'Maret','April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober' , 'November', 'Desember',],
            datasets: [{
                label: 'Jumlah Tiket',
                
                data: [{{$jan}},{{$feb}},{{$mar}},
                {{$apr}},{{$mei}},{{$jun}},{{$jul}},
                {{$agu}},{{$sep}},{{$okt}},{{$nov}},{{$des}}],
                backgroundColor: [
                    '#4c5f7a',
                    '#393e6f',
                    '#3d2e4f',
                    '#321d2f',
                    '#342056',
                    '#220e24',
                    '#353941',
                    '#26282b',
                    '#055e68',
                    '#065471',
                    '#0c2233',
                    '#411e8f'
                ],
                borderColor: [
                    // '#46cd93'
                    '#0000'
                ],
                
                borderWidth: 4
            }],
            
        },
        
        options: {
            onClick: handleClick,
            tooltips: {
                enabled: false
            },
            plugins:{
            datalabels:{
                color: '#ffff',
                anchor: 'middle',
                align:'start',
                offset: -30,
                borderWidth: 2,
                borderColor: '#ffff',
                borderRadius: 20,
                backgroundColor: (context) => {
                    return context.dataset.backgroundColor;
                },
                font:{
                    weight: 'bold',
                    size: 13,

                }
            }
        }
        }
    }); 


    var pieChart = new Chart(pieChart, {
    type: 'pie',
    data: { 
        labels: ["Technology", "Marketing", "Human Resource", "Finance"],
        datasets: [{
        backgroundColor: [
            "#1a1a2e",
            "#16213e",
            "#0f3460",
            "#310a5d"
        ],
        data: [{{$technology}}, {{$marketing}}, {{$human_resource}}, {{$finance}}]
        }]
    },
    options:{
        legend:{
            position:'bottom',
            
        },
        plugins:{
            datalabels:{
                color: '#ffff',
                anchor: 'end',
                align:'start',
                offset: -10,
                borderWidth: 2,
                borderColor: '#ffff',
                borderRadius: 20,
                backgroundColor: (context) => {
                    return context.dataset.backgroundColor;
                },
                font:{
                    weight: 'bold',
                    size: 13,

                }
            }
        }
    }
    });

    function handleClick(evt) {
        var col;

        this.getElementsAtEventForMode(evt, "x", 1).forEach(function(item) { col = item._index });

        // if (!col) {
        //     return;
        // }

        // var test = 'test';
        switch(col){
            case 0 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/januari';
            break;
            case 1 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/februari';
            break;
            case 2 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/maret';
            break;
            case 3 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/april';
            break;
            case 4 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/mei';
            break;
            case 5 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/juni';
            break;
            case 6 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/juli';
            break;
            case 7 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/agustus';
            break;
            case 8 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/september';
            break;
            case 9 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/oktober';
            break;
            case 10 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/november';
            break;
            case 11 :
            window.location.href = 'http://127.0.0.1:8000/admin/home/bulan/desember';
            break;
            default:
            window.location.href = 'http://127.0.0.1:8000/admin/home';
        }

        
    };
    
</script>
@endsection