<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Relies;

class ReliesController extends Controller
{
    public function add(Request $request, $id)
    {
        $answer = new Relies();
        $answer->question_id = $id;
        $answer->noidung = $request->more_answer;
        if($request->is_correct == "on")
        {
            $answer->answer = 1;
        }else
        {
            $answer->answer = 0;
        }
        // dd($request->all());
        $answer->save();
        return redirect('/question/edit/' . $id);
    }

    public function is_correct(Request $request, $id){
        $answer = Relies::find($id);
        if($request->val == "true")
            $answer->answer = 1;
        else
            $answer->answer = 0;
        $answer->save();
        echo $request->val;
    }

    public function delete($id)
    {
        $answer = Relies::find($id);
        $answer->delete();

    }
}
