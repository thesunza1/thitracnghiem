<?php

namespace App\Http\Controllers;

use App\Models\Branchs;
use Illuminate\Http\Request;
use App\Models\Staffs;
use App\Models\Roles;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class StaffsController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')   ;
    }

    public function index()
    {


        $staffs = Staffs::all();
        $branchs = Branchs::all();
        $roles= Roles::all();

        return view('staffs.home')
            ->with('staffs', $staffs)
            ->with('roles', $roles)
            ->with('branchs', $branchs);
    }

    public function show($id)
    {
        $staff = Staffs::find($id);
        //$branchs = Branchs::all();

        return $staff;
    }
    public function getdata(Request $request)
    {
        $data = $request->all();
        return array($data);
    }
    public function update(Request $request)
    {
        // get email, password , name , sdt , address , role
        $id = $request->id;
        $name = $request->name;
        $password = $request->password;
        $email = $request->email;
        $sdt = $request->sdt;
        $address = $request->address;
        $role  = $request->role;
        $branch  = $request->branch;


        $staff = Staffs::find($id);
        $staff->name = $name;
        $staff->email = $email;
        $staff->sdt = $sdt;
        $staff->address = $address;
        $staff->role_id = $role;
        $staff->branch_id = $branch;
        if ($password != null)    $staff->password = Hash::make($password);
        $staff->save();
        return redirect(route('staff.index'));
    }
    public function storge(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        $email = $request->email;
        $sdt = $request->sdt;
        $address = $request->address;
        $role  = $request->role;
        $branch  = $request->branch;
        Staffs::insert([
            'name' => $name,
            'email' => $email,
            'password' =>Hash::make($password),
            'sdt' => $sdt,
            'address' => $address,
            'branch_id' => $branch,
            'role_id' => $role,

        ]);

        return redirect(route('staff.index'));
    }
    public function drop(Request $request)
    {
        $id = $request->id;
        $dl = Staffs::where('id', $id)->delete();
        return redirect(route('staff.index'));
    }
}
