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
                                        <form class="" action="{{route('admin.pertanyaan.store')}}" method="POST">
                                            @csrf
                                            <h4 class="mt-0 header-title mt-5">Informasi Pesan</h4>
                                            <p class="text-muted m-b-30">Diwajibkan untuk menulis judul pesan dan isi pesan. Opsional untuk mengupload file jika anda tidak mempunyai file untuk diupload.</p>
                                            <div class="form-group">
                                                <label>Kategori : </label>
                                                <br>
                                                <div class="d-inline-block mr-5 mt-3 mb-3">
                                                    <label>Umum</label>
                                                    <input type="radio" name="kategori" value="general" checked>
                                                </div>
                                                <div class="d-inline-block mr-5 mt-3 mb-3">
                                                    <label>FAQ : </label>
                                                    <input type="radio" name="kategori" value="faq" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Pertanyaan </label>
                                                <div>
                                                    <input type="text" name="pertanyaan" class="form-control" required>
                                                    {{-- <input name="pertanyaan" type="text" class="form-control" required placeholder="Type something"/> --}}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Jawaban</label>
                                                <textarea class="summernote" name="jawaban"></textarea>
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
