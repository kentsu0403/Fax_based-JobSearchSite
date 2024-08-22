<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // プライマリキーを 'project_id' に設定
    protected $primaryKey = 'project_id';

    // Eloquent にプライマリキーが自動増分であることを知らせる
    public $incrementing = true;

    // プライマリキーのタイプを整数型に設定
    protected $keyType = 'int';

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_project', 'project_id', 'company_id');
    }
}

