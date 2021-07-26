<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
