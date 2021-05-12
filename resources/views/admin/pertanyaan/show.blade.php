@extends('layouts.app')

@section('style')
    <style>
        @media screen {
            div.printFooter {
                display: none;
            }
            div.printHeader {
                display: none;
            }
        }

        @media print {
            body * {
            visibility: hidden;
            }
            #section-to-print, #section-to-print * {
            visibility: visible;
            }
            #section-to-print {
            position: static;
            left: 0;
            top: 50;
            }
            #section-to-print, #section-to-print #aksi {
            visibility: hidden;
            }
            div.printFooter {
                position: fixed;
                bottom: 0;
            }
            div.printHeader {
                position: fixed;
                top: 0;
            }
        }
    </style>
@endsection

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
                                    <div class="col-xl-12">
                                        @include('inc.messages')
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-xl-7 mb-3">
                                                <h4 class="mt-0 header-title">Preview Pertanyaan</h4>
                                                <p class="text-muted">Berikut adalah detail pertanyaan</p>
                                            </div>
                                            <div class="col-xl-5 text-left">
                                                <a class="d-inline-block mr-1" href="{{route('admin.pertanyaan.edit', $pertanyaan->id)}}">
                                                    <button type="button" class="btn btn-info btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-pen noti-icon mr-3"></i>Edit pertanyaan</button>
                                                </a>
                                                <div class="d-inline-block">
                                                    <form class="d-inline" action="{{route('admin.pertanyaan.destroy', $pertanyaan->id)}}" method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        {{-- <button id="aksi" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i id="aksi" class="fas fa-trash text-white"></i></button> --}}
                                                        <button type="submit" class="btn btn-danger btn-lg pr-4 pl-4 mt-2 waves-effect waves-light"><i class="fas fa-trash mr-3"></i>Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <div id="accordion">
                                            <h4 class="mt-0 header-title mt-5">Kategori Pertanyaan : {{$pertanyaan->kategori}}</h4>
                                            <div class="card shadow mt-5">
                                              <button class="btn text-dark btn-link collapsed pt-3 pb-3"  data-toggle="collapse" data-target="#collapse{{$pertanyaan->id}}" aria-expanded="false" aria-controls="collapse{{$pertanyaan->id}}">
                                              <div class="bg-white" id="heading{{$pertanyaan->id}}">
                                                <p class="mb-0 text-left">
                                                  <i class="fas fa-arrow-down mr-5"></i>
                                                  <b>
                                                    {{$pertanyaan->pertanyaan}}
                                                  </b>
                                                  </p>
                                                </div>
                                              </button>
                                              <div id="collapse{{$pertanyaan->id}}" class="collapse" aria-labelledby="heading{{$pertanyaan->id}}" data-parent="#accordion">
                                                <div class="card-body pb-5 " style="padding-left: 6em; padding-right: 6em;">
                                                  {!! $pertanyaan->jawaban !!}
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row justify-content-center">
                                            <nav class="mt-5" aria-label="...">
                                                <ul class="pagination">
                                                    {{$pertanyaans->links("pagination::bootstrap-4")}}
                                                </ul>
                                            </nav>
                                        </div> --}}
                                            
                                            
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
