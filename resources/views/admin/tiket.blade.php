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
                        
                        <!-- end page title -->
                        <div style="min-height: 5vh;"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30 p-4">
                                    <div class="col-xl-12">
                                        @include('inc.messages')
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            
                                            <div class="col-xl-9">
                                                <h4 class="mt-0 header-title">Daftar Tiket</h4>
                                                <p class="text-muted">Berikut adalah daftar Tiket</p>
                                            </div>
                                            <div class="col-xl-3 text-left">
                                                <a href="{{route('admin.tiket.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Tiket</button>
                                                </a>
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
                                                                <input placeholder="Cari judul"  name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
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
                                                <button type="submit" style="border:none; padding:0;">
                                                    <span class="input-group-text"><small>Filter &nbsp;</small> <i class="mdi mdi-magnify noti-icon"></i></span>
                                                </button>
                                            </form>
                                            
                                        </div>
                                       
                                        <div style="overflow-x: auto;">
                                            <table id="mainTable" class="table table-striped mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Divisi</th>
                                                    <th>Judul</th>
                                                    <th>Status</th>
                                                    <th>Update terakhir</th>
                                                    <th colspan="3" class="text-center">Aksi</th>
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
                                                                <td><i class="mdi mdi-record text-success"></i> Buka</td>
                                                                @break
                                                            @case('Tutup')
                                                                <td><i class="mdi mdi-record text-danger"></i> Tutup</td>
                                                                @break
                                                            @case('Balasan operator')
                                                                <td><i class="mdi mdi-record text-primary"></i> Balasan Operator</td>
                                                                @break
                                                            @case('Balasan client')
                                                                <td><i class="mdi mdi-record text-info"></i> Balasan Client</td>
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                        @if (empty($tiket->balasan_terbaru))
                                                            <td>{{$tiket->created_at}}</td>
                                                        @else
                                                            <td>{{$tiket->balasan_terbaru}}</td>
                                                        @endif
                                                        
                                                        <td class="text-right"><a href="{{route('admin.tiket.show', $tiket->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat "><i class="mdi mdi-eye text-white"></i></a> 
                                                            
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{route('admin.tiket.edit', $tiket->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pen text-white"></i></a>
                                                            
                                                        </td>
                                                        <td class="text-left">
                                                            <form class="d-inline" action="{{route('admin.tiket.destroy', $tiket->id)}}" method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash text-white"></i></button>
                                                            </form>
                                                        </td>
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
