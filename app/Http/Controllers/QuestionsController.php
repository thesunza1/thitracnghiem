<?php

namespace App\Http\Controllers;
use App\Models\Questions;
use App\Models\Relies;
use App\Models\Levels;
use App\Models\Themes;
use App\Models\Staffs;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //
    public function index()
    {
        $questions = Questions::all();
        // dd($questions);
        $levels = Levels::all();
        $themes = Themes::all();
        $staffs = Staffs::all();
        return view('questions/home')->with('levels', $levels)->with('questions', $questions)->with('themes', $themes)->with('staffs', $staffs);
    }

    public function detail($id) {
        $question = Questions::find($id);
        return response()->json($question, 200);
    }

    public function edit($id) {
        $question = Questions::find($id);
        $levels = Levels::all();
        $themes = Themes::all();
        $staffs = Staffs::all();
        return view('questions.edit')->with('question', $question)->with('levels', $levels)->with('staffs', $staffs)->with('themes', $themes);
    }

    public function update(Request $request){
        $question = Questions::find($request->id);
        $question->level_id = $request->level;
        $question->theme_id = $request->theme;
        $question->content = $request->content;

        $input = $request->except(['_token','id','level','theme','content']);
        foreach($question->relies as $rel){
            $rel->noidung = array_shift($input);
            $rel->save();
        }
        $question->save();
        return redirect('/question/edit/' . $request->id);
    }

    public function add(){
        return view('questions.add');
    }

    public function create(Request $request){
        $i = 1;
        foreach ($request->question as $q)
        {
            $question = new Questions();
            $question->content = $q;
            $question->level_id = $request->level;
            $question->theme_id = $request->topic;
            $question->staffcreated_id = "1"; //set cứng do chưa có người đăng nhập
            $question->save();

            $length = count($request->answer[$i]);
            for($j=1; $j<= $length; $j++)
            {
                $answer = new Relies();
                $answer->noidung = $request->answer[$i][$j];
                if(isset($request->iscorrect[$i][$j])){
                    $answer->answer = 1;
                }
                else{
                    $answer->answer = 0;
                }
                $question->relies()->save($answer);
            }
            $i++;
        }
        // dd($request->all());
        return redirect('/questions');
    }
}
