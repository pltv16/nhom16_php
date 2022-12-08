<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');       
    }
   
    public function view_edit()
    {
       return view('frontend.profile.view-edit');
    }

    public function profile(Request $request)
    {
        $user= User::find(auth()->id());
        $user->name=$request->name;
        $user->address=$request->address;
        $user->phone=$request->phone;

        $user->save();

        return redirect()->route('f-view-edit')->with('success','Cập nhật thành công!');

    }
}
