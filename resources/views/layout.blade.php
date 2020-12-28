<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta charset="utf-8">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/responsive.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg" id="header">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="/images/Logo.png" alt=""><img src="/images/sticky-Logo.png" alt=""></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu_toggle">
                    <span class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class="hamburger-cross">
                        <span></span>
                        <span></span>
                    </span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная</a>
                    </li>
                    @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site.category', $category->id)}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Вход</a>
                    </li>
                </ul>
                <ul class="list-unstyled navbar-nav">
                    <li><a href="#" class="search"><i class="flaticon-search"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--breadcrumb area-->
    <section class="breadcrumb_area parallax_effect" data-background="images/bg.jpg" style="background: url(/images/blog_breadcrumb_bg.jpg) no-repeat;">
        <div class="overlay_bg"></div>
        <div class="container">
            <div class="breadcrumb_content text-center">
                <h1>Blog Classic</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Blog</li>
                </ol>
            </div>
        </div>
    </section>
    <!--breadcrumb area-->

    <div>
        @yield('content')
    </div>

<!--footer_area-->
    <footer class="footer_area">
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <p>Copyright © 2020 <a href="/">Blog Classic</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-7 col-md-6 text-right">
                        <ul class="list-unstyled f_menu">
                            <li><a href="/">Главная</a></li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('site.category', $category->id)}}">
                                        {{$category->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer_area-->

    <!--search_boxs-->
    <form class="search_boxs" role="search" action="{{route('site.search')}}" method="POST">
        <div class="search_box_inner">
            <div class="close_icon">×</div>
            <div class="input-group">
                <input type="text" name="search" class="form_control search-input" placeholder="Поиск по сайту" autofocus="">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="flaticon-search"></i></button>
                </div>
            </div>
        </div>
        @csrf
    </form>
    <!--search_boxs-->
    <script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jquery.parallax-scroll.js')}}"></script>
    <script src="{{url('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('js/isotope-min.js')}}"></script>
    <script src="{{url('js/slick.min.js')}}"></script>
    <script src="{{url('js/parallaxie.js')}}"></script>
    <script src="{{url('js/jquery.counterup.min.js')}}"></script>
    <script src="{{url('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</body>
</html>
