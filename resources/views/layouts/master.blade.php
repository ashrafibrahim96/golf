<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="logo-golfup" sizes="76x76" href="{{asset('assets/img/balle.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/balle.png')}}">  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        GolfUp Dashboard
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="../assets/css/navbar.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets/css/paper-dashboard.css?v=2.0.1"')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body class="">
<div class="wrapper">
    <div class="sidebar" data-color="black" data-active-color="danger">
        <div class="logo">
            <a href="/" class="">
                <div class="center">
                    <img src="{{asset('assets/img/logo-golfup.png')}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}" >
                    <a href="/">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ Request::is('users') ? 'active' : '' }}">
                    <a href="{{url('/users')}}">
                        <i class="nc-icon nc-single-02"></i>
                         <p>Users</p>
                    </a>

                </li>
                <li class="{{ Request::is('equipment') ? 'active' : '' }}">
                    <a href="{{url('/equipment')}}">
                        <i class="nc-icon nc-simple-add"></i>
                        <p>Equipments</p>
                    </a>
                </li>
               
                 <li class="{{ Request::is('messages') ? 'active' : '' }}">
                     <a href="{{ route('message.index') }}">
                         <i class="nc-icon nc-chat-33"></i>
                         <p>Messages</p>
                     </a>
                 </li>
                <li class="{{ Request::is('actualite') ? 'active' : '' }}">
                    <a href="{{url('/actualites')}}">
                        <i class="nc-icon nc-world-2"></i>
                        <p>Actualite</p>
                    </a>
                </li>


                <li>
                    <a href="{{url('/clubhouse')}}" class="clubhouse-btn">Golf Club
                        <span class="fa fa-caret-down first"></span>
                         <i class="nc-icon nc-bank"></i>
                        <!--<p>GolfHouse</p> -->
                    </a>
                    <ul class="clubhouse-show">
                        <li class="{{ Request::is('parcour') ? 'active' : '' }}">
                            <a href="{{url('/parcour')}}">
                            <i class="nc-icon nc-map-big"></i>
                            <p>Parcours</p>
                            </a>
                        </li>
                    <li class="{{ Request::is('trou') ? 'active' : '' }}">
                        <a href="{{url('/trou')}}">
                            <i class="nc-icon nc-atom"></i>
                            <p>Trous</p>
                        </a>
                    </li>
            </ul>

                </li>

                <li class="{{ Request::is('tarif') ? 'active' : '' }}">
                    <a href="{{url('/tarif')}}">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>Tarifs</p>
                    </a>
                </li>
                <li class="{{ Request::is('partie') ? 'active' : '' }}">
                    <a href="{{url('/partie')}}">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>Parties</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <main>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Rechercher...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="javascript:;">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="javascript:;">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
            @yield('content')
            </div>
    </div>
    </main>

</div>
            <script>
                $('.clubhouse-btn').click(function(){
                    console.log('clicked');
                    $('.sidebar-wrapper ul .clubhouse-show').toggleClass("show");
                    console.log('clicked1');
                    $('.sidebar-wrapper ul span').toggleClass("rotate");
                    console.log('clicked2');
                });
                $('.sidebar-wrapper ul li').click(function(){
                    $(this).addClass("active").siblings().removeClass("active");
                });
            </script>

</body>

</html>
