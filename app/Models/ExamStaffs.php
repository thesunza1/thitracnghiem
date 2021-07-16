<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamStaffs extends Model
{
    use HasFactory;
    public function staff()
    {
        return $this->belongsTo(Staffs::class, 'staff_id');
    }
}
