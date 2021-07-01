<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
