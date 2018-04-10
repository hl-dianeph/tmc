<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Название:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Телеграм имя (юзернейм):') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>

<!-- Members count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('members_count', 'Количество подписчиков:') !!}
    {!! Form::text('members_count', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>

<!-- Author Field -->
<div class="form-group col-sm-6">
    {!! Form::label('author_id', 'Автор добавления:') !!}
    {!! Form::select('author_id', App\User::dropdown(), null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Категория:') !!}
    {!! Form::select('category_id', App\Models\Category::dropdown(), null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', 'Тип:') !!}
    {!! Form::select('type_id', App\Models\Type::dropdown(), null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Описание:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Ключевые слова (keywords):') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>

<!-- Og:description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('og_description', 'Описание (og:description):') !!}
    {!! Form::text('og_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tags', 'Метки-тэги (через запятую):') !!}
    <input type="text" name="tags" value="{{ $tags }}" class="form-control">
</div>

<!-- Image Field -->
@if (isset($channel))
<div class="form-group col-sm-6 ">
    <div class="avatar avatar-xxxl avatar-circle">
        <img src="{{ asset($channel->avatar) }}">
    </div>
</div>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('avatar', 'Аватар:') !!}
    {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Page -->
{!! Form::hidden('page', $page) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Окей', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.channels.index', ['page' => $page]) !!}" class="btn btn-default">Отмена</a>
</div>
