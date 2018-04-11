@extends('frontend.layouts.master') 


@section('content')
<div class="dev_page">
    <div id="dev_page_content_wrap" class=" ">
        <div class="dev_page_bread_crumbs"></div>
        <h1 id="dev_page_title" dir="auto">{{ $category->name }} - каталог телеграм каналов</h1>
        <div id="dev_page_content" dir="auto">
            <p>{!! $category->full_description !!}</p>
            
            <!-- Хлебные крошки -->
            <div class="dev_page_bread_crumbs">
                <ul class="breadcrumb clearfix">
                    <li><a href="/categories">Категории</a></li><i class="icon icon-breadcrumb-divider"></i>
                    <li>{{ $category->name }}</li>
                </ul>
            </div>
            
            <hr>
            
            @forelse ($channels as $channel)

                <div>
                    <h3>
                        <a class="anchor" name="bot-api" href="{{ route('channels.show', ['name' => $channel->name]) }}">
                            {{ $channel->title }}
                        </a>
                    </h3>
                </div>

                <div>
                    <a href="{{ route('channels.show', ['name' => $channel->name]) }}" target="_blank">
                        <img src="{{ asset($channel->avatar) }}" title="" style="max-width: 90px;float:right" class="img-circle">
                    </a>
                </div>
                
                <p>{{ $channel->description }}</p>
                <blockquote>
                    <p>
                        <a href="{{ route('channels.show', ['name' => $channel->name]) }}">
                            <strong>Читать подробнее</strong>
                        </a> / {{ $channel->members_count }} подписчиков <!-- / 15 комментериев-->
                    </p>
                </blockquote>
                <hr>

            @empty
                <p>Нет каналов в категории</p>
            @endforelse

            <center>
                @if ($prevLink)
                    <a href="{{ $prevLink }}" class="tl_twitter_share_btn" id="tl_twitter_share_btn" data-text="" data-url="#" data-via="">Назад</a>
                @endif

                @if ($nextLink)
                    <a href="{{ $nextLink }}" class="tl_twitter_share_btn" id="tl_twitter_share_btn" data-text="" data-url="#" data-via="">Вперед</a>
                @endif
            </center>
        </div>
    </div>
</div>
@endsection