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
                                        <div class="row mb-4">
                                            <div class="col-xl-8 mb-3">
                                                <h4 class="mt-0 header-title">Daftar Client</h4>
                                                <p class="text-muted">Berikut adalah daftar data client</p>
                                            </div>
                                            <div class="col-xl-4 text-left">
                                                <a class="d-inline-block mr-1" href="{{route('admin.client.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Client</button>
                                                </a>
                                                <div class="d-inline-block">
                                                    <button onclick="window.print()" type="button" class="btn btn-success btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-print mr-3"></i>Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-3">
                                                        <form id="form_search" action="{{route('admin.client.email_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    @if ( !empty($_GET['email_search']))
                                                                        <input placeholder="Cari Email"  name="email_search" value="{{$_GET['email_search']}}" type="text" class="form-control mt-1 p-3">
                                                                    @else
                                                                        <input placeholder="Cari Email"  name="email_search" value="" type="text" class="form-control mt-1 p-3">
                                                                    @endif
                                                                    <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                        <span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span>
                                                                    </button>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <form id="form_search" action="{{route('admin.client.name_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    @if ( !empty($_GET['name_search']))
                                                                    <input placeholder="Cari Nama"  name="name_search" value="{{$_GET['name_search']}}" type="text" class="form-control mt-1 p-3">
                                                                    @else
                                                                    <input placeholder="Cari Nama"  name="name_search" value="" type="text" class="form-control mt-1 p-3">
                                                                    @endif
                                                                    
                                                                    <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                        <span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span>
                                                                    </button>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <form id="form_search" action="{{route('admin.client.perusahaan_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    @if ( !empty($_GET['perusahaan_search']))
                                                                    <input placeholder="Cari Perusahaan"  name="perusahaan_search" value="{{$_GET['perusahaan_search']}}" type="text" class="form-control mt-1 p-3">
                                                                    
                                                                    @else
                                                                    <input placeholder="Cari Perusahaan"  name="perusahaan_search" value="" type="text" class="form-control mt-1 p-3">
                                                                        
                                                                    @endif
                                                                    <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                        <span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span>
                                                                    </button>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <form id="form_search" action="{{route('admin.client.telp_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    @if ( !empty($_GET['telp_search']))
                                                                    <input placeholder="Cari No Telp"  name="telp_search" value="{{$_GET['telp_search']}}" type="text" class="form-control mt-1 p-3">
                                                                    
                                                                    @else
                                                                    <input placeholder="Cari No Telp"  name="telp_search" value="" type="text" class="form-control mt-1 p-3">
                                                                        
                                                                    @endif
                                                                    <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                        <span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span>
                                                                    </button>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="section-to-print" style="overflow-x: auto;">
                                            <div class="printHeader" >
                                                <div>
                                                    <div style="min-height: 5vh"></div>
                                                    <img src=" {{asset('assets/images/logo_dark.png')}}" height="30" alt="logo">
                                                </div>
                                                <div>
                                                    <div style="min-height: 3vh"></div>
                                                    <h1>Laporan Client</h1>
                                                    <p> URL : {{Request::fullUrl()}}</p>
                                                </div>
                                                <hr class="container">
                                                <div>
                                                    <br>
                                                    <p>Tanggal : {{ date('Y-m-d H:i:s') }}</p>
                                                    @if (!empty($_GET['search']))
                                                        @switch(Request::segment(3))
                                                            @case('name_search')
                                                            <p>Nama Search : {{$_GET['search']}}</p>
                                                                @break
                                                            @case('email_search')
                                                            <p>Email Search : {{$_GET['search']}}</p>
                                                                @break
                                                            @case('perusahaan_search')
                                                            <p>Perusahaan Search : {{$_GET['search']}}</p>
                                                                @break
                                                            @case('telp_search')
                                                            <p>Telp Search : {{$_GET['search']}}</p>
                                                                @break
                                                            @default
                                                            <p>Search : {{$_GET['search']}}</p>
                                                        @endswitch
                                                    @endif
                                                    <p>Halaman : {{$clients->currentPage()}}</p>
                                                </div>
                                                
                                            </div>
                                            <table id="mainTable" class="table table-striped table-bordered mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Nama</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>No Telp</th>
                                                    <th>Tanggal Di Buat</th>
                                                    <th id="aksi"  colspan="2" class="text-center">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
    
                                                @foreach ($clients as $client)
                                                <tr>
                                                    <td>{{$client->id}}</td>
                                                    <td>{{$client->email}}</td>
                                                    <td>{{$client->name}}</td>
                                                    <td>{{$client->name_perusahaan}}</td>
                                                    <td>{{$client->telp}}</td>
                                                    <td>{{$client->created_at}}</td>
                                                    <td id="aksi" class="text-right">
                                                        <a id="aksi" href="{{route('admin.client.edit', $client->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit "><i id="aksi" class="fas fa-pen text-white"></i></a>
                                                    </td>
                                                    <td id="aksi" class="text-left">
                                                        <form class="d-inline" action="{{route('admin.client.destroy', $client->id)}}" method="POST">
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
                                                    {{$clients->links("pagination::bootstrap-4")}}
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
