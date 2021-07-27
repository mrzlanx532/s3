@extends('layouts.base')

@section('content')
    <h1>Category {{ $category->title }}</h1>
    <h6>Count of news: {{ $category->published_news_count }}</h6>

    @include('categories.parts.paginator')

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
            @foreach($news as $oneNews)
                <tr class="cursor-pointer" onclick="window.location = '/news/{{$category->title_transliteration}}/{{$oneNews->news_id}}-{{$oneNews->news_header_transliteration}}'">
                    <th scope="row">{{ $oneNews->news_id }}</th>
                    <td><img src="{{$oneNews->news_preview_img}}" alt="Изображение недоступно"></td>
                    <td class="text-nowrap">{{ $oneNews->news_publish_date }}</td>
                    <td>{{ $oneNews->news_header }}</td>
                    <td>{{ $oneNews->news_preview_text }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
