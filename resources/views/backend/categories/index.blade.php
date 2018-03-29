@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <!-- <h4 class="widget-title">Категории</h4> -->
                <a class="btn btn-primary" style="" href="{!! route('backend.categories.create') !!}">
                    Добавить категорию
                </a>
            </header>
            <!-- <hr class="widget-separator"> -->
            <div class="widget-body">
                @include('flash::message')

                @forelse($categories as $category)
                    {{ $category->name }}<br>
                @empty
                    <p>Нет каналов в базе.</p>
                @endforelse

                <div class="text-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
@endsection

