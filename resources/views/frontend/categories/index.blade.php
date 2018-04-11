@extends('frontend.layouts.master') 


@section('title')Категории телеграм каналов@endsection


@section('content')
<div class="tl_main_body">
    <a name="why-switch-to-Telegram"></a>
    <h3 class="tl_main_body_header">Категории телеграм каналов</h3>

    <div class="tl_main_cards clearfix">
        <div class="row" style="margin-bottom: 40px;">
            <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="col-md-6 col-md-offset-3">
                    <input type="text" name="q" class="form-control" placeholder="Попробуйте найти интересные каналы">
                </div>
            </form>
        </div>

        @forelse ($categories as $category)
        <div class="tl_main_card_cell">
            <div class="tl_main_card_wrap" style="text-align: center;">
                <div class="tl_main_card tl_main_card_private" style="width: auto">
                    <div class="img-responsive">
                        <a href="{{ route('categories.show', ['name' => $category->slug]) }}" class="tmc-link">
                            <img src="{{ asset(App\Models\Category::IMAGE_PUBLIC_DIR . $category->image) }}" class="img-circle" alt="{{ $category->name }}" style="width: 200px;">
                        </a>
                    </div>
                </div>
                <h3 class="tl_main_card_header">
                    <a href="{{ route('categories.show', ['name' => $category->slug]) }}" class="tmc-link">
                        {{ $category->name }}
                    </a>
                </h3>
                <div class="tl_main_card_lead">
                    {{ $category->short_desc }}
                </div>
            </div>
        </div>
        @empty
            <p>Нет категорий в базе.</p>
        @endforelse
    </div>

</div>
<div class="tl_main_noshare clearfix"></div>
@endsection