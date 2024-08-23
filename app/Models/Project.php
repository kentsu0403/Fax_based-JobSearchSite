<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['project_name', 'project_details'];

    // Companyとの多対多リレーション
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_project', 'project_id', 'company_id');
    }

    // Applicationとのリレーション（1対多）
    public function applications()
    {
        return $this->hasMany(Application::class, 'project_id', 'project_id');
    }
}
