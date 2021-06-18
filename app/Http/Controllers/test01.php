<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class test01 extends Controller
{

    public function index() {

        // Staff::insert(['name'=> 'name01']);
        $alls = Staff::all();
        dd($alls);

    }
}
