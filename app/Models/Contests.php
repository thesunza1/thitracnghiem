<?php

namespace App\Models;
use App\Models\Staffs;
use App\Models\Branchs;
use App\Models\Exams;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Exams;
use App\Models\Staffs;
use App\Models\Branchs;


class Contests extends Model
{
    use HasFactory;

    const UPDATED_AT = NULL;
    // const CREATED_AT = NULL;
    protected $fillable = [
        'name',
        'testmaker_id',
        'branchcontest_id',
        'begintime_at' ,
        'created_at' ,
        'content'
    ];
    protected $casts = [
        'begintime_at' => 'timestamp'
    ];

    public function staff() {
        return $this->belongsTo(Staffs::class,'testmaker_id');
    }
    public function branch() {
        return $this->belongsTo(Branchs::class,'branchcontest_id');
    }

    public function exams()
    {
        return $this->hasMany(Exams::class);
    }

}
