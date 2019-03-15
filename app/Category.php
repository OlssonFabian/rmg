<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
