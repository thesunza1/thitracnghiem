<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class test01 extends Controller
{

    public function index() {
        DB::table('users')->insert(['name'=>'helloo']);
        $users = DB::table('users')->get();
        echo "gia huy";
    }
}
