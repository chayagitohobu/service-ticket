@extends('layouts.app')

@section('style')
    <style>
        @media screen {
            div.printFooter {
                display: none;
            }
            div.printHeader {
                display: none;
            }
        }

        @media print {
            body * {
            visibility: hidden;
            }
            #section-to-print, #section-to-print * {
            visibility: visible;
            }
            #section-to-print {
            position: static;
            left: 0;
            top: 50;
            }
            #section-to-print, #section-to-print #aksi {
            visibility: hidden;
            }
            div.printFooter {
                position: fixed;
                bottom: 0;
            }
            div.printHeader {
                position: fixed;
                top: 0;
            }
        }
    </style>
@endsection

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
                        
                        <!-- end page title -->
                        <div style="min-height: 5vh;"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30 p-4">
                                    <div class="col-xl-12">
                                        @include('inc.messages')
                                    </div>
                                    <div class="card-body">
                                        <div id="hide" class="row mb-4">
                                            
                                            <div class="col-xl-4">
                                                <h4 class="mt-0 header-title">Daftar Tiket</h4>
                                                <p class="text-muted">Berikut adalah daftar Tiket</p>
                                            </div>
                                            <div class="col-xl-8 text-right">
                                                <a class="d-inline-block mr-2" href="{{route('admin.tiket.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Tiket</button>
                                                </a>
                                                <div class="d-inline-block">
                                                    <button onclick="window.print()" type="button" class="btn btn-success btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-print mr-3"></i>Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="mr-auto mt-4 col-xl-5">
                                                <div class="dropdown m-1 d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDivisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Nama
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownDivisi">
                                                    <a class="dropdown-item" href="{{route('admin.tiket.index')}}">Semua</a>
                                                        @foreach ($namas as $nama)
                                                            @switch($nama->role_id)
                                                                @case(1)
                                                                    <a class="dropdown-item" href="{{route('admin.tiket.name_filter', $nama->user_name)}}">{{$nama->user_name}} (admin) </a>
                                                                    @break
                                                                    @case(2)
                                                                    <a class="dropdown-item" href="{{route('admin.tiket.name_filter', $nama->user_name)}}">{{$nama->user_name}} (operator) </a>
                                                                    @break
                                                                @default
                                                                <a class="dropdown-item" href="{{route('admin.tiket.name_filter', $nama->client_name)}}">{{$nama->client_name}}</a>
                                                            @endswitch
                                                        
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="dropdown m-1 d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDivisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Divisi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownDivisi">
                                                    <a class="dropdown-item" href="{{route('admin.tiket.index')}}">Semua</a>
                                                        @foreach ($divisis as $divisi)
                                                        <a class="dropdown-item" href="{{route('admin.tiket.divisi_filter', $divisi->divisi)}}">{{$divisi->divisi}}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="dropdown m-1 d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownStatus">
                                                    <a class="dropdown-item" href="{{route('admin.tiket.index')}}">Semua</a>
                                                    <a class="dropdown-item" href="{{route('admin.tiket.status_filter', $status = 'Buka')}}">Buka</a>
                                                    <a class="dropdown-item" href="{{route('admin.tiket.status_filter', $status = 'Tutup')}}">Tutup</a>
                                                    <a class="dropdown-item" href="{{route('admin.tiket.status_filter', $status = 'Balasan Operator')}}">Balasan Operator</a>
                                                    <a class="dropdown-item" href="{{route('admin.tiket.status_filter', $status = 'Balasan Client')}}">Balasan Client</a>
                                                    </div>
                                                </div>
                                                <form class="mt-1" id="form_search" action="{{route('admin.tiket.search')}}" method="GET">
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

                                            <form action="{{route('admin.tiket.update_filter')}}" class="ml-3 mt-3 col-xl-6">
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
                                       
                                        <div id="section-to-print" style="overflow-x: auto;">
                                            <div class="printHeader" >
                                                <div>
                                                    <div style="min-height: 5vh"></div>
                                                    <img src=" {{asset('assets/images/logo_dark.png')}}" height="30" alt="logo">
                                                </div>
                                                <div>
                                                    <div style="min-height: 3vh"></div>
                                                    <h1>Laporan Tiket</h1>
                                                    <p> URL : {{Request::fullUrl()}}</p>
                                                </div>
                                                <hr class="container">
                                                <div>
                                                    <br>
                                                    <p>Tanggal : {{ date('Y-m-d H:i:s') }}</p>
                                                    @if (!empty($_GET['search']))
                                                        @switch(Request::segment(3))
                                                            @case('search')
                                                            <p>Judul Search : {{$_GET['search']}}</p>
                                                                @break
                                                            @default
                                                            <p>Search : {{$_GET['search']}}</p>
                                                        @endswitch
                                                    @endif
                                                    <p>
                                                        @switch(Request::segment(3))
                                                            @case('name_filter')
                                                            Nama Filter : {{Request::segment(4)}}
                                                                @break
                                                            @case('divisi_filter')
                                                            Divisi Filter : {{Request::segment(4)}}
                                                                @break
                                                            @case('status_filter')
                                                            Status Filter : {{Request::segment(4)}}
                                                                @break
                                                            @case('update_filter')
                                                            Update Terakhir Filter : 
                                                            <br>
                                                            Dari : {{$_GET['dari']}}
                                                            <br>
                                                            Sampai : {{$_GET['sampai']}}
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                    </p>

                                                    <p>Halaman : {{$tikets->currentPage()}}</p>
                                                </div>
                                                
                                            </div>
                                            <table id="mainTable" class="table table-striped table-bordered mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Divisi</th>
                                                    <th>Judul</th>
                                                    <th>Status</th>
                                                    <th>Update terakhir</th>
                                                    <th id="aksi" colspan="3" class="text-center">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($tikets as $tiket)
                                                    <tr>
                                                    @if (empty($tiket->client_name))
                                                            @switch($tiket->role_id)
                                                                @case(1)
                                                                    <td>{{$tiket->user_name}} (admin)</td>
                                                                    @break
                                                                @case(2)
                                                                    <td>{{$tiket->user_name}} (operator)</td>
                                                                    @break
                                                                @default
                                                                    
                                                            @endswitch
                                                        @else
                                                            <td> {{$tiket->client_name}} {{$tiket->user_name}} </td>
                                                        @endif
                                                        <td>{{$tiket->divisi}}</td>
                                                        <td>{{$tiket->judul}}</td>
                                                        @switch($tiket->status)
                                                            @case('Buka')
                                                                <td><i style="font-size: 1.5em;" class="mdi mdi-record text-success"></i> Buka</td>
                                                                @break
                                                            @case('Tutup')
                                                                <td><i style="font-size: 1.3em;" class="mdi mdi-record text-danger"></i> Tutup</td>
                                                                @break
                                                            @case('Balasan operator')
                                                                <td><i style="font-size: 1.3em;" class="mdi mdi-record text-primary"></i> Balasan Operator</td>
                                                                @break
                                                            @case('Balasan client')
                                                                <td><i style="font-size: 1.3em;" class="mdi mdi-record text-info"></i> Balasan Client</td>
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                        @if (empty($tiket->balasan_terbaru))
                                                            <td>{{$tiket->created_at}}</td>
                                                        @else
                                                            <td>{{$tiket->balasan_terbaru}}</td>
                                                        @endif
                                                        
                                                        <td id="aksi" class="text-right"><a id="aksi" href="{{route('admin.tiket.show', $tiket->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat "><i id="aksi" class="mdi mdi-eye text-white"></i></a> 
                                                            
                                                        </td>
                                                        <td id="aksi" class="text-center">
                                                            <a id="aksi" href="{{route('admin.tiket.edit', $tiket->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i id="aksi" class="fas fa-pen text-white"></i></a>
                                                            
                                                        </td>
                                                        <td id="aksi" class="text-left">
                                                            <form class="d-inline" action="{{route('admin.tiket.destroy', $tiket->id)}}" method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button id="aksi" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i id="aksi" class="fas fa-trash text-white"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="printFooter">{{ date('Y-m-d H:i:s') }}</div>    
                                        </div>
                                        <div class="row justify-content-center">
                                            <nav class="mt-5" aria-label="...">
                                                <ul class="pagination">
                                                    {{-- {{$tikets->appends('tikets')->links("pagination::bootstrap-4")}} --}}
                                                    {{$tikets->links("pagination::bootstrap-4")}}
                                                    {{-- {!! $tikets->render() !!} --}}
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
