<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Companyモデルとの多対多のリレーションを定義
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}

