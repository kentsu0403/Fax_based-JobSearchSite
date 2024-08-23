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

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_project', 'project_id', 'company_id');
    }
}