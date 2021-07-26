@extends('layouts.base')

@section('title')
    S3 | {{ $news->title }}
@endsection

@section('content')
    <h1>{{ $news->category->title }} </h1>
    <h2>{{ $news->header }} <span>{{ $news->views_count }}</span></h2>
    <h3>{{ $news->publish_date }}</h3>
    <div class="mt-5">{!! $news->content !!}</div>
@endsection
