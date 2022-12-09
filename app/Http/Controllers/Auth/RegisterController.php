<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function showFormRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {   
        $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required'],
            'confirm-password'=>['required'],
            'confirm-password' => ['same:password'],
        ],[ 
            'name.required'=>'Hãy nhập Tên',
            'email.required'=>'Hãy nhập email',
            'email.email'=>'Email chưa đúng định dạng(có kí tự @gmail)',
            'password.required'=>'Hãy nhập password',
            'confirm-password.same' =>'Xác nhận mật khẩu không trùng khớp',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('show-form-register')->with('success', "Đăng ký thành công");
    }
}
