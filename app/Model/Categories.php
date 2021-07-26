<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public function publishedNews()
    {
        return $this->hasMany(News::class, 'category_id')
            ->where('state',1)
            ->where('publish_date', '<', new \DateTime());
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
}
