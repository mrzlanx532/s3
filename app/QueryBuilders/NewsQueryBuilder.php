<?php

namespace App\QueryBuilders;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class NewsQueryBuilder
{
    public function getMostViewedNews() : Builder
    {
        return News::query()
            ->select([
                'news.id as news_id',
                'categories.title_transliteration as categories_title_transliteration',
                DB::raw("CONCAT(news.id, '-', news.header_transliteration) as news_id_dash_header_transliteration"),
                'news.preview_img as news_preview_img',
                'news.preview_text as news_preview_text'
            ])
            ->leftJoin('categories', 'categories.id', '=', 'news.category_id')
            ->where([
                'categories.state' => Categories::STATE_PUBLISHED,
                'news.state' => News::STATE_PUBLISHED,
            ])
            ->where('news.publish_date', '>', (new \DateTime())->modify('-7 days'))
            ->orderBy('news.views_count', 'desc')
            ->limit(3);
    }

    public function getNewsByCategory(Categories $category) : Builder
    {
        return News::query()
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
            ->orderBy('publish_date');
    }
}
