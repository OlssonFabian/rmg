<?php

namespace App;

use App\Order;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
