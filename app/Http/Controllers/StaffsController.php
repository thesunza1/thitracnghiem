<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffs;

class StaffsController extends Controller
{
    //
    public function index() {
        $id = 1;
        $staff= Staffs::find($id);
        $staff->branch;
        dd($staff->branch->name);
    }
}
