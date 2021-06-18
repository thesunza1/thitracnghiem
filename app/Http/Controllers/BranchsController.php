<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branchs;

class BranchsController extends Controller
{
    //

    public function testMakeBranchs() {

         $branch= Branchs::factory()->count(8)->create();
        // dd($branch);
        //$branch = Branchs::all();
        dd($branch);
    }
}
