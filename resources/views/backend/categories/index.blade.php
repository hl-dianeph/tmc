@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')

        <div class="row">
            <div class="col-md-12">
                <div class="mail-toolbar m-b-lg">          
                    <a class="btn btn-default" style="" href="{!! route('backend.categories.create') !!}">
                        <i class="fa fa-plus"></i> Добавить категорию
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mail-list">
                <tbody>
                    <tr>
                        <td>
                            @forelse($categories as $category)
                                <!-- a single category -->
                                <div class="mail-item">
                                    <table class="mail-container">
                                        <tbody>
                                            <tr>
                                                <td class="mail-left">
                                                    <div class="avatar avatar-xxl avatar-circle">
                                                        <a href="{{ route('backend.categories.edit', ['id' => $category->id]) }}">
                                                            <img src="{{ asset(App\Models\Category::IMAGE_PUBLIC_DIR . $category->image) }}" alt="{{ $category->name }}">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="mail-center">
                                                    <div class="mail-item-header">
                                                        <h4 class="mail-item-title">
                                                            <a href="{{ route('backend.categories.edit', ['id' => $category->id]) }}" class="title-color">
                                                                {{ $category->name }} 
                                                                <span class="category-slug">({{ $category->slug }})</span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <p class="mail-item-excerpt">
                                                        {{ str_limit($category->full_desc, 120) }}
                                                    </p>
                                                </td>
                                                <td class="mail-right action-buttons">
                                                    <a href="{{ route('backend.categories.edit', ['id' => $category->id, 'page' => $page]) }}" class="btn btn-default"><i class="fa fa-pencil"></i> Редактировать</a>
                                                    <br>
                                                    <form action="{{ route('backend.categories.destroy', ['id' => $category->id]) }}" method="POST" onclick="return confirm('Вы уверены, что хотите удалить?')">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- END category -->
                            @empty
                                <p>Нет категорий в базе.</p>
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="text-align: center;">
            {{ $categories->links() }}
        </div>
    </div><!-- END column -->
</div>
@endsection

