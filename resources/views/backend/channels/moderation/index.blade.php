@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')

        <div class="table-responsive">
            <table class="table mail-list">
                <tbody>
                    <tr>
                        <td>
                            @forelse($channels as $channel)
                                <!-- a single item -->
                                <div class="mail-item">
                                    <table class="mail-container">
                                        <tbody>
                                            <tr>
                                                <td class="mail-left">
                                                    <div class="avatar avatar-xxl avatar-circle">
                                                        <a href="{{ route('backend.channels.moderation.edit', ['id' => $channel->id]) }}">
                                                            <img src="{{ asset($channel->avatar) }}" alt="{{ $channel->name }}">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="mail-center">
                                                    <div class="mail-item-header">
                                                        <h4 class="mail-item-title">
                                                            <a href="{{ route('backend.channels.moderation.edit', ['id' => $channel->id]) }}" class="title-color">
                                                                {{ $channel->title }} 
                                                                <span class="category-slug">({{ $channel->name }})</span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <p class="mail-item-excerpt">
                                                        {{ str_limit($channel->description, 120) }}
                                                    </p>
                                                </td>
                                                <td class="mail-right action-buttons">
                                                    <a href="{{ route('backend.channels.moderation.edit', ['id' => $channel->id, 'page' => $page]) }}" class="btn btn-default"><i class="fa fa-pencil"></i> Проверить</a>
                                                    <br>
                                                    <form action="{{ route('backend.channels.moderation.destroy', ['id' => $channel->id]) }}" method="POST" onclick="return confirm('Вы уверены, что хотите удалить?')">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- END item -->
                            @empty
                                <p>Нет каналов на модерации.</p>
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="text-align: center;">
            {{ $channels->links() }}
        </div>
    </div><!-- END column -->
</div>
@endsection

