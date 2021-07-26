<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\News;

class IndexController extends Controller
{
    public function index()
    {
        $categoriesWithPublishedNewsCount = Categories::withCount('publishedNews')->get();

        return view('index', [
          'categoriesWithPublishedNewsCount' => $categoriesWithPublishedNewsCount
        ]);
    }

    public function showCategory(Categories $category)
    {
        $category->loadCount('publishedNews');

        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function showNews(Categories $category, News $news)
    {
        return view('news.show', [
           'news' => $news
        ]);
    }
}
