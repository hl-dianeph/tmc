@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Static Page
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('backend.static_pages.show_fields')
                    <a href="{!! route('backend.staticPages.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
