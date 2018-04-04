<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Наименование:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- ParentId Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Родитель / Уровень:') !!}
    {!! Form::select('parent_id', App\Models\Category::dropdown(), null, ['class' => 'form-control']) !!}
</div>

<!-- Short Dest Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('short_desc', 'Краткое описание:') !!}
    {!! Form::textarea('short_desc', null, ['class' => 'form-control', 'rows' => 5]) !!}
</div>

<!-- Full Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('full_desc', 'Полное описание:') !!}
    {!! Form::textarea('full_desc', null, ['class' => 'form-control']) !!}
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

<!-- Image Field -->
@if (isset($category))
<div class="form-group col-sm-6 ">
    <div class="avatar avatar-xxl avatar-circle">
        <img src="{{ asset(App\Models\Category::IMAGE_PUBLIC_DIR . $category->image) }}">
    </div>
</div>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('image', 'Иконка:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Page -->
{!! Form::hidden('page', $page) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Окей', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.categories.index', ['page' => $page]) !!}" class="btn btn-default">Отмена</a>
</div>
