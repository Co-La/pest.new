<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Pesticid-control</title>
        <meta name="msapplication-TileColor" content="#5bc0de" />
        <meta name="msapplication-TileImage" content="{{ env('THEM') }}/admin/assets/img/metis-tile.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/admin/assets/lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
         <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="{{asset(env('THEM')) }}/admin/assets/css/main.css">

        <!-- metisMenu stylesheet -->
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/admin/assets/lib/metismenu/metisMenu.css">

        <!-- onoffcanvas stylesheet -->
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/admin/assets/lib/onoffcanvas/onoffcanvas.css">

        <!-- animate.css stylesheet -->
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/admin/assets/lib/animate.css/animate.css">
        
        <!-- Jquery -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/lib/jquery/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--For Development Only. Not required -->
       
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/admin/assets/css/style-switcher.css">
        <link rel="stylesheet/less" type="text/css" href="{{ asset(env('THEM')) }}/admin/assets/less/theme.less">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

    </head>

    <body class="  ">
        <div class="bg-dark dk" id="wrap">
            <div id="top">
                <!-- .navbar -->
                
                
                @yield('topnav')
                
                <!-- /.navbar -->
                @yield('bartitle')
                <!-- /.head -->
            </div>
            <!-- /#top -->
                @yield('menu')
            <!-- /#top -->
            <div id="content">
                <div class="outer">
                 @yield('content')
                    <!-- /.inner -->
                </div>
                <!-- /.outer -->
            </div>
            <!-- /#content -->
        </div>
        <!-- /#wrap -->
        @yield('footer')
        <!-- /#footer -->
        <!-- #helpModal -->
        @yield('modal')
        <!-- /.modal -->
        <!-- /#helpModal -->
        <!--jQuery -->
        
        <script type="text/javascript">
              $( function() {
                 $( "#datepicker" ).datepicker();
                
        </script>
        
        
        


        <!--Bootstrap -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/lib/bootstrap/js/bootstrap.js"></script>
       
        <!-- Font Awesome -->        
        <script src="https://use.fontawesome.com/c710c8f031.js"></script>
        
        <!-- MetisMenu -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/lib/metismenu/metisMenu.js"></script>
        <!-- onoffcanvas -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/lib/onoffcanvas/onoffcanvas.js"></script>
        <!-- Screenfull -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/lib/screenfull/screenfull.js"></script>


        <!-- Metis core scripts -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/js/core.js"></script>
        <!-- Metis demo scripts -->
        <script src="{{ asset(env('THEM')) }}/admin/assets/js/app.js"></script>
        
        <!--Co&&La scripts-->
        <script src="{{ asset(env('THEM')) }}/admin/assets/js/myjs.js"></script>


        <script src="{{ asset(env('THEM')) }}/admin/assets/js/style-switcher.js"></script>
    </body>
</html>

