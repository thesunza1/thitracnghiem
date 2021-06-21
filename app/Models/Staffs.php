<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branchs;

class Staffs extends Model
{
    use HasFactory;
    public function branch() {
        return $this->belongsTo(Branchs::class, 'branch_id');
    }
}
