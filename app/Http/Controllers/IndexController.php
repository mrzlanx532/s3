<?php

namespace App\Http\Controllers;

use App\Model\Categories;

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
}
