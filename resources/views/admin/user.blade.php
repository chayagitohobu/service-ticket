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
                                            <div class="col-xl-8">
                                                <h4 class="mt-0 header-title">Daftar User</h4>
                                                <p class="text-muted">Berikut adalah daftar data User</p>
                                            </div>
                                            <div class="col-xl-4 text-right">
                                                <a href="{{route('admin.user.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah User</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <form class="row" id="form_search" action="{{route('admin.user.name_search')}}" method="GET">
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cari berdasarkan</label>
                                                    <select name="kategori_search" id="search" class="form-control">
                                                        <option>Nama</option>
                                                        <option>Email</option>
                                                        <option>Divisi</option>
                                                        <option>Role</option>
                                                        <option>No Telp</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 d-inline">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label id="label_form_search">Cari Nama</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input  name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
                                                                <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                    <span class="input-group-text"><small> Search	&nbsp;</small> <i class="mdi mdi-magnify noti-icon"></i></span>
                                                                </button>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        
                                        <table id="mainTable" class="table table-striped mb-0 mt-2">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Nama</th>
                                                <th>Divisi</th>
                                                <th>Role</th>
                                                <th>No Telp</th>
                                                <th>Aksi</th>
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
                                                        <td><a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit "><i class="fas fa-pen text-white"></i></a> 
                                                            | 
                                                            <form class="d-inline" action="{{route('admin.user.destroy', $user->id)}}" method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash text-white"></i></button>
                                                            </form>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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

@section('script')
    
    <script>
        window.onload = function() {
            
            $("#search").change(function(){
                var input = $(this).val();
                
                switch(input) {
                case 'Email':
                    $('#form_search').attr('action', "{{route('admin.user.email_search')}}");
                    $('#search').val();
                    $('#label_form_search').text('Cari Email');
                    break;
                case 'Nama':
                    $('#form_search').attr('action', "{{route('admin.user.name_search')}}");
                    $('#label_form_search').text('Cari Nama');
                    break;
                case 'Divisi':
                    $('#form_search').attr('action', "{{route('admin.user.divisi_search')}}");
                    $('#label_form_search').text('Cari Divisi');
                    break;
                case 'Role':
                    $('#form_search').attr('action', "{{route('admin.user.role_search')}}");
                    $('#label_form_search').text('Cari Role');
                    break;
                case 'No Telp':
                    $('#form_search').attr('action', "{{route('admin.user.telp_search')}}");
                    $('#label_form_search').text('Cari No Telp');
                    break;
                default:
                    alert('input salah !!');
                    $('#form_search').attr('action', "{{route('admin.user.name_search')}}");
                    $('#label_form_search').text('Cari Nama');
                }
            });
            
        }
    </script>

@endsection