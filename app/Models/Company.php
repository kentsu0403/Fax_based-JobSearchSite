<?php

// Company.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'company_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['company_name', 'contact_person', 'contact_phone'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'company_project', 'company_id', 'project_id');
    }
}