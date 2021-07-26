<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function categories()
    {
        return $this->hasOne(Categories::class);
    }
}
