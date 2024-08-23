<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $primaryKey = 'application_id'; // 主キーを指定

    // フィールドのマスアサインメントを設定
    protected $fillable = [
        'project_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_birthdate',
        'notes',
        'application_date',
    ];

    // Projectとのリレーションを定義
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // PreferredDateとのリレーションを定義
    public function preferredDates()
    {
        return $this->hasOne(PreferredDate::class, 'application_id', 'application_id');
    }
}
