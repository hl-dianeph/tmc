@extends('frontend.layouts.category') 


@section('title')Телеграм канал: {{ $channel->title }}@endsection
@section('og_sitename')Tmchannel.ru - каталог телеграм каналов@endsection
@section('keywords'){{ $channel->keywords }}@endsection
@section('og_description'){{ $channel->og_description }}@endsection
@section('og_title'){{ $channel->title }}@endsection
@section('og_image'){{ asset($channel->avatar) }}@endsection
@section('telegram_channel'){{ $channel->name }}@endsection


@section('content')
<div class="dev_page">
    <div id="dev_page_content_wrap" class=" ">
        
        <div class="dev_page_bread_crumbs"></div>

        <h1 id="dev_page_title" dir="auto">Телеграм канал: {{ $channel->title }}</h1>
        <div id="dev_page_content" dir="auto">

            <!-- Хлебные крошки -->
            <div class="dev_page_bread_crumbs">
                <ul class="breadcrumb clearfix">
                    <li><a href="/categories">Категории</a></li>
                    <i class="icon icon-breadcrumb-divider"></i>
                    <li><a href="/categories/{{ $channel->category->slug }}">{{ $channel->category->name }}</a></li>
                    <i class="icon icon-breadcrumb-divider"></i>
                    <li>{{ $channel->title }} ({{ $channel->name }})</li>
                </ul>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <img class="img-responsive img-circle" src="{{ asset($channel->avatar) }}">
                </div>

                <div class="col-md-9">
                    <strong>Категория:</strong> {{ $channel->category->name }}<br>
                    <strong>Тип:</strong> {{ $channel->type->name }}<br>
                    <strong>Количество подписчиков:</strong> {{ $membersCount }}<br>
                    <strong>Количество просмотров:</strong> {{ $channel->hits }}<br>
                    <strong>Дата публикации:</strong> {{ $channel->published_at->format('d.m.Y') }}

                    <hr>
                    {!! $channel->description !!}</p>
                </div>
            </div>


            <p>


            
            
        </div>
    </div>
</div>
@endsection