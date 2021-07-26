<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    const STATE_UNPUBLISHED = 0;
    const STATE_PUBLISHED = 1;

    public $timestamps = false;

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public function publishedNews()
    {
        return $this->hasMany(News::class, 'category_id')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->where('news.state',News::STATE_PUBLISHED)
            ->where('news.publish_date', '<', new \DateTime())
            ->where('categories.state', '=', Categories::STATE_PUBLISHED);
    }

    public function getRouteKeyName()
    {
        return 'title_transliteration';
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->title_transliteration = \URLify::slug($model->title);
        });
    }
}
