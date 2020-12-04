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
                                            <div class="col-xl-9 mb-3">
                                                <h4 class="mt-0 header-title">Daftar Client</h4>
                                                <p class="text-muted">Berikut adalah daftar data client</p>
                                            </div>
                                            <div class="col-xl-3 text-left">
                                                <a href="{{route('admin.client.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Client</button>
                                                </a>
                                            </div>
                                        </div>
                                        <form id="form_search" action="{{route('admin.client.name_search')}}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cari berdasarkan</label>
                                                    <select name="kategori_search" id="kategori_search" class="form-control">
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Nama')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Nama</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Email')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Email</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Nama Perusahaan')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Nama Perusahaan</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'No Telp')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >No Telp</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label id="label_form_search">Cari </label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
                                                                <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                    <span class="input-group-text"><small> Search	&nbsp;</small> <i class="mdi mdi-magnify noti-icon"></i></span>
                                                                </button>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        </form>
                                        <div style="overflow-x: auto;">
                                            <table id="mainTable" class="table table-striped mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Nama</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>No Telp</th>
                                                    <th colspan="2" class="text-center">Aksi</th>
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
                                                    <td class="text-right">
                                                        <a href="{{route('admin.client.edit', $client->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit "><i class="fas fa-pen text-white"></i></a>
                                                    </td>
                                                    <td class="text-left">
                                                        <form class="d-inline" action="{{route('admin.client.destroy', $client->id)}}" method="POST">
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

@section('script')
    <script>
        function myFunction() {
            var selected = $('#kategori_search').val();
            switch(selected) {
                case 'Email':
                    $('#form_search').attr('action', "{{route('admin.client.email_search')}}");
                    $('#label_form_search').text('Cari Email');
                    break;
                case 'Nama':
                    $('#form_search').attr('action', "{{route('admin.client.name_search')}}");
                    $('#label_form_search').text('Cari Nama');
                    break;
                case 'Nama Perusahaan':
                    $('#form_search').attr('action', "{{route('admin.client.name_perusahaan_search')}}");
                    $('#label_form_search').text('Cari Nama Perusahaan');
                    break;
                case 'No Telp':
                    $('#form_search').attr('action', "{{route('admin.client.telp_search')}}");
                    $('#label_form_search').text('Cari No Telp');
                    break;
                default:
                    alert('input salah !!');
                    $('#form_search').attr('action', "{{route('admin.client.name_search')}}");
                    $('#label_form_search').text('Cari Nama');
                }
        }

        window.onload = function() {
            myFunction();

            $("#kategori_search").change(function(){
                myFunction(); 
            });
        }
    </script>    

@endsection