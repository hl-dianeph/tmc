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
    <div class="tl_main_logo_wrap">
        <a href="https://telegram.org/" class="tl_main_logo">
            <img class="tl_main_logo" src="/img/t_logo.png" alt="Telegram logo">
            <div class="tl_main_logo_title_image"></div>
          </a>
        <p class="tl_main_logo_lead">a new era of messaging</p>
    </div>
</div>
<div class="tl_main_body">
    <a name="why-switch-to-Telegram"></a>
    <h3 class="tl_main_body_header">9 лучших телеграм каналов</h3>
    <div class="tl_main_cards clearfix">
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_private"></div>
                <h3 class="tl_main_card_header">Private</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> messages are heavily encrypted and can self-destruct.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_cloud"></div>
                <h3 class="tl_main_card_header">Cloud-Based</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> lets you access your messages from multiple devices.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_fast"></div>
                <h3 class="tl_main_card_header">Fast</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> delivers messages faster than any other application.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_decentralized"></div>
                <h3 class="tl_main_card_header">Distributed</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> servers are spread worldwide for security and speed.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_open"></div>
                <h3 class="tl_main_card_header">Open</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> has an open <a href="//core.telegram.org/api">API</a> and <a href="//core.telegram.org/mtproto">protocol</a> free for everyone.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_free"></div>
                <h3 class="tl_main_card_header">Free</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> is free forever. No ads. No subscription fees.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_secure"></div>
                <h3 class="tl_main_card_header">Secure</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> keeps your messages safe from <a href="/crypto_contest">hacker attacks</a>.</div>
            </div>
        </div>
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_powerful"></div>
                <h3 class="tl_main_card_header">Powerful</h3>
                <div class="tl_main_card_lead"><strong>Telegram</strong> has no limits on the size of your media and c
                    <s>h</s>ats.</div>
            </div>
        </div>
        <div class="tl_main_card_cell_last">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_wecandoit"></div>
                <h3 class="tl_main_card_header">We Can do It!</h3>
                <div class="tl_main_card_lead">Help make messaging safe again &ndash; spread the word about <strong>Telegram</strong>.</div>
            </div>
        </div>
    </div>
</div>

@endsection