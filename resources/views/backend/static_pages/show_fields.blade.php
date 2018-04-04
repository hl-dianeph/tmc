<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $staticPage->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $staticPage->name !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $staticPage->slug !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $staticPage->content !!}</p>
</div>

<!-- Keywords Field -->
<div class="form-group">
    {!! Form::label('keywords', 'Keywords:') !!}
    <p>{!! $staticPage->keywords !!}</p>
</div>

<!-- Og Description Field -->
<div class="form-group">
    {!! Form::label('og_description', 'Og Description:') !!}
    <p>{!! $staticPage->og_description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $staticPage->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $staticPage->updated_at !!}</p>
</div>

