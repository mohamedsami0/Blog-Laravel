<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/style.css">
    <!--font Awesome-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/posts">BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/posts">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
         
            @if(Auth::check())
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(Auth::check())
          @if(Auth::user()->hasRole('admin'))
          <a class="dropdown-item" href="/admin"><i class="fa fa-dashboard "></i> Dashboard</a>
          @endif
          @endif
          @if(Auth::check())
          @if(Auth::user()->hasRole('author', 'admin'))
          <a class="dropdown-item" href="/write-post"><i class="fa fa-plus-circle "></i> Write Post</a>
          @endif
          @endif
          <a class="dropdown-item" href="/logout"><i class="fa fa-arrow-circle-o-right"></i> Logout</a>

      </li>
    </ul>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!--Start Content-->
    @include('flash')
    @yield('content')
    <!-- End Content-->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    @yield('javascript')
  </body>
</html>
