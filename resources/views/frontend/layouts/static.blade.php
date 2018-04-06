<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title', 'Tmchannel.ru - каталог telegram каналов')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Telegram – a new era of messaging">
    <meta property="og:image" content="https://telegram.org/img/t_logo.png">
    <meta property="og:site_name" content="Telegram">
    <meta property="og:description" content="">
    <meta property="fb:app_id" content="254098051407226">
    <meta property="vk:app_id" content="3782569">
    <meta name="apple-itunes-app" content="app-id=686449807">
    <meta name="telegram:channel" content="@telegram">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/telegram.css') }}" rel="stylesheet" media="screen">
    <style>
    @yield('css_body')
    </style>
</head>

<body>
    <div id="fb-root"></div>
    <div class="tl_page_wrap">
        @include('frontend.partials._topmenu')

        <div class="container clearfix">
            <div class="dev_page">
                <div id="dev_page_content_wrap" class=" ">
                    <div class="dev_page_bread_crumbs"></div>

                    <h1 id="dev_page_title" dir="auto">
                        @yield('page_title')
                    </h1>
      
                    <div id="dev_page_content" dir="auto">
                        @yield('page_content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials._footer')

    <script async="" src="{{ asset('js/analytics.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @yield('scripts_import')
    
    <script>
    </script>

</body>

</html>