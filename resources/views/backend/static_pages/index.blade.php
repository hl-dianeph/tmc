@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')

        <div class="row">
            <div class="col-md-12">
                <div class="mail-toolbar m-b-lg">          
                    <a class="btn btn-default" style="" href="{!! route('backend.staticPages.create') !!}">
                        <i class="fa fa-plus"></i> Добавить страницу
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mail-list">
                <tbody>
                    <tr>
                        <td>
                            @forelse($staticPages as $staticPage)
                                <!-- a single staticPage -->
                                <div class="mail-item">
                                    <table class="mail-container">
                                        <tbody>
                                            <tr>
                                                <td class="mail-center">
                                                    <div class="mail-item-header">
                                                        <h4 class="mail-item-title">
                                                            <a href="{{ route('backend.staticPages.edit', ['id' => $staticPage->id]) }}" class="title-color">
                                                                {{ $staticPage->name }} 
                                                                <span class="item-slug">({{ $staticPage->slug }})</span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <p class="mail-item-excerpt">
                                                        {{ str_limit($staticPage->content, 120) }}
                                                    </p>
                                                </td>
                                                <td class="mail-right action-buttons">
                                                    <a href="{{ route('backend.staticPages.edit', ['id' => $staticPage->id, 'page' => $page]) }}" class="btn btn-default"><i class="fa fa-pencil"></i> Редактировать</a>
                                                    <br>
                                                    <form action="{{ route('backend.staticPages.destroy', ['id' => $staticPage->id]) }}" method="POST" onclick="return confirm('Вы уверены, что хотите удалить?')">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- END staticPage -->
                            @empty
                                <p>Нет страниц в базе.</p>
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="text-align: center;">
            {{ $staticPages->links() }}
        </div>
    </div><!-- END column -->
</div>
@endsection
