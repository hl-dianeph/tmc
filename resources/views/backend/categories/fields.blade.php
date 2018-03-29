<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Dest Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_desc', 'Short Desc:') !!}
    {!! Form::text('short_desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('full_desc', 'Full Desc:') !!}
    {!! Form::textarea('full_desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>

<!-- Og:description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('og:description', 'Og:description:') !!}
    {!! Form::text('og:description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
