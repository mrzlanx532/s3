<div class="container mt-5">
    <div>Самые просматриваемые новости</div>
    <div class="row mt-5">
        @foreach($mostViewedNews as $oneNews)
            <div class="col-sm cursor-pointer" onclick="window.location = '/news/{{$oneNews->categories_title_transliteration}}/{{$oneNews->news_id_dash_header_transliteration}}'">
                <img class="most-viewed-news__img" src="{{$oneNews->news_preview_img}}" alt="">
                <div class="mt-2">{{$oneNews->news_preview_text}}</div>
            </div>
        @endforeach
    </div>
</div>
