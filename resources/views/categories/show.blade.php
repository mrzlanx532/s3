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
            <th scope="col"></th>
            <th scope="col">Publish date</th>
            <th scope="col">Header</th>
            <th scope="col">Preview text</th>
        </tr>
        </thead>
        <tbody>
            @foreach($category->publishedNews as $news)
                <tr class="cursor-pointer" onclick="window.location = '/{{$category->title}}/{{$news->id}}-{{$news->header}}'">
                    <th scope="row">{{ $news->id }}</th>
                    <td><img src="{{$news->preview_img}}" alt="Изображение недоступно"></td>
                    <td class="text-nowrap">{{ $news->publish_date }}</td>
                    <td>{{ $news->header }}</td>
                    <td>{{ $news->preview_text }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
