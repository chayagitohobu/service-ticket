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
                                                <h4 class="mt-0 header-title">Daftar Tiket</h4>
                                                <p class="text-muted">Berikut adalah daftar Tiket</p>
                                            </div>
                                            <div class="col-xl-4 text-right">
                                                <a href="{{route('admin.tiket.create')}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-plus noti-icon mr-3"></i>Tambah Tiket</button>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-5">
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cari berdasarkan</label>
                                                    <select id="search" class="form-control">
                                                        <option>Judul</option>
                                                        <option>Divisi</option>
                                                        <option>Status</option>
                                                        <option>Update Terakhir</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <form id="form_search" action="{{route('admin.tiket.judul_search')}}" method="GET">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label id="label_form_search">Cari Judul</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input name="search" value="{{ old('search') }}" type="text" class="form-control mt-1 p-3">
                                                                <button type="submit" class="input-group-append bg-custom b-0" style="border:none; padding:0;">
                                                                    <span class="input-group-text"><small> Search	&nbsp;</small> <i class="mdi mdi-magnify noti-icon"></i></span>
                                                                </button>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
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
                                                            <td><i class="mdi mdi-record text-success"></i> Buka</td>
                                                            @break
                                                        @case('Tutup')
                                                            <td><i class="mdi mdi-record text-danger"></i> Tutup</td>
                                                            @break
                                                        @case('Balasan operator')
                                                            <td><i class="mdi mdi-record text-info"></i> Balasan Opertor</td>
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
                                                    
                                                    <td><a href="{{route('admin.tiket.show', $tiket->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat "><i class="mdi mdi-eye text-white"></i></a> 
                                                        | <a href="{{route('admin.tiket.edit', $tiket->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pen text-white"></i></a>
                                                        | 
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

@section('script')
    
    <script>
        window.onload = function() {
            
            $("#search").change(function(){
                var input = $(this).val();
                
                switch(input) {
                case 'Judul':
                    $('#form_search').attr('action', "{{route('admin.tiket.judul_search')}}");
                    $('#label_form_search').text('Cari Judul');
                    break;
                case 'Divisi':
                    $('#form_search').attr('action', "{{route('admin.tiket.divisi_search')}}");
                    $('#label_form_search').text('Cari Divisi');
                    break;
                case 'Status':
                    $('#form_search').attr('action', "{{route('admin.tiket.status_search')}}");
                    $('#label_form_search').text('Cari Status');
                    break;
                case 'Update Terakhir':
                    $('#form_search').attr('action', "{{route('admin.tiket.balasan_terbaru_search')}}");
                    $('#label_form_search').text('Cari Update Terakhir');
                    break;
                default:
                    alert('input salah !!');
                    $('#form_search').attr('action', "{{route('admin.tiket.judul_search')}}");
                    $('#label_form_search').text('Cari Judul');
                }
            });
            
        }
    </script>

@endsection
