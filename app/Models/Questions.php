<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relies;

class Questions extends Model
{
    use HasFactory;
    // const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    protected $fillable = ['content','level_id','theme_id','staffcreated_id','created_at'];
    public function relies(){
        return $this->hasMany(Relies::class , 'question_id');
    }
}
