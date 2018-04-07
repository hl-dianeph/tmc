@extends('frontend.layouts.master')


@section('content')

<div style="text-align: center; height: 300px;">
    Для продолжения работы необходимо авторизоваться

    <br><br>

    <script async src="https://telegram.org/js/telegram-widget.js?4" data-telegram-login="tmchannelbot" data-size="large" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
    <script>
        function onTelegramAuth(user) {
            console.log(user);

            // TODO: send POST request
            var data = {
                id: user.id,
                username: user.username,
                firstname: user.first_name,
                lastname: user.last_name,
            };

            $.post('/auth/telegram', data, function(result) {
                console.log(result);
                
                if (result == 1) {
                    location.href = '/channels/create';
                }
            });
        }
    </script>
</div>

@endsection

@section('scripts_body')

    

@endsection