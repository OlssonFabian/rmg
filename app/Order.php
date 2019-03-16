<?php

namespace App;

use Carbon\Carbon;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_start',
        'date_end',
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function numberOfDays() {
        return $this->date_start->diffInDays($this->date_end, false);
    }

    public function daysUntilStart() {
        return Carbon::now()->diffInDays($this->date_start, false);
    }

    public function formatDateStart() {
        return Carbon::parse($this->date_start)->toDateString();
    }

    public function formatDateEnd() {
        return Carbon::parse($this->date_end)->toDateString();
    }
}
