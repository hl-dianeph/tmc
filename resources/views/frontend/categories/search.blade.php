@extends('frontend.layouts.master') 


@section('content')
<div class="tl_main_body">
    <a name="why-switch-to-Telegram"></a>
    <h3 class="tl_main_body_header">Поиск <strong>"{{ $search }}"</strong></h3>

    <div class="tl_main_cards clearfix">
        <div class="row" style="margin-bottom: 40px;">
            <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="col-md-6 col-md-offset-3">
                    <input type="text" name="q" value="{{ $search }}" class="form-control" placeholder="Попробуйте найти интересные каналы">
                </div>
            </form>
        </div>

        @forelse ($channels as $channel)
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap" style="text-align: center;">
                <div class="tl_main_card tl_main_card_private" style="width: auto">
                    <div class="img-responsive">
                        <a href="{{ route('channels.show', ['name' => $channel->name]) }}">
                            <img src="{{ asset($channel->avatar) }}" class="img-circle" alt="{{ $channel->name }}" style="width: 200px;">
                        </a>
                    </div>
                </div>
                <h3 class="tl_main_card_header">{{ $channel->name }}</h3>
                <div class="tl_main_card_lead">
                    {{ $channel->description }}
                </div>
            </div>
        </div>
        @empty
            <p>Ничего не найдено :(</p>
        @endforelse
    </div>

</div>
<div class="tl_main_noshare clearfix"></div>
@endsection