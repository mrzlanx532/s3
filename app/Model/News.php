<?php

namespace App\Model;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
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
            'header' => Str::after($value, '-')
        ])->firstOrFail();
    }
}
