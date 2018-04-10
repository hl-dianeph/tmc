@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Редактирование канала <span class="text-smaller">({{ $channel->name }})</span></h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            
            <div class="widget-body text-center">
                <div class="row">
                    {!! Form::model($channel, ['route' => ['backend.channels.update', $channel->id], 'method' => 'patch']) !!}

                        @include('backend.channels.fields')

                    {!! Form::close() !!}
                </div>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>

@endsection