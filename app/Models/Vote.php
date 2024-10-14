<?php

// app/Models/Vote.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['news_id', 'user_location', 'user_age', 'vote', 'gender'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
