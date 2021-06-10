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
                                        <form class="" action="{{route('admin.pertanyaan.update', $information->id)}}" method="POST">
                                            @csrf
                                            <h4 class="mt-0 header-title mt-5">Edit Pertanyaan</h4>
                                            <p class="text-muted m-b-30">Ubah pertanyaan yang telah dibuat sebelumnya dengan mengganti nilai form dibawah dan kemudian submit</p>

                                            <div class="form-group">
                                                <label>Kategori : </label>
                                                <br>
                                                @if ($information->category == 'faq')
                                                    <div class="d-inline-block mr-5 mt-3 mb-3">
                                                        <label>Umum</label>
                                                        <input type="radio" name="category" value="general" >
                                                    </div>
                                                    <div class="d-inline-block mr-5 mt-3 mb-3">
                                                        <label>FAQ : </label>
                                                        <input type="radio" name="category" value="faq" checked>
                                                    </div>
                                                @else
                                                    <div class="d-inline-block mr-5 mt-3 mb-3">
                                                        <label>Umum</label>
                                                        <input type="radio" name="category" value="general" checked>
                                                    </div>
                                                    <div class="d-inline-block mr-5 mt-3 mb-3">
                                                        <label>FAQ : </label>
                                                        <input type="radio" name="kategori" value="faq" >
                                                    </div>
                                                @endif
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Pertanyaan </label>
                                                <div>
                                                    <input value="{{$information->question}}" type="text" name="question" class="form-control" required>
                                                    {{-- <input name="pertanyaan" type="text" class="form-control" required placeholder="Type something"/> --}}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Jawaban</label>
                                                <textarea class="summernote" name="answer">
                                                    {!! $information->answer !!}
                                                </textarea>
                                            </div>
                                            <div style="min-height:5vh;"></div>
                                            {{ method_field('PUT') }}
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
