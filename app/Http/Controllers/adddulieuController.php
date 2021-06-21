<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branchs;
use App\Models\Themes;
use App\Models\Levels;
use App\Models\Staffs;

class adddulieuController extends Controller
{
    //
    public function themlevel () {
        Levels::insert([

            'difficult' => 'easy',
            'coefficient' => 1.0,
        ]);
        Levels::insert([

            'difficult' => 'medium',
            'coefficient' => 1.5,
        ]);
        Levels::insert([

            'difficult' => 'hard',
            'coefficient' => 2.0,
        ]);
    }

    public function thembranch() {
        $branch= Branchs::factory()->count(8)->create();
        dd($branch);
    }

    public function themtheme() {
        $theme= Themes::factory()->count(4)->create();
        dd($theme);
    }
    public function themstaff() {
        $data = [
            'email' => 'quynhtran1@gmail.com',
            'password' => '1',
            'name' => 'manh quynh',
            'sdt' => '1234587',
            'address' => 'vinh long',
            'branch_id' => 2,
            'role' => 0
        ];
        Staffs::insert($data);
    }


}
