<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if($category->published_news_count > 10)
            @if($page > 1)
                <li class="page-item">
                    <a class="page-link" href="/news/{{$category->title_transliteration}}?page={{$page - 1}}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
            @if(count($news) == 10 && ($category->published_news_count / $page) !== 0)
                <li class="page-item">
                    <a class="page-link" href="/news/{{$category->title_transliteration}}?page={{$page + 1}}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif
        @endif
    </ul>
</nav>
