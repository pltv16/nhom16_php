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

    public function showFormProfile()
    {
        return view('admin.profile.update-profile');
    }
    public function updateProfile(Request $request)
    {   
        $request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required','min:10']
        ],
        [
            'name.required'=>'Hãy nhập tên',
            'address.required'=>'Hãy nhập địa chỉ',
            'phone.required'=>'Hãy nhập số điện thoại',
            'phone.min'=>'Hãy nhập đúng định dạng số điện thoại(Có 10 số)'
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
