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
        return view('admin.profile.index');       
    }

    public function view_edit()
    {
        return view('admin.profile.view-edit');
    }
    public function profile(Request $request)
    {

        $user= User::find(auth()->id());
        $user->name=$request->name;
        $user->address=$request->address;
        $user->phone=$request->phone;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/avt/', $filename);
            $user->image = $filename;
        }


        $user->save();
        return redirect()->route('view-edit')->with('success','Cập nhật thành công!');

    }
}
