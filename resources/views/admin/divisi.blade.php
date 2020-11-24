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
                                    <div class="card-body">
                                        <div class="row mb-4">
                                           <div class="col-xl-12">
                                                @include('inc.messages')
                                           </div>
                                            <div class="col-xl-8">
                                                <h4 class="mt-0 header-title">Daftar Divisi</h4>
                                                <p class="text-muted">Berikut adalah daftar data Divisi</p>
                                            </div>
                                            <div class="col-xl-4 text-right">
                                                <a href="{{route('admin.divisi.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Divisi</button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Urutkan berdasarkan </label>
                                                    <select class="form-control">
                                                        <option>Select</option>
                                                        <option>Large select</option>
                                                        <option>Small select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label>Cari Divisi</label>
                                                    <div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control mt-1 p-3">
                                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span></div>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                        <table id="mainTable" class="table table-striped mb-0 mt-2">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Divisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            {{-- @for ($i = 0; $i < 5; $i++) --}}
                                            @foreach ($divisis as $divisi)
                                                <tr>
                                                    <td>{{$divisi->id}}</td>
                                                    <td>{{$divisi->divisi}}</td>
                                                    <td><a href="{{route('admin.divisi.edit', $divisi->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit "><i class="fas fa-pen text-white"></i></a> 
                                                        | <form class="d-inline" action="{{route('admin.divisi.destroy', $divisi->id)}}" method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash text-white"></i></button>
                                                        </form>
                                                    </td>
                                                        {{-- <a href="{{route('divisi.destroy', $divisi->id)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash text-white"></i></a></td> --}}
                                                </tr>
                                            @endforeach
                                            
                                            {{-- @endfor --}}
                                            
                                            
                                            </tbody>
                                        </table>
                                        <div class="row justify-content-center">
                                            <nav class="mt-5" aria-label="...">
                                                <ul class="pagination">
                                                    {{$divisis->links("pagination::bootstrap-4")}}
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
