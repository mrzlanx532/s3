<?php

namespace App\Model;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class News extends Model
{
    const STATE_UNPUBLISHED = 0;
    const STATE_PUBLISHED = 1;

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    /**
     * @throws Exception
     */
    public function getPublishDateAttribute($value)
    {
        return (new \DateTime($value))->format('d-m-Y H:s');
    }

    public function resolveRouteBinding($value)
    {
        return $this->where([
            'id' => Str::before($value, '-'),
            'header_transliteration' => Str::after($value, '-'),
            'state' => News::STATE_PUBLISHED
        ])->firstOrFail();
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->header_transliteration = \URLify::slug($model->header);
        });
    }
}
