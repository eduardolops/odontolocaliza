<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Odontolocaliza | {{ $page_title or "Page Title" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/fav-icon/57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/fav-icon/60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/fav-icon/72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/fav-icon/76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/fav-icon/114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/fav-icon/120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/fav-icon/144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/fav-icon/152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav-icon/180x180.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav-icon/32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/fav-icon/96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/fav-icon/16x16.png') }}">

        <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset ("/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/subscription-pricing.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom/jquery.fileupload.css') }}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="skin-blue">
    <div class="wrapper">

        {{-- include header --}}
        @include('structures.header_adm')

        {{-- include sidebar --}}
        @yield('sidebar')

                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $page_title or "Page Title" }}
                    <small>{{ $page_description or null }}</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js") }}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" ) }}"></script>
    <script>
      $(function () {
        // // Replace the <textarea id="editor1"> with a CKEditor
        // // instance, using default configuration.
        // CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    {{-- <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script> --}}
    <script src="{{ asset("/assets/js/jquery.ui.widget.js") }}"></script>
    {{-- <script src="{{ asset("/assets/js/jquery.iframe-transport.js") }}"></script>
    <script src="{{ asset("/assets/js/jquery.fileupload.js") }}"></script>
    <script src="{{ asset("/assets/js/jquery.fileupload-process.js") }}"></script>
    <script src="{{ asset("/assets/js/jquery.fileupload-image.js") }}"></script>
    <script src="{{ asset("/assets/js/jquery.fileupload-audio.js") }}"></script>
    <script src="{{ asset("/assets/js/jquery.fileupload-video.js") }}"></script>
    <script src="{{ asset("/assets/js/jquery.fileupload-validate.js") }}"></script> --}}

    <script>
        document.getElementById("uploadBtn").onchange = function () {
            if( !this.value == '' ){
                document.getElementById("uploadFile").value = this.value;
            }else{
                document.getElementById("uploadFile").value = 'Selecionar Arquivo';
            }
        };

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-91809644-1', 'auto');
      ga('send', 'pageview');

    </script>
    <!-- myApp -->
    <script src="{{ asset("/assets/js/app.js") }}"></script>
    </body>
</html>