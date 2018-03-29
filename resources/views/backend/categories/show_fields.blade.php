<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $category->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $category->name !!}</p>
</div>

<!-- Short Dest Field -->
<div class="form-group">
    {!! Form::label('short_dest', 'Short Dest:') !!}
    <p>{!! $category->short_dest !!}</p>
</div>

<!-- Full Desc Field -->
<div class="form-group">
    {!! Form::label('full_desc', 'Full Desc:') !!}
    <p>{!! $category->full_desc !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{!! $category->image !!}</p>
</div>

<!-- Keywords Field -->
<div class="form-group">
    {!! Form::label('keywords', 'Keywords:') !!}
    <p>{!! $category->keywords !!}</p>
</div>

<!-- Og:description Field -->
<div class="form-group">
    {!! Form::label('og:description', 'Og:description:') !!}
    <p>{!! $category->og:description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $category->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $category->updated_at !!}</p>
</div>

