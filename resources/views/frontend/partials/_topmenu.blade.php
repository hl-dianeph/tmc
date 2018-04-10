<div class="tl_page_head navbar navbar-static-top navbar navbar-tg">
    <div class="navbar-inner">
        <div class="container clearfix">
            <ul class="nav navbar-nav navbar-right hidden-xs">
                @if (Auth::check())
                <li class="navbar-twitter">
                    <!-- TODO: remove this sheety code -->
                    <a href="#"><span> {{ App\User::find(Auth::id())->username }}</span>
                    </a>
                </li>
                <li class="navbar-twitter">
                    <!-- TODO: remove this sheety code -->
                    <a href="/logout"><span> Выход</span>
                    </a>
                </li>
                @endif

                <li class="navbar-twitter">
                    <a href="#" target="_blank" data-track="Follow/Twitter" onclick="trackDlClick(this, event)"><i class="icon icon-twitter"></i><span> Мы ВКонтакте</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/*') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Главная</a>
                </li>
                <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">Категории</a>
                </li>
                <li class="{{ Request::is('channels*') ? 'active' : '' }}">
                    <a href="{{ route('channels.create') }}">Добавить канал</a>
                </li>
                <li class="{{ Request::is('pravila*') ? 'active' : '' }}">
                    <a href="{{ route('static', ['slug' => 'pravila']) }}">Правила</a>
                </li>
                <li class="{{ Request::is('o-nas*') ? 'active' : '' }}">
                    <a href="{{ route('static', ['slug' => 'o-nas']) }}">О нас</a>
                </li>
            </ul>
        </div>
    </div>
</div>