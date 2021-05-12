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

                    <div class="container-fluid ">
                        <div style="min-height: 5vh;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card p-4 m-b-30">
                                    <div class="card-body">
                                        <form class="" action="{{route('admin.tiket.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <h4 class="mt-0 header-title">Informasi tiket</h4>
                                            <p class="text-muted m-b-30">Anda dapat memilih ke divisi mana tiket ini akan dikirim, serta memilih tingkat prioritas tiket.</p>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Nama</label>
                                                    <input name="name" value="{{$user->name}}" readonly type="text" class="form-control" placeholder="Type something"/>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Email</label>
                                                    <input name="email" value="{{$user->email}}" readonly type="text" class="form-control" placeholder="Type something"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Divisi</label>
                                                    <select name="divisi" class="form-control">
                                                        @foreach ($divisis as $divisi)
                                                            <option value="{{$divisi->id}}">{{$divisi->divisi}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Prioritas</label>
                                                    <select name="prioritas" class="form-control">
                                                        <option>Rendah</option>
                                                        <option>Sedang</option>
                                                        <option>Tinggi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <h4 class="mt-0 header-title mt-5">Informasi pesan</h4>
                                            <p class="text-muted m-b-30">Diwajibkan untuk menulis judul pesan dan isi pesan. Opsional untuk mengupload file jika anda tidak mempunyai file untuk diupload.</p>

                                            <div class="form-group">
                                                <label>Judul pesan </label>
                                                <div>
                                                    <input name="judul" type="text" class="form-control" required placeholder="Type something"/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Pesan</label>
                                                <textarea class="summernote" name="ket"></textarea>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Upload file</label>
                                                <div class="m-b-30">
                                                    <div action="#" class="dropzone">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple="multiple">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label>Upload file</label>
                                                <input type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                                text/plain, application/pdf, application/rar,.zip,.rar,.7zip" name="files[]" multiple>
                                            </div>
                                            <div style="min-height:5vh;"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

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
