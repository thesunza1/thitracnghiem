<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contests;
use App\Models\Branchs;
use Illuminate\Support\Facades\Auth;

class ContestsController extends Controller
{
    public function index()
    {
        $contests = Contests::all();
        return view('exams/home')->with('contests', $contests);
    }

    public function add()
    {
        $branchs = Branchs::all();
        return view('exams/add')->with('branchs', $branchs);
    }

    public function getValues(Request $request)
    {
        $data = $request->all();
        return $data;
        // return  [
        //         'name' => $request->contest,
        //         'branch' => $request->branch,
        //         'begin_time' => $request->begin_time
        //     ];
    }

    public function create(Request $request)
    {
        $data = $this->getValues($request);
        $contest = new Contests();
        $contest->name = $data['contest'];
        $contest->branchcontest_id = $data['branch'];
        $time = str_replace("T"," ", $data['begin_time']);
        $time = date_create($time.":00");
        // $contest->begintime_at = date_timestamp_get($time);
        $contest->begintime_at = $time;
        $contest->content = $data['content'];
        $contest->testmaker_id = Auth::user()->id;
        // dd($contest);
        $contest->save();
    }
}
