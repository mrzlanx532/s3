@extends('layouts/base')

@section('title')
    S3
@endsection

@section('content')
    <h1>News categories</h1>
    <table class="table table-hover mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Publish news count</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoriesWithPublishedNewsCount as $category)
            <tr class="cursor-pointer" onclick="window.location = '/{{$category->title}}'">
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->published_news_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
