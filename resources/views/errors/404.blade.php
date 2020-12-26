<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Care') }} | Page Not Found</title>
    <link rel="icon" href="{{ asset('img/icon.png')}}" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  
   
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   
    
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    
    @yield('styles')
      
   
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <script
    src="https://kit.fontawesome.com/753fbd11bf.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/"><img class="navbar-brand" src="{{ asset('img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/services">{{ __('Services') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/about">{{ __('About') }}</a>
                          </li>
                                              
                         
                    </ul>
                </div>
            </div>
        </nav>

        <main>


            <div class="container Error404 py-4">
                <div class="row justify-content-center">
                    
                        <div class="row justify-content-center" style="margin-top:10%">
                            <img  class="mb-4" src="{{asset('img/404.png')}}" alt="">
                        </div>
                        
                       
                </div>
                   
                        
              
                        <h1 class="text-center raleway mb-4 text-secondary">PAGE NOT FOUND</h1>
                        <div class="row justify-content-center">
                            <button onclick="goBack()" class="btn btn-unique"><i class="fas fa-chevron-circle-left"></i> GO BACK</button>
                            <button onclick="window.location.href='/'" class="btn btn-mdb-color"><i class="fas fa-home"></i> HOME</button>
                        </div>
                  
            </div>
            


      </main>
<!-- Footer -->
<footer class="page-footer font-small mdb-color">

<!-- Footer Links -->
<div class="container">

<!-- Grid row-->
<div class="row text-center d-flex justify-content-center pt-5 mb-3">

<!-- Grid column -->
<div class="col-md-2 mb-3">
  <span class="text-uppercase font-weight-bold small">
    <a href="/services">Services</a>
  </span>
</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-md-2 mb-3">
  <span class="text-uppercase font-weight-bold small">
    <a href="/about">About</a>
  </span>
</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-md-2 mb-3">
  <span class="text-uppercase font-weight-bold small">
    <a href="#!">Contact</a>
  </span>
</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-md-2 mb-3">
  <span class="text-uppercase font-weight-bold small">
    <a href="#!">Privacy Policy</a>
  </span>
</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-md-2 mb-3">
  <span class="text-uppercase font-weight-bold small">
    <a href="#!">Terms of Service</a>
  </span>
</div>
<!-- Grid column -->

</div>
<!-- Grid row-->
<hr class="rgba-white-light" style="margin: 0 15%;">


<!-- Grid row-->
<hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

<!-- Grid row-->
<div class="row pb-3">

<!-- Grid column -->
<div class="col-md-12">

  <div class="mb-5 flex-center">

    <!-- Facebook -->
    <a class="fb-ic">
      <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
    </a>
    <!-- Twitter -->
    <a class="tw-ic">
      <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
    </a>
    <!-- Google +-->
    <a class="gplus-ic">
      <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
    </a>
    <!--Linkedin -->
    <a class="li-ic">
      <i class="fab fa-youtube fa-lg white-text mr-4"> </i>
    </a>
    <!--Instagram-->
    <a class="ins-ic">
      <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
    </a>
    <!--Pinterest-->
    <a class="pin-ic">
      <i class="fab fa-pinterest fa-lg white-text"> </i>
    </a>

  </div>

</div>
<!-- Grid column -->

</div>
<!-- Grid row-->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">
<div class="row justify-content-center">
<img class="footer-logo" src="{{asset('img/logo.png')}}" alt="">

</div>
© Developed & Maintained by :
<a target="_BLANK" href="/">© E-Care Inc</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
</div>
<script> 
    
    function goBack() {
       window.history.back();
         }
</script> 
</body>
</html>
