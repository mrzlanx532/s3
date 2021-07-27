<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    private $newsRepository;

    public function __construct(NewsQueryBuilder $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $categoriesWithPublishedNewsCount = Categories::withCount('publishedNews')->get();
        $mostViewedNews = $this->newsRepository->getMostViewedNews();


        return view('index', [
            'categoriesWithPublishedNewsCount' => $categoriesWithPublishedNewsCount,
            'mostViewedNews' => $mostViewedNews->get()
        ]);
    }

    public function showCategory(Request $request, Categories $category)
    {
        $category->loadCount('publishedNews');
        $newsBuilder = $this->newsRepository->getNewsByCategory($category);
        $newsBuilder->limit(10);

        if ($request->get('page')) {
            $newsBuilder->offset($request->get('page') * 10 - 10);
        }

        $mostViewedNews = $this->newsRepository->getMostViewedNews();
        $mostViewedNews->where('categories.id', $category->id);

        return view('categories.show', [
            'category' => $category,
            'news' => $newsBuilder->get(),
            'page' => $request->get('page') ? $request->get('page') : 1,
            'mostViewedNews' => $mostViewedNews->get()
        ]);
    }

    public function showNews(Route $route, Categories $category, News $news)
    {
        if ($route->originalParameter('news') !== $news->id_dash_header_transliteration)
        {
            return redirect(implode('/', [
                '/news',
                $category->title_transliteration,
                $news->id_dash_header_transliteration,
            ]));
        }

        $mostViewedNews = $this->newsRepository->getMostViewedNews();
        $mostViewedNews->whereNotIn('news.id', [$news->id]);

        return view('news.show', [
            'news' => $news,
            'mostViewedNews' => $mostViewedNews->get()
        ]);
    }
}
