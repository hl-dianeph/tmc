<!-- Name Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('name', 'Название страницы:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Содержание:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control tinymce-text']) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Ключевые слова (keywords):') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>

<!-- Og Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('og_description', 'Описание (og:description):') !!}
    {!! Form::text('og_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Page -->
{!! Form::hidden('page', $page) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Окей', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.staticPages.index', ['page' => $page]) !!}" class="btn btn-default">Отмена</a>
</div>