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
                                    <div class="col-xl-12">
                                        @include('inc.messages')
                                    </div>
                                    <div class="card-body">
                                        
                                        <form class="" action="#">
                                            <div class="row">
                                                <div class="col-lg-12 pl-4 pr-4">
                                                    <h4 class="mt-0 header-title">Profile</h4>
                                                    <p class="text-muted">Berikut adalah informasi pribadi anda.</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group col-lg-12">
                                                        <label>Nama</label>
                                                        <input value=" {{$user->name}} " type="text" class="form-control" readonly aria-readonly="true" required placeholder="Type something"/>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Email</label>
                                                        <input value=" {{$user->email}} " type="text" class="form-control" readonly aria-readonly="true" required placeholder="Type something"/>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Divisi </label>
                                                        <input value=" {{$user->division}} " type="text" class="form-control"  readonly aria-readonly="true" required placeholder="Type something"/>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>No. Telp</label>
                                                        <input value=" {{$user->phone}} " type="text" class="form-control" readonly aria-readonly="true" required placeholder="Type something"/>
                                                    </div>
                                                    <br>
                                                    <div class="form-group col-lg-12 text-center">
                                                        <a class="btn btn-primary waves-effect waves-light pl-5 pr-5" href="{{route('admin.user.edit', Auth::guard('user')->user()->id)}}"> 
                                                            <i class="mdi mdi-pencil"></i>
                                                            Edit
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                
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
