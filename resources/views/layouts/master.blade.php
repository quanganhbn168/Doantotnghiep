<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset ('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon-16x16.png') }}">
    @stack('styles')
</head>
<body>
    <div class="wrapper"> 
      <nav class="navbar navbar-expand-md navbar-fixed-top main-nav" id="banner">
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}"><img src="/images/logo.png" alt="" width="200px" height="auto"></a>
            </li>
        </ul>
        <ul class="nav navbar-nav mx-auto" style="display: block;">
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-phone-alt"></i>096-562-5210</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-envelope" ></i>Dauthauvanchuyen@gmail.com</a></li>
        </ul>
        <ul class="nav navbar-nav" style="display: block;">
          <div class="row">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fab fa-youtube">Youtube</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fab fa-twitter">Twitter</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fab fa-facebook">Facebook</i></a>
            </li>
          </div>
            
            <form>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập từ khoá tìm kiếm">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
        </ul>
    </div>
      </nav>
    </div>
<div id="menusite">
  <div class="wrapper">
  <nav class="navbar navbar-expand-lg navbar-light" id="menuItem" style="background-color: #0685d6;padding: 0">
          <div class="collapse navbar-collapse container" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto menu">
              <li class="nav-item active">
                <a class="nav-link" href="{!!url('/') !!}"><i class="fas fa-home"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Giới thiệu</a>
              </li>
              <li>
                <a class="nav-link" href="#">Tin tức</a>
              </li>
              <li>
                <a class="nav-link" href="#">Hướng dẫn sử dụng</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto user">
              @if(Auth::guard('tenderer')->check())
                <li>
                  <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>

                                  {{ Auth::guard('tenderer')->user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('tenderer.show',['id'=>Auth::guard('tenderer')->user()->id]) }}" style="color: black;">Proflie</a>
                                  <a class="dropdown-item" href="{{ route('tenderer.logout') }}" style="color: black;">
                                      Logout
                                  </a>
                              </div>
                          </li>
                </li>
                @elseif(Auth::guard('contractor')->check())
                <li>
                  <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>

                                  {{ Auth::guard('contractor')->user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="" style="color: black;">Proflie</a>
                                  <a class="dropdown-item" href="{{ route('contractor.logout') }}" style="color: black;">
                                      Logout
                                  </a>
                              </div>
                          </li>
                </li>
                <!-- Authentication Links -->
              @else
                <li>
                  <a class="nav-link" href="{{route('tenderer.login')}}"><i class="fas fa-user-tie"></i>
                     Bên Mời Thầu
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="{{route('contractor.login')}}">
                    <i class="fas fa-suitcase"></i> Bên Dự Thầu
                  </a>
                </li>
              @endif
                  
            </ul>
          </div>
  </nav>
</div>
</div>

<div class="wrapper" id="banner-header">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="/images/slider1.jpg" height="450px" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/slider2.png" height="450px" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/sliderlogistics-1.jpg" height="450px" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/slider5.jpg" height="450px" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/slider6.jpg" height="450px" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/slider7.jpg" height="450px" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/slider8.jpg" height="450px" alt="Third slide">
          </div>
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="search-form" class="sreach-form row">
        <div class="search col-md-7">
        <h4>Tìm kiếm thông tin dự án</h4>
        <span>Kho dữ liệu được cập nhật liên tục</span>
        <form action="">
          @include('frontend.partrial.search',['categories'=>$data_categories ?? null])
        </form>
        </div>
        <div class="info-search col-md-5">
          @include('frontend.partrial.info',['data'=>$project ?? null])
        </div>
      </div>
    </div>
</div>
<div id="content" class="clearfix container" style="margin-top: 20px">@yield('content')</div>
<div id="footer">
<!-- Footer -->
  <section id="footer">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Quick links</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Quick links</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Quick links</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
            <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
          <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-google-plus"></i></a></li>
            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
          </ul>
        </div>
        <hr>
      </div>  
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
          <p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
        </div>
        <hr>
      </div>  
    </div>
  </section>
  <!-- ./Footer -->
</div>

<!-- javacript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>$('.carousel').carousel({interval: 5000})</script>
    
<script type="text/javascript">
  @yield('script')
</script>
</body>
</html>