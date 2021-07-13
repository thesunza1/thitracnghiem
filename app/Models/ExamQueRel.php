<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExamStaffs;
use App\Models\Questions;
use App\Models\Relies;


class ExamQueRel extends Model
{
    use HasFactory;

    public function examstaffs() {
        return $this->belongsTo(ExamStaffs::class, 'exam_staff_id');
    }

    public function questions() {
        return $this->belongsTo(Questions::class,'question_id') ;

    }

    public function relies() {
        return $this->belongsTo(Relies::class,'relies_id');
    }
}
