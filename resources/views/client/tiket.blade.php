@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('inc.client.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
        
                <!-- Top Bar Start -->
                @include('inc.client.navbar')
                <!-- Top Bar End -->
        
                <div class="page-content-wrapper ">

                    <div class="container-fluid">
                        
                        <!-- end page title -->
                        <div style="min-height: 5vh;"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30 p-4">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Tiket saya</h4>
                                        <p class="text-muted m-b-30">Pilih tiket yang ingin dilihat dengan mengklik baris pada tabel</p>
                                        <form id="form_search" action="{{route('client.tiket.judul_search')}}" method="GET">
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
                                                            @if ($_GET['kategori_search'] == 'Divisi')
                                                                {{'selected'}}
                                                            @endif
                                                        @endif
                                                        >Divisi</option>
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
                                            </div>
                                        </div>
                                        </form>
                                        
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
                                                        <td><a href="{{route('client.tiket.show', $tiket->id)}}" class="btn btn-primary">Lihat</a></td>
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
    function myFunction() {
        var selected = $('#kategori_search').val();
        switch(selected) {
            case 'Judul':
                    $('#form_search').attr('action', "{{route('client.tiket.judul_search')}}");
                    $('#label_form_search').text('Cari Judul');
                    break;
                case 'Divisi':
                    $('#form_search').attr('action', "{{route('client.tiket.divisi_search')}}");
                    $('#label_form_search').text('Cari Divisi');
                    break;
                case 'Status':
                    $('#form_search').attr('action', "{{route('client.tiket.status_search')}}");
                    $('#label_form_search').text('Cari Status');
                    break;
                case 'Update Terakhir':
                    $('#form_search').attr('action', "{{route('client.tiket.balasan_terbaru_search')}}");
                    $('#label_form_search').text('Cari Update Terakhir');
                    break;
                default:
                    alert('input salah !!');
                    $('#form_search').attr('action', "{{route('client.tiket.judul_search')}}");
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