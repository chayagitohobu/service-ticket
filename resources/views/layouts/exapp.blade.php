<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Tiket Pelayanan</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <link rel="shortcut icon" href=" {{asset('assets/images/favicon.ico')}}">
        
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        {{-- Font Awesome End --}}

        {{-- Font --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        {{-- Font end --}}
        <!-- Summernote css -->
        <link href="{{asset('summernote/summernote-bs4.css')}}" rel="stylesheet" />

        <!-- Dropzone css -->
        <link href="{{asset('dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
        
        <!-- chartjs js -->
        <script src=" {{asset('chartjs/chart.min.js')}}"></script>
        <script src=" {{asset('chartjs/chartjs.init.js')}}"></script>

        @yield('style')
        <style>
            .border-left-secondary{
                border-left: solid 2px #292b2c;
            }

            #font_family{
                font-family: 'Poppins';
                font-size: .8em;
            }
            #bg-blue{
                background:#0c5df4;
            }
            #bg-orange{
                background:#FC8404;
                border: none;
            }
            #bg-white{
                background:#fff;
            }

            #bg-blue-grad{
                background:#0c5df4;
            }

            #card-image{
                min-height: 30vh;
            }
            
        </style>
    </head>
    
    {{-- <body class="fixed-left bg-white"> --}}
    <body id="font_family">
        <div class="row text-center" id="bg-blue" >
            <a href="index.html" class="logo logo-admin m-auto pt-3"><img src="{{asset('assets/images/logo_dark.png')}}" height="40" alt="logo"></a>
        </div>
        <!-- Loader -->
        
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
                    // toolbar: [
                    // ['style', ['style']],
                    // ['font', ['bold', 'underline', 'clear']],
                    // ['fontname', ['fontname']],
                    // ['color', ['color']],
                    // ['para', ['ul', 'ol', 'paragraph']],
                    // ],
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['']]
                    ],
                });
            });
        </script>

        @yield('script')
    </body>
</html>