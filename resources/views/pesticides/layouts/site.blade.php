<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/css/bootstrap.min.css">    
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/css/style.css">
        <link rel="stylesheet" type="text/css" href="{{ asset(env('THEM')) }}/css/jquery.bxslider.min.css" />    
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/css/style_common.css">
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/css/style5.css">
        <link rel="stylesheet" href="{{ asset(env('THEM')) }}/css/simplelightbox.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Arizonia" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
        
        
        <title>Get product</title>

    </head>
    <body>
        <div class="container search-item">
            <!-- navigation-->
            <!-- bag section-->
            @yield('search')  
            
            <!-- menu section-->
            @yield('navigation')  
            <!--/endnavigation-->
            
            <!-- slider-->            
            @yield('slider')
            
            @if(session('status') !== null)
            <div class="alert alert-success" id="alert-hidden">
                <p style="margin: 0; font-size: 15px"> {{ session('status') }} </p>                
            </div>
            @endif

            <!-- content section-->
            <div class="content">
                <!--Title page-->
            @yield('bar_title')
            
            <!--section content-->
             @yield('content')    
                
            <!-- BigNews -->

            @yield('firstnews')
               
            <!-- News list section -->
            @yield('listnews') 
            </div>

            <!-- footer-->
            @yield('footer')

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
        <script src="{{ asset(env('THEM')) }}/js/jquery-3.2.1.min.js"></script>    
        <script src="{{ asset(env('THEM')) }}/js/bootstrap.min.js" ></script>
        <script src="{{ asset(env('THEM')) }}/js/jquery.bxslider.min.js" ></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset(env('THEM')) }}/js/search.company.js" ></script>
        <script src="{{ asset(env('THEM')) }}/js/myscript.js" ></script>
        <script src="{{ asset(env('THEM')) }}/js/simple-lightbox.js" ></script>

        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider();

                 var gallery = $('#image-schemes .gallery a').simpleLightbox();

                      gallery.next();
            });

        </script>
        
        <script>
            $(function() {
              $( "#datepicker1" ).datepicker();
              $( "#datepicker2" ).datepicker();
            } );
    </script> 


    </body>
</html>