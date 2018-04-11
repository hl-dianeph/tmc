@extends('frontend.layouts.static')


@section('title'){{ $page->name }}@endsection
@section('keywords'){{ $page->keywords }}@endsection
@section('og_description'){{ $page->og_description }}@endsection


@section('page_title')

{{ $page->name }}

@endsection


@section('page_content')
	
{!! $page->content !!}

@endsection