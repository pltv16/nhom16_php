<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function showFormProfile()
    {
        return view('admin.profile.update-profile');
    }
    public function updateProfile(Request $request)
    {   
        $request->validate([
            'name'=>['required'],
        ],
        [
            'name.required'=>'Hãy nhập tên',
        ]
    );
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/avt/', $filename);
            $user->image = $filename;
        }

        $user->save();
        return redirect()->route('show-form-profile')->with('success', 'Cập nhật thành công!');
    }
}
