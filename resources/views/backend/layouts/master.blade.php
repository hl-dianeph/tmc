<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="/images/logo.png">
    
    <title>Tmchannel.ru - Панель администратора</title>
    
    @include('backend.partials._styles')

    <script src="{{ asset('js/breakpoints.min.js') }}"></script>
    <script>
        Breakpoints();
    </script>

</head>

<body class="menubar-top menubar-light theme-primary">
    <!--============= start main area -->
    <!-- APP NAVBAR ==========-->
    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
        
        <!-- navbar header -->
        <div class="navbar-header">
            <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="zmdi zmdi-hc-lg zmdi-search"></span>
            </button>
            <a href="{{ route('backend.index') }}" class="navbar-brand">
                <!-- <span class="brand-icon"><i class="fa fa-gg"></i></span> -->
                <span class="brand-name">Панель администратора</span>
            </a>
        </div>

        <!-- .navbar-header -->
        <div class="navbar-container container-fluid">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                    <li class="hidden-float hidden-menubar-top">
                        <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
                            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                        </a>
                    </li>
                    <li>
                        <h5 class="page-title hidden-menubar-top">Панель</h5>
                    </li>
                </ul>
                <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
                    <li class="nav-item dropdown hidden-float">
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
                            <i class="zmdi zmdi-hc-lg zmdi-search"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-float">
                        <a href="{{ route('backend.settings.index') }}" aria-expanded="false">
                            <i class="zmdi zmdi-hc-lg zmdi-settings"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-float">
                        <a href="{!! url('/logout') !!}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-hc-lg zmdi-power"></i>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- navbar-container -->
    </nav>
    <!--========== END app navbar -->
    <!-- APP ASIDE ==========-->
    <aside id="menubar" class="menubar light">
        {{--
        <div class="app-user">
            <div class="media">
                <div class="media-left">
                    <div class="avatar avatar-md avatar-circle">
                        <a href="javascript:void(0)">
                            
                        </a>
                    </div>
                    <!-- .avatar -->
                </div>
                <div class="media-body">
                    <div class="foldable">
                        <h5><a href="javascript:void(0)" class="username">John Doe</a></h5>
                        <ul>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <small>Web Developer</small>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu animated flipInY">
                                    <li>
                                        <a class="text-color" href="/index.html">
                                            <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                            <span>Home</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-color" href="profile.html">
                                            <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-color" href="settings.html">
                                            <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a class="text-color" href="logout.html">
                                            <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                            <span>Home</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- .media-body -->
            </div>
            <!-- .media -->
        </div>
        --}}
        <!-- .app-user -->
        
        @include('backend.partials._topmenu')

        <!-- .menubar-scroll -->
    </aside>
    <!--========== END app aside -->

    <!-- navbar search -->
    <div id="navbar-search" class="navbar-search collapse">
        <div class="navbar-search-inner">
            <form action="#">
                <span class="search-icon"><i class="fa fa-search"></i></span>
                <input class="search-field" type="search" placeholder="Поиск..." />
            </form>
            <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
                <i class="fa fa-close"></i>
            </button>
        </div>
        <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
    </div>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                @yield('content')
            </section>
            <!-- .app-content -->
        </div>
        <!-- .wrap -->
        
        @include('backend.partials._footer')
    </main>
    <!--========== END app main -->
    
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.js') }}"></script>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    @yield('scripts_import')

    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea.tinymce-text', 
                // editor_selector: "tinymce-text",
                // editor_deselector: "no-tinymce",
                auto_focus: 'element1'
            });

            @yield('scripts_body')
        });
    </script>
</body>

</html>