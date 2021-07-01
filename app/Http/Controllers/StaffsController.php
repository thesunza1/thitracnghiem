<?php

namespace App\Http\Controllers;

use App\Models\Branchs;
use Illuminate\Http\Request;
use App\Models\Staffs;
use Carbon\Carbon;

class StaffsController extends Controller
{


    public function index(){


        $staffs = Staffs::all() ;
        $branchs = Branchs::all();
        return view('staffs.home' )
            ->with('staffs',$staffs)
            ->with('branchs',$branchs);
    }

    public function show($id) {
        $staff = Staffs::find($id);
        return $staff;

    }
    public function update(Request $request) {
        $data = $request->all();


    }
    public function storge(Request $request){


    }

}
