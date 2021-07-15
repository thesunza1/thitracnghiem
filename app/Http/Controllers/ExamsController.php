<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;
use App\Models\ExamThemes;
use App\Models\ExamDetails;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')   ;
    }

    public function detail($id){
        $exam = Exams::find($id);
        $questions = ExamDetails::where('exam_id', $id)->get();
        return view('exams/detail')->with('questions', $questions)->with('exam', $exam);
    }

    public function add(Request $request, $id)
    {
        $exam = new Exams();
        $exam->contest_id = $id;
        $exam->issuer_id = Auth::user()->id;
        $exam->questionnum = $request->q_num;
        if(isset($request->q_mix))
            $exam->questionmix = 1;
        else
            $exam->questionmix = 0;

        if(isset($request->a_mix))
            $exam->relymix = 1;
        else
            $exam->relymix = 0;
        $exam->examtime_at = $request->examtime_at;
        $exam->save();

        for($i = 0; $i < count($request->theme); $i++)
        {
            $exam_theme = new ExamThemes();
            $exam_theme->theme_id = $request->theme[$i];
            $exam_theme->level_id = $request->level[$i];
            $exam_theme->question = $request->q_num_per_theme_level[$i];
            $exam->exam_themes()->save($exam_theme);
        }
        return redirect('/contest/detail/' . $id . "#exam");
        dd($exam_theme);
    }


    public function test03($id) {
        // echo $id ;

        $exams = Exams::where('contest_id', '=', $id)->get() ;
        // select * from exams where contest_id = 2 ;
        // dd($exams);
        // foreach($exams as $a) {
        //     echo $a->questionmix.' ';
        // }

        return view('exams.test03')->with('exams',$exams);
    }
}
