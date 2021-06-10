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
                                    <div class="card-body">
                                        <div class="row mb-4">
                                           <div class="col-xl-12">
                                                @include('inc.messages')
                                           </div>
                                            <div class="col-xl-4 mb-3">
                                                <h4 class="mt-0 header-title">Daftar Divisi</h4>
                                                <p class="text-muted">Berikut adalah daftar data Divisi</p>
                                            </div>

                                            <div class="col-xl-8 text-right">
                                                <a class="d-inline-block mr-2" href="{{route('admin.divisi.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Divisi</button>
                                                </a>
                                                <div class="d-inline-block">
                                                    <button onclick="window.print()" type="button" class="btn btn-success btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-print mr-3"></i>Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="section-to-print" style="overflow-x: auto">
                                            <div class="printHeader" >
                                                <div>
                                                    <div style="min-height: 5vh"></div>
                                                    <img src=" {{asset('assets/images/logo_dark.png')}}" height="30" alt="logo">
                                                </div>
                                                <div>
                                                    <div style="min-height: 3vh"></div>
                                                    <h1>Laporan Divisi</h1>
                                                    <p> URL : {{Request::fullUrl()}}</p>
                                                </div>
                                                <hr class="container">
                                                <div>
                                                    <br>
                                                    <p>Tanggal : {{ date('Y-m-d H:i:s') }}</p>
                                                    <p>Halaman : {{$divisions->currentPage()}}</p>
                                                    
                                                </div>
                                            </div>
                                            <div style="min-height: 5vh"></div>
                                            <table id="mainTable" class="table table-striped table-bordered mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Divisi</th>
                                                    <th id="aksi" colspan="2" class="text-center">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach ($divisions as $division)
                                                    <tr>
                                                        <td>{{$division->id}}</td>
                                                        <td>{{$division->division}}</td>
                                                        <td id="aksi" class="text-right">
                                                            <a id="aksi" href="{{route('admin.divisi.edit', $division->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit "><i id="aksi" class="fas fa-pen text-white"></i></a> 
                                                        </td>
                                                        <td id="aksi" class="text-left">
                                                            <form class="d-inline" action="{{route('admin.divisi.destroy', $division->id)}}" method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button id="aksi" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i id="aksi" class="fas fa-trash text-white"></i></button>
                                                            </form>
                                                        </td>
                                                            {{-- <a href="{{route('divisi.destroy', $division->id)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash text-white"></i></a></td> --}}
                                                    </tr>
                                                @endforeach
                                                
                                                {{-- @endfor --}}
                                                
                                                
                                                </tbody>
                                            </table>
                                            <div class="printFooter">{{ date('Y-m-d H:i:s') }}</div>
                                        </div>
                                        
                                        <div class="row justify-content-center">
                                            <nav class="mt-5" aria-label="...">
                                                <ul class="pagination">
                                                    {{$divisions->links("pagination::bootstrap-4")}}
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
