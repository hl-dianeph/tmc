@extends('frontend.layouts.static')


@section('title')
Правила пользования
@endsection


@section('page_title')

{{ $page->name }}

@endsection


@section('page_content')
	
{!! $page->content !!}

@endsection