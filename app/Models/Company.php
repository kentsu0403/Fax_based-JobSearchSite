<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Projectモデルとの多対多のリレーションを定義
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
