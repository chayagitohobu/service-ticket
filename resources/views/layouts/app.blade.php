<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Zinzer - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="images/favicon.ico">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

        <!-- Summernote css -->
        <link href="{{asset('summernote/summernote-bs4.css')}}" rel="stylesheet" />

        <!-- Dropzone css -->
        <link href="{{asset('dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">

        <!-- chartjs js -->
        <script src=" {{asset('chartjs/chart.min.js')}}"></script>
        <script src=" {{asset('chartjs/chartjs.init.js')}}"></script>

        @yield('style')
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        {{-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div> --}}
        
        @yield('content')

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

        <script src=" {{asset('plugins/tiny-editable/mindmup-editabletable.js')}} "></script>
        <script src=" {{asset('plugins/tiny-editable/numeric-input-example.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>

        <!--Summernote js-->
        <script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
        

        <!-- Dropzone js -->
        <script src="{{ asset('dropzone/dist/dropzone.js')}}"></script>

        

        <script>
            jQuery(document).ready(function(){
                $(function () {
                  $('[data-toggle="tooltip"]').tooltip()
                })
                $('.summernote').summernote({
                    height: 300,
                    toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ],
                });
            });
        </script>

        @yield('script')
    </body>
</html>