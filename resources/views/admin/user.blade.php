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
                                                <h4 class="mt-0 header-title">Daftar User</h4>
                                                <p class="text-muted">Berikut adalah daftar data User</p>
                                            </div>
                                            <div class="col-xl-3 text-left">
                                                <a href="{{route('admin.user.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah User</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-xl-12">
                                                <div class="d-inline-block mr-5  mb-5">
                                                    <div class="m-1 dropdown d-inline-block">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDivisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Role
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownDivisi">
                                                            <a class="dropdown-item" href="{{route('admin.user.index')}}">Semua</a>
                                                            <a class="dropdown-item" href="{{route('admin.user.role_filter', $role = 'operator')}}">Operator</a>
                                                            <a class="dropdown-item" href="{{route('admin.user.role_filter', $role = 'admin')}}">Admin</a>
                                                        </div>
                                                    </div>
                                                    <div class="m-1 dropdown d-inline-block">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDivisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Divisi
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownDivisi">
                                                        <a class="dropdown-item" href="{{route('admin.user.index')}}">Semua</a>
                                                            @foreach ($divisis as $divisi)
                                                            <a class="dropdown-item" href="{{route('admin.user.divisi_filter', $divisi->divisi)}}">{{$divisi->divisi}}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block">
                                                    <div class="d-inline-block mr-2">
                                                        <form id="form_search" action="{{route('admin.user.email_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input placeholder="Cari Email"  name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
                                                                    <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                        <span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span>
                                                                    </button>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="d-inline-block mr-2">
                                                        <form id="form_search" action="{{route('admin.user.name_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input placeholder="Cari Nama"  name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
                                                                    <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                        <span class="input-group-text"><i class="mdi mdi-magnify noti-icon"></i></span>
                                                                    </button>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="d-inline-block mr-2">
                                                        <form id="form_search" action="{{route('admin.user.telp_search')}}" method="GET">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input placeholder="Cari No Telp"  name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
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
                                        
                                        <div style="overflow-x: auto;">
                                            <table id="mainTable" class="table table-striped mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Nama</th>
                                                    <th>Divisi</th>
                                                    <th>Role</th>
                                                    <th>No Telp</th>
                                                    <th colspan="2" class="text-center">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
    
                                                    @foreach ($users as $user)    
                                                        <tr>
                                                            <td>{{$user->id}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->divisi}}</td>
                                                            <td>{{$user->role}}</td>
                                                            <td>{{$user->telp}}</td>
                                                            <td class="text-right">
                                                                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit "><i class="fas fa-pen text-white"></i></a> 
                                                            </td>
                                                            <td class="text-left">
                                                                <form class="d-inline" action="{{route('admin.user.destroy', $user->id)}}" method="POST">
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
                                                    {{$users->links("pagination::bootstrap-4")}}
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
