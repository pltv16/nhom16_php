<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile');       
    }

    public function profile(Request $request)
    {

        $user= User::find(auth()->id());
        $user->name=$request->name;
        $user->address=$request->address;
        $user->phone=$request->phone;

        $user->save();
        return redirect()->route('profile')->with('success','Cập nhật thành công!');

    }
}
