<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;


class QuestionsController extends Controller
{

    public function test02() {
        $question = Questions::all();

        dd($question[3]->level->id);
    }
}
