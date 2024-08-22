<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // プライマリキーを 'company_id' に設定
    protected $primaryKey = 'company_id';

    // Eloquent にプライマリキーが自動増分であることを知らせる
    public $incrementing = true;

    // プライマリキーのタイプを整数型に設定
    protected $keyType = 'int';

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'company_project', 'company_id', 'project_id');
    }
}
