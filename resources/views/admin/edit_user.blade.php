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
                                        <form class="" action="{{route('admin.user.update', $user->id)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-lg-12 pr-4">
                                                        <h4 class="mt-0 header-title">Edit User</h4>
                                                        <p class="text-muted">Berikut form yang perlu di isi.</p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label>Email</label>
                                                                <input value="{{$user->email}}" required aria-required="true" name="email" type="text" class="form-control"  placeholder="Type something"/>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Divisi</label>
                                                                <select name="divisi" class="form-control">
                                                                    @foreach ($divisis as $divisi)
                                                                        <option value="{{$divisi->id}}">{{$divisi->divisi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Password</label>
                                                                <input required aria-required="true" name="password" type="password" class="form-control"  placeholder="Type something"/>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Role</label>
                                                                <select name="role" class="form-control">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Nama </label>
                                                                <input value="{{$user->name}}" required aria-required="true" name="name" type="text" class="form-control"   placeholder="Type something"/>
                                                            </div>
                                                            
                                                            <div class="form-group col-lg-6">
                                                                <label>No. Telp</label>
                                                                <input value="{{$user->telp}}" name="telp" type="number" class="form-control"  placeholder="Type something"/>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-lg-4 mt-3 text-left">
                                                        <button type="submit" class="btn btn-primary btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="mdi mdi-pencil-outline mr-3"></i>Update User</button>
                                                        <button type="button" class="btn btn-danger btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="mdi mdi-close mr-3"></i>Batal</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                
                                            </div>
                                            {{ method_field('PUT') }}
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
