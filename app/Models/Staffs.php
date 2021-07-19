<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Branchs;
use App\Models\Roles;
use App\Models\ExamStaffs;


class Staffs extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $rememberTokenName = false;
    public $timestamps = false;
    protected $table ='staffs';
    protected $fillable = [
        'name',
        'email',
        'password',
        'sdt' ,
        'address' ,
        'branch_id' ,
        'role_id' ,

    ];
     protected $hidden = [
        'password',

    ];
    public function branch() {
        return $this->belongsTo(Branchs::class, 'branch_id');
    }
    public function role() {
        return $this->belongsTo(Roles::class);
    }
    public function examstaffs(){
        return $this->hasMany(ExamStaffs::class);
    }
}
