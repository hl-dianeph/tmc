@extends('frontend.layouts.master') 


@section('content')
<div class="tl_main_body">
    <a name="why-switch-to-Telegram"></a>
    <h3 class="tl_main_body_header">Категории телеграм каналов</h3>

    <div class="tl_main_cards clearfix">
    	@forelse ($categories as $category)
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap">
                <div class="tl_main_card tl_main_card_private">
                    <div class="channel-img">
                        <a href="{{ route('categories.show', ['name' => $category->name]) }}">
                            <img src="{{ asset(App\Models\Category::IMAGE_PUBLIC_DIR . $category->image) }}" class="img-circle" alt="{{ $category->name }}">
                        </a>
                    </div>
                </div>
                <h3 class="tl_main_card_header">{{ $category->name }}</h3>
                <div class="tl_main_card_lead">
                	{{ $category->short_desc }}
                </div>
            </div>
        </div>
        @empty
            <p>Нет категорий в базе.</p>
        @endforelse
    </div>

    <div>
        {{ $categories->links() }}
    </div>

</div>
<div class="tl_main_noshare clearfix"></div>
@endsection