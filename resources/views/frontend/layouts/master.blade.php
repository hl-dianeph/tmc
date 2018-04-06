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

        <div class="container clearfix tl_page_container tl_main_page_container">
            <div class="tl_page">
                <div class="tl_main_wrap">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('frontend.partials._footer')
    </div>
    <script async="" src="{{ asset('js/analytics.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @yield('scripts_import')
    
    <script>
    </script>

</body>

</html>