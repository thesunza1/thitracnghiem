<?php

namespace App\Http\Controllers;

use App\Models\Contests;

use Illuminate\Http\Request;

class ContestsController extends Controller
{
    //
    public function home() {
        $contests = Contests::all();

        return view('home')->with('contests',$contests);
    }
}
