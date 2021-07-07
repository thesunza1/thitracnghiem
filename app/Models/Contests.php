<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Exams;
use App\Models\Staffs;
use App\Models\Branchs;


class Contests extends Model
{
    use HasFactory;

    public function exams() {
        return $this->hasMany(Exams::class);

    }
    public function branch() {
        return $this->belongsTo(Branchs::class, 'branchcontest_id');
    }
    public function staff() {
        return $this->belongsTo(Staffs::class,'testmaker_id');

    }

}
