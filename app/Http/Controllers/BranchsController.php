<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branchs;



class BranchsController extends Controller
{
    //
    public function __construct()
    {
     $this->middleware('auth')   ;
    }
    public function index()
    {
        $branchs = Branchs::all() ;
        return view('branchs.home')
            ->with('branchs', $branchs);
    }

    public function show($id)
    {
        $branch = Branchs::find($id) ;

        return $branch;
    }
    public function getdata(Request $request)
    {
        $data = $request->all();
        return $data;
    }
    public function update(Request $request){

        $branch = Branchs::find($request->id) ;
        $branch->name = $request->name;
        $branch->address = "$request->address";

        $branch->created_at = $request->created;
        $branch->save();

        return redirect(route('branch.index'));
    }
    public function storge(Request $request)
    {
        $date = str_replace('T',' ',$request->created);
        $date = date_create($date.':00');
        $branch = Branchs::insert([
            'name' => $request->name,
            'address' => "$request->address",

            'created_at' =>$date,
        ]);

        return redirect(route('branch.index'));
    }
    public function drop(Request $request)
    {
        $dl = Branchs::where('id',$request->id)->delete();
        return redirect(route('branch.index'));
    }
}
