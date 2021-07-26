<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
