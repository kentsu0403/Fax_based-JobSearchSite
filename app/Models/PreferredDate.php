<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferredDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'preferred_date_1',
        'preferred_date_2',
        'preferred_date_3',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'application_id');
    }
}
