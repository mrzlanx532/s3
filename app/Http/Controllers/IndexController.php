<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categoriesWithPublishedNewsCount = Categories::withCount('publishedNews')->get();

        return view('index', [
          'categoriesWithPublishedNewsCount' => $categoriesWithPublishedNewsCount
        ]);
    }

    public function showCategory(Request $request, Categories $category)
    {
        $category->loadCount('publishedNews');

        $newsBuilder = News::query()
            ->select([
                'categories.title as category_title',
                'news.id as news_id',
                'news.header_transliteration as news_header_transliteration',
                'news.preview_img as news_preview_img',
                'news.publish_date as news_publish_date',
                'news.header as news_header',
                'news.preview_text as news_preview_text'
            ])
            ->leftjoin('categories', 'news.category_id', '=', 'categories.id')
            ->where('categories.id', '=', $category->id)
            ->where('categories.state', '=', Categories::STATE_PUBLISHED)
            ->where('news.state', '=', News::STATE_PUBLISHED)
            ->where('news.publish_date', '<', new \DateTime())
            ->orderBy('publish_date')
            ->limit(10);

        if ($request->get('page')) {
            $newsBuilder->offset($request->get('page') * 10 - 10);
        }

        return view('categories.show', [
            'category' => $category,
            'news' => $newsBuilder->get(),
            'page' => $request->get('page') ? $request->get('page') : 1
        ]);
    }

    public function showNews(Categories $category, News $news)
    {
        $news = News::query();



        return view('news.show', [
            'news' => $news,
        ]);
    }
}
