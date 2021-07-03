<?php

namespace App\Models;
use App\Models\Contests;
use App\Models\ExamThemes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;
    const UPDATED_AT = NULL;
    public function contest()
    {
        return $this->belongsTo(Contest::class,'contest_id');
    }

    public function exam_themes()
    {
        return $this->hasMany(ExamThemes::class, 'exam_id');
    }
}
