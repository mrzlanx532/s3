@extends('layouts.base')

@section('title')
    S3
@endsection

@section('content')
    <h1>Category {{ $category->title }}</h1>
    <h6>Count of news: {{ $category->published_news_count }}</h6>
    <table class="table table-hover mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Publish news count</th>
        </tr>
        </thead>
        <tbody>
            @foreach($category->publishedNews as $news)
                <tr>
                    <th scope="row">{{ $news->id }}</th>
                    <td>{{ $news->header }}</td>
                    <td>{{ $news->preview_text }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
