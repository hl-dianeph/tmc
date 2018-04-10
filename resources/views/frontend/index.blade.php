@extends('frontend.layouts.master')


@section('content')

<div class="tl_main_head">
    <div class="tl_main_side_blog">
        <div class="side_blog_wrap">
            <a href="https://telegram.org/blog" class="side_blog_header">Recent News</a>
            <div class="side_blog_entries">
                <a href="https://telegram.org/blog/200-million" class="side_blog_entry">
                    <div class="side_blog_date">Mar 22</div>
                    <div class="side_blog_title">200,000,000 Monthly Active Users</div>
                </a>
                <a href="https://telegram.org/blog/discover-stickers-and-more" class="side_blog_entry">
                    <div class="side_blog_date">Mar 22</div>
                    <div class="side_blog_title">Sticker Search, Multiple Photos, and More</div>
                </a>
                <a href="https://telegram.org/blog/android-streaming" class="side_blog_entry">
                    <div class="side_blog_date">Feb 6</div>
                    <div class="side_blog_title">Streaming and Auto-Night Mode on Android</div>
                </a>
            </div>
        </div>
    </div>
    <div class="tl_main_logo_wrap" style="height: 150px;">
        <!-- <a href="https://telegram.org/" class="tl_main_logo">
            <img class="tl_main_logo" src="/img/t_logo.png" alt="Telegram logo">
            <div class="tl_main_logo_title_image"></div>
        </a>
        <p class="tl_main_logo_lead">a new era of messaging</p> -->
    </div>
</div>
<div class="tl_main_body">
    <a name="why-switch-to-Telegram"></a>
    <h3 class="tl_main_body_header">{{ $top }} лучших телеграм каналов</h3>
    <div class="tl_main_cards clearfix">
        @forelse ($channels as $channel)

        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_private">
                    <div class="channel-img">
                        <a href="{{ route('channels.show', ['name' => $channel->name]) }}">
                            <img src="{{ asset($channel->avatar) }}" class="img-circle" alt="{{ $channel->title }}">
                        </a>
                    </div>
                </div>
                <h3 class="tl_main_card_header">
                    <a href="{{ route('channels.show', ['name' => $channel->name]) }}">
                        {{ $channel->name }}
                    </a>
                </h3>
                <div class="tl_main_card_lead">
                    <span style="font-size: smaller"><strong>{{ $channel->members_count }}</strong> подписчиков</span>
                    <br><br>
                    {{ $channel->description }}
                </div>
            </div>
        </div>

        @empty

            <p>Нет каналов</p>

        @endforelse
    </div>
</div>

@endsection