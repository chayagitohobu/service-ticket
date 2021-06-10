@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('inc.client.balasan_sidebar')
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
                        <div style="min-height: 5vh;"></div>

                        <div class="col-xl-12">
                            <button class="btn btn-dark " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-reply"></i> Balas Pesan
                            </button>
                              <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <form action="{{route('client.balasan.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label>Pesan</label>
                                            <textarea name="reply" class="summernote"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload file</label>
                                            <input accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                            text/plain, application/pdf, application/rar,.zip,.rar,.7zip" type="file" name="files[]" multiple>
                                        </div>
                                        <input type="hidden" name="message_id" value="{{$message->id}}">

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
                        </div>

                        <div class="row p-3">
                            <div class="col-lg-12">
                                @foreach ($replies as $reply)
                                    <div class="card m-b-30">
                                        @switch($reply->role_id)
                                            @case(1)
                                            <div class="card-header bg-info text-white mb-3">
                                                <div class="row">
                                                    <div class="col-xl-9">
                                                        <i class="mdi mdi-account-outline"></i> 
                                                        Admin
                                                        | {{$reply->user_name}} {{$reply->client_name}}
                                                    </div>    
                                                    <div class="col-xl-3">
                                                        <i class="mdi mdi-calendar-clock"></i> {{$reply->created_at}}
                                                    </div>
                                                </div>
                                            </div>
                                                @break
                                            @case(2)
                                            <div class="card-header bg-primary text-white mb-3">
                                                <div class="row">
                                                    <div class="col-xl-9">
                                                        <i class="mdi mdi-account-outline"></i> 
                                                        Operator
                                                        | {{$reply->user_name}} {{$reply->client_name}}
                                                    </div>    
                                                    <div class="col-xl-3">
                                                        <i class="mdi mdi-calendar-clock"></i> {{$reply->created_at}}
                                                    </div>
                                                </div>
                                            </div>
                                                @break
                                            @default
                                            <div class="card-header bg-secondary text-white mb-3">
                                                <div class="row">
                                                    <div class="col-xl-9">
                                                        <i class="mdi mdi-account-outline"></i> 
                                                        Client
                                                        | {{$reply->user_name}} {{$reply->client_name}}
                                                    </div>    
                                                    <div class="col-xl-3">
                                                        <i class="mdi mdi-calendar-clock"></i> {{$reply->created_at}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endswitch
                                        <div class="card-body">
                                            <p class="card-text">
                                                {!! $reply->reply !!}
                                            </p>
                                            <div class="col-md-12 p-0 text-left">
                                                <hr>
                                                @switch($reply->role_id)
                                                    @case(1)
                                                    <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#balasan_file_{{$reply->id}}" aria-expanded="false" aria-controls="balasan_file">
                                                        File pendukung <i class="mdi mdi-arrow-down"></i>
                                                    </button>
                                                        @break
                                                    @case(2)
                                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#balasan_file_{{$reply->id}}" aria-expanded="false" aria-controls="balasan_file">
                                                        File pendukung <i class="mdi mdi-arrow-down"></i>
                                                    </button>
                                                        @break
                                                    @default
                                                    <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#balasan_file_{{$reply->id}}" aria-expanded="false" aria-controls="balasan_file">
                                                        File pendukung <i class="mdi mdi-arrow-down"></i>
                                                    </button>
                                                @endswitch
                                                <div class="collapse bg-light p-3" id="balasan_file_{{$reply->id}}">
                                                    @if ($reply_file_array != null)
                                                        @foreach ($reply_file_array[$loop->index] as $reply_file)
                                                            <div>
                                                                @if ($reply_file != '')
                                                                <form action="{{route('client.balasan.file_download')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="balasan_file" value="{{$reply_file}}">
                                                                    <button type="submit" class="btn btn-info btn-sm mt-1" data-toggle="tooltip" data-placement="top" title="Download File"> 
                                                                        <i class="mdi mdi-arrow-down"></i> {{$reply_file}}
                                                                    </button>
                                                                    <br>
                                                                </form> 
                                                                @else
                                                                Tidak ada file 
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endforeach
                                
                                <div class="card m-b-30">
                                    @switch($message->role_id)
                                        @case(1)
                                        <div class="card-header bg-info text-white mb-3">
                                            <div class="row">
                                                <div class="col-xl-9">
                                                    <i class="mdi mdi-account-outline"></i> 
                                                    Admin
                                                    | {{$message->client_name}} {{$message->user_name}}
                                                </div>    
                                                <div class="col-xl-3">
                                                    <i class="mdi mdi-calendar-clock"></i> {{$message->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                            @break
                                        @case(2)
                                        <div class="card-header bg-primary text-white mb-3">
                                            <div class="row">
                                                <div class="col-xl-9">
                                                    <i class="mdi mdi-account-outline"></i> 
                                                    Operator
                                                    | {{$message->client_name}} {{$message->user_name}}
                                                </div>    
                                                <div class="col-xl-3">
                                                    <i class="mdi mdi-calendar-clock"></i> {{$message->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                            @break
                                        @default
                                        <div class="card-header bg-secondary text-white mb-3">
                                            <div class="row">
                                                <div class="col-xl-9">
                                                    <i class="mdi mdi-account-outline"></i> 
                                                    Client
                                                    | {{$message->client_name}} {{$message->user_name}}
                                                </div>    
                                                <div class="col-xl-3">
                                                    <i class="mdi mdi-calendar-clock"></i> {{$message->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                    @endswitch
                                    <div class="card-body">
                                        <p class="card-text">
                                            {!! $message->detail !!}
                                        </p>
                                        <div class="col-md-12 p-0 text-left">
                                            <hr>
                                            @switch($message->role_id)
                                                @case(1)
                                                <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#tiket_file" aria-expanded="false" aria-controls="balasan_file">
                                                    File pendukung <i class="mdi mdi-arrow-down"></i>
                                                </button>
                                                    @break
                                                @case(2)
                                                <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#tiket_file" aria-expanded="false" aria-controls="balasan_file">
                                                    File pendukung <i class="mdi mdi-arrow-down"></i>
                                                </button>
                                                    @break
                                                @default
                                                <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#tiket_file" aria-expanded="false" aria-controls="balasan_file">
                                                    File pendukung <i class="mdi mdi-arrow-down"></i>
                                                </button>
                                            @endswitch
                                            <div class="collapse bg-light p-3" id="tiket_file">
                                                @if ($message_files != null)
                                                    @foreach ($message_files as $message_file)
                                                        <form action="{{route('client.tiket.file_download')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="file" value="{{$message_file}}">
                                                            <button type="submit" class="btn btn-info btn-sm mt-1" data-toggle="tooltip" data-placement="top" title="Download File"> 
                                                                <i class="mdi mdi-arrow-down"></i> {{$message_file}}
                                                            </button>
                                                            <br>
                                                        </form>
                                                    @endforeach
                                                @else
                                                    <div>Tidak ada file</div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <br>
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
