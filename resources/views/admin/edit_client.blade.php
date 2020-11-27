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
                                <div class="card m-b-30 p-4">
                                    <div class="card-body">
                                        <form class="" action="{{route('admin.client.update', $client->id)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 pr-4">
                                                    <h4 class="mt-0 header-title">Edit Client</h4>
                                                    <p class="text-muted">Berikut form yang perlu di isi.</p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label>Email</label>
                                                            <input value="{{$client->email}}" name="email" type="text" class="form-control" required placeholder="Type something"/>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Nama Perusahaan</label>
                                                            <input  value="{{$client->name_perusahaan}}" name="name_perusahaan" type="text" class="form-control" required placeholder="Type something"/>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Password</label>
                                                            <input name="password" type="password" class="form-control" required placeholder="Type something"/>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Nama </label>
                                                            <input value="{{$client->name}}" name="name" type="text" class="form-control"  required placeholder="Type something"/>
                                                        </div>
                                                        
                                                        <div class="form-group col-lg-6">
                                                            <label>No. Telp</label>
                                                            <input value="{{$client->telp}}" name="telp" type="text" class="form-control" required placeholder="Type something"/>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                {{ method_field('PUT') }}
                                                <div class="col-lg-4 mt-3 text-left">
                                                    <button type="submit" class="btn btn-primary btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="mdi mdi-pencil-outline mr-3"></i>Edit Client</button>
                                                    <button type="button" class="btn btn-danger btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="mdi mdi-close mr-3"></i>Batal</button>
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
