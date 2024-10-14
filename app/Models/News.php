<?php

// app/Models/News.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
