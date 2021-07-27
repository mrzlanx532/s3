@extends('layouts.base')

@section('content')
    <h1>{{ $news->category->title }} </h1>
    <h2>{{ $news->header }} <span> (count of views: {{ $news->views_count }})</span></h2>
    <h3>{{ $news->publish_date }}</h3>
    <div class="mt-5">{!! $news->content !!}</div>
@endsection
