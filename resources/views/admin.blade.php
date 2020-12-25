<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/themes/Admin/css/adminlte.min.css">
    <link rel="stylesheet" href="/themes/Admin/css/fontawesome.css">
    <link rel="stylesheet" href="/themes/Admin/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/themes/Admin/css/summernote-bs4.min.css">
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin/adminlte" class="nav-link">
                    Home
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <div class="container brand-text font-weight-light>">Laravel Blog</div>
            <div class=" container admin-info">Hi, admin!</div>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="container">
                    <a href="/admin/logout"><i class="fas fa-sign-out-alt"></i> Выход </a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item ">
                        <a href="/admin/posts" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>Публикации</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/admin/comments" class="nav-link">
                            <i class="nav-icon fa fa-comment"></i>
                            <p>Комментарии</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/admin/categories" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>Категории</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="breadcrumbs">
                    @yield('breadcrumbs')
                </div>
                <div class="h1">@yield('title')</div>
            </div>
            @yield('content')
        </section>
    </div>

    <footer class="main-footer">
    </footer>
</div>
<script type="text/javascript" src="/themes/Admin/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/themes/Admin/js/adminlte.min.js"></script>
<script type="text/javascript" src="/themes/Admin/js/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
</body>
</html>
