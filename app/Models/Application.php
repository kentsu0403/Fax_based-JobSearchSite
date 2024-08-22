<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_birthdate',
        'notes',
        'application_date',
    ];
}
