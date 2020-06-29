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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper"> 
      <div class="container">
        <div id="header" class="clearfix">
            <a class="navbar-brand" href="#"><img src="/images/logowebsite.png" alt="" width="200px" height="auto">
            </a>
        </div>
      </div>
    </div>
<div id="menusite">
  <div class="wrapper">
  <nav class="navbar navbar-expand-lg navbar-light" id="menuItem" style="background-color: #0685d6;padding: 0">
          <div class="collapse navbar-collapse container" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto menu">
              <li class="nav-item active">
                <a class="nav-link" href="{!!url('/') !!}">Trang chủ<span class="sr-only">(current)</span></a>
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
                                  <a class="dropdown-item" href="" style="color: black;">Proflie</a>
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
                  <a class="nav-link" href="{{route('tenderer.login')}}">
                    <button class="btn btn-warning">Bên Mời Thầu</button>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="{{route('contractor.login')}}">
                    <button class="btn btn-warning">Bên Dự Thầu</button>
                  </a>
                </li>
              @endif
                  
            </ul>
          </div>
        </nav>
</div>
</div>


<div class="wrapper">
  <div id="content" class="clearfix container" style="margin-top: 20px">
    @yield('content')
  </div>
</div>

<div class="wrapper">
  <div id="footer"></div>
</div>

<!-- javacript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>$('.carousel').carousel({interval: 2000})</script>
<script type="text/javascript">
  @yield('script')
</script>
</body>
</html>