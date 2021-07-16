<?php

namespace App\Http\Controllers;

use App\Models\Contests;

use Illuminate\Http\Request;

use App\Models\Branchs;
use App\Models\Staffs;
use App\Models\Themes;
use App\Models\Levels;
use App\Models\Exams;
use App\Models\ExamThemes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContestsController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')   ;
    }
    //
    public function home() {
        $contests = Contests::all();
        return view('home')->with('contests',$contests);
    }


    public function index()
    {
        $contests = Contests::all();
        return view('contests/home')->with('contests', $contests);
    }

    public function add()
    {
        $branchs = Branchs::all();
        return view('contests/add')->with('branchs', $branchs);
    }

    public function getValues(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    public function create(Request $request)
    {
        $data = $this->getValues($request);
        $contest = new Contests();
        $contest->name = $data['contest'];
        $contest->branchcontest_id = $data['branch'];
        $time = str_replace("T"," ", $data['begin_time']);
        $time = date_create($time.":00");
        $contest->begintime_at = $time;
        $contest->content = $data['content'];
        $contest->testmaker_id = Auth::user()->id;
        // dd($contest);
        $contest->save();
        return Redirect('/contests');
    }

    public function edit($id)
    {
        $contest = Contests::find($id);
        $staffs = Staffs::all();
        $branchs = Branchs::all();
        return view('contests/edit')->with('staffs', $staffs)->with('branchs', $branchs)->with('contest', $contest);
    }

    public function update($id, Request $request)
    {
        $data = $this->getValues($request);
        $contest = Contests::find($id);
        $contest->name = $data['contest'];
        $contest->branchcontest_id = $data['branch'];
        $time = str_replace("T"," ", $data['begintime_at']);
        $time = date_create($time.":00");
        $contest->begintime_at = $time;
        $contest->content = $data['content'];
        $contest->testmaker_id = $data['test_maker_id'];
        $contest->save();
        return Redirect()->back();
        dd($contest);
    }

    public function detail($id)
    {
        $contest = Contests::find($id);
        $staffs = Staffs::all();
        $branchs = Branchs::all();
        $themes = Themes::all();
        $levels = Levels::all();
        $exams = Exams::where('contest_id', '=', $id)->get();
        return view('contests/detail')
        ->with('contest', $contest)->with('staffs', $staffs)
        ->with('branchs', $branchs)->with('themes', $themes)
        ->with('levels', $levels)->with('exams', $exams);
    }

    public function delete($id)
    {
        $contest = Contests::find($id);
        $contest->delete();
        return redirect()->back();
        dd($contest);

    }
}
