<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branchs;
use App\Models\Themes;

class BranchsController extends Controller
{
    //

    public function testMakeBranchs() {

        $branch= Branchs::factory()->count(8)->create();

        $theme= Themes::factory()->count(4)->create();

        dd($theme);
    }
}
