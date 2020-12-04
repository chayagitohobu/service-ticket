@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('inc.operator.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
        
                <!-- Top Bar Start -->
                @include('inc.operator.navbar')
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
                                        <h4 class="mt-0 header-title">Daftar Tiket divisi {{$divisi->divisi}} </h4>
                                        <p class="text-muted m-b-30">Berikut adalah daftar tiket untuk divisi marketing</p>
                                        <form id="form_search" action="{{route('operator.tiket.judul_search')}}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="row mt-5">
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cari berdasarkan</label>
                                                    <select name="kategori_search" id="kategori_search" class="form-control">
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Judul')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Judul</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Nama Client')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Nama Client</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Nama User')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Nama User</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Status')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Status</option>
                                                        <option
                                                        @if (!empty($_GET['kategori_search']))
                                                            @if ($_GET['kategori_search'] == 'Update Terakhir')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Update Terakhir</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label id="label_form_search">Cari</label>
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
                                        
                                        <div style="overflow-x:auto;">
                                            <table id="mainTable" class="table table-striped mb-0 mt-2">
                                                <thead>
                                                <tr>
                                                    <th>Nama Client</th>
                                                    <th>Judul</th>
                                                    <th>Status</th>
                                                    {{-- <th>Telah di balas</th> --}}
                                                    <th>Update terakhir</th>
                                                    <th colspan="2" class="text-center">Aksi</th>
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
                                                            {{-- <td><i class="mdi mdi-record text-danger"></i> Belum </td> --}}
                                                            @if (empty($tiket->balasan_terbaru))
                                                                <td>{{$tiket->created_at}}</td>
                                                            @else
                                                                <td>{{$tiket->balasan_terbaru}}</td>
                                                            @endif
                                                            <td class="text-right">
                                                                <a href="{{route('operator.tiket.show', $tiket->id)}}" class="mb-1 col-xs-6 btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Balas Tiket "><i class="mdi mdi-file text-white"></i></a>
                                                            </td>
                                                            <td class="text-left">
                                                                @switch($tiket->role_id)
                                                                @case(1)
                                                                    <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Profile Admin"><i class="mb-1 col-xs-6 mdi mdi-lock text-white"></i></a>
                                                                    @break
                                                                @case(2)
                                                                    <a href="{{route('operator.show', $tiket->user_id)}}" class="mb-1 col-xs-6 btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Profile Operator"><i class="mdi mdi-account-box text-white"></i></a>
                                                                    @break
                                                                @default
                                                                <a href="{{route('operator.client.show', $tiket->client_id)}}" class="mb-1 col-xs-6 btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Profile Client"><i class="mdi mdi-account-box text-white"></i></a>
                                                            @endswitch
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

@section('script')
    <script>
        function myFunction() {
            var selected = $('#kategori_search').val();
            switch(selected) {
                case 'Nama Client':
                    $('#form_search').attr('action', "{{route('operator.tiket.client_search')}}");
                    $('#label_form_search').text('Cari Nama Client');
                    break;

                case 'Nama User':
                    $('#form_search').attr('action', "{{route('operator.tiket.user_search')}}");
                    $('#label_form_search').text('Cari Nama User');
                    break;
                case 'Judul':
                    $('#form_search').attr('action', "{{route('operator.tiket.judul_search')}}");
                    $('#label_form_search').text('Cari Judul');
                    break;
                case 'Status':
                    $('#form_search').attr('action', "{{route('operator.tiket.status_search')}}");
                    $('#label_form_search').text('Cari Status');
                    break;
                case 'Update Terakhir':
                    $('#form_search').attr('action', "{{route('operator.tiket.balasan_terbaru_search')}}");
                    $('#label_form_search').text('Cari Update Terakhir');
                    break;
                default:
                    alert('input salah !!');
                    $('#form_search').attr('action', "{{route('operator.tiket.judul_search')}}");
                    $('#label_form_search').text('Cari Judul');
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