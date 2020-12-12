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
                        
                        <!-- end page title -->
                        <div style="min-height: 5vh;"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30 p-4">
                                    <div class="col-xl-12">
                                        @include('inc.messages')
                                    </div>
                                    <div class="card-body">
                                        
                                        <h4 class="mt-0 header-title">Tiket saya</h4>
                                        <p class="text-muted m-b-30">Pilih tiket yang ingin dilihat dengan mengklik baris pada tabel</p>
                                        <div class="row mb-4">
                                            <div class="mr-auto mt-4 col-xl-5">
                                                <div class="dropdown m-1 d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDivisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Divisi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownDivisi">
                                                    <a class="dropdown-item" href="{{route('client.tiket.index')}}">Semua</a>
                                                        @foreach ($divisis as $divisi)
                                                        <a class="dropdown-item" href="{{route('client.tiket.divisi_filter', $divisi->divisi)}}">{{$divisi->divisi}}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="dropdown m-1 d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownStatus">
                                                    <a class="dropdown-item" href="{{route('client.tiket.index')}}">Semua</a>
                                                    <a class="dropdown-item" href="{{route('client.tiket.status_filter', $status = 'Buka')}}">Buka</a>
                                                    <a class="dropdown-item" href="{{route('client.tiket.status_filter', $status = 'Tutup')}}">Tutup</a>
                                                    <a class="dropdown-item" href="{{route('client.tiket.status_filter', $status = 'Balasan Operator')}}">Balasan Operator</a>
                                                    <a class="dropdown-item" href="{{route('client.tiket.status_filter', $status = 'Balasan Client')}}">Balasan Client</a>
                                                    </div>
                                                </div>
                                                <form class="mt-1" id="form_search" action="{{route('client.tiket.judul_search')}}" method="GET">
                                                    {{ csrf_field() }}
                                                    <div class="col-xl-4 d-inline">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                @if ( !empty($_GET['search']))
                                                                    <input placeholder="Cari judul"  name="search" value="{{ $_GET['search'] }}" type="text" class="form-control mt-1 p-3">
                                                                @else
                                                                    <input placeholder="Cari judul"  name="search" value="" type="text" class="form-control mt-1 p-3">
                                                                @endif
                                                                <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                    <span class="input-group-text"><small> Search	&nbsp;</small> <i class="mdi mdi-magnify noti-icon"></i></span>
                                                                </button>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <form action="{{route('client.tiket.update_filter')}}" class="ml-3 mt-3 col-xl-6">
                                                @csrf
                                                <label for="">Filter update terakhir</label>
                                                <hr>
                                                @if (empty($_GET['dari']) && empty($_GET['sampai']))
                                                    <div class="form-group d-inline-block ">
                                                        <label for="dari">Dari:</label>
                                                        <br>
                                                        <input type="date" id="dari" name="dari">
                                                    </div>
                                                    <div class="form-group d-inline-block mr-2">
                                                        <label for="sampai">Sampai:</label>
                                                        <br>
                                                        <input type="date" id="sampai" name="sampai">
                                                    </div>
                                                @else
                                                    <div class="form-group d-inline-block ">
                                                        <label for="dari">Dari:</label>
                                                        <br>
                                                        <input value="{{$_GET['dari']}}" type="date" id="dari" name="dari">
                                                    </div>
                                                    <div class="form-group d-inline-block mr-2">
                                                        <label for="sampai">Sampai:</label>
                                                        <br>
                                                        <input value="{{$_GET['sampai']}}" type="date" id="sampai" name="sampai">
                                                    </div>
                                                @endif
                                                
                                                <button type="submit" style="border:none; padding:0;">
                                                    <span class="input-group-text"><small>Filter &nbsp;</small> <i class="mdi mdi-magnify noti-icon"></i></span>
                                                </button>
                                            </form>
                                            
                                        </div>
                                        
                                        <div style="overflow-x:auto;">
                                            <table id="mainTable" class="table table-striped mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>Divisi</th>
                                                    <th>Judul</th>
                                                    <th>Status</th>
                                                    <th>Update terakhir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tikets as $tiket)    
                                                        <tr>
                                                            <td>{{$tiket->divisi}}</td>
                                                            <td>{{$tiket->judul}}</td>
                                                            @switch($tiket->status)
                                                                @case('Buka')
                                                                    <td><i style="font-size: 1.5em;" class="mdi mdi-record text-success"></i> Buka</td>
                                                                    @break
                                                                @case('Tutup')
                                                                    <td><i style="font-size: 1.5em;" class="mdi mdi-record text-danger"></i> Tutup</td>
                                                                    @break
                                                                @case('Balasan operator')
                                                                    <td><i style="font-size: 1.5em;" class="mdi mdi-record text-primary"></i> Balasan Operator</td>
                                                                    @break
                                                                @case('Balasan client')
                                                                    <td><i style="font-size: 1.5em;" class="mdi mdi-record text-info"></i> Balasan Client</td>
                                                                    @break
                                                                @default
                                                            @endswitch
                                                            @if (empty($tiket->balasan_terbaru))
                                                                <td>{{$tiket->created_at}}</td>
                                                            @else
                                                                <td>{{$tiket->balasan_terbaru}}</td>
                                                            @endif
                                                            <td><a href="{{route('client.tiket.show', $tiket->id)}}" class="btn btn-primary">Lihat</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="row justify-content-center">
                                            <nav class="mt-5" aria-label="...">
                                                <ul class="pagination">
                                                    {{$tikets->links("pagination::bootstrap-4")}}
                                                </ul>
                                            </nav>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->            

                    </div><!-- container fluid -->

                </div> <!-- Page content Wrapper -->
        
            </div> <!-- content -->
        
        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->
@endsection
