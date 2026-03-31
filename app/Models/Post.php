<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function getImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/'.$this->featured_image) : null;
    }
}
