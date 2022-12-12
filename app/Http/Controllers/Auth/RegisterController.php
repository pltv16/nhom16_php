<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            'password'=>['required', 'min:8'],
            'confirm-password'=>['required'],
            'confirm-password' => ['same:password'],
        ],[ 
            'name.required'=>'Hãy nhập Tên',
            'email.required'=>'Hãy nhập email',
            'email.email'=>'Email chưa đúng định dạng(có kí tự @gmail)',
            'password.required'=>'Hãy nhập mật khẩu',
            'password.min'=>'Mật khẩu tối thiểu 8 kí tự',
            'confirm-password.same' =>'Xác nhận mật khẩu không trùng khớp',
        ]);
        if(User::where('email',$request->email))
        {
            return redirect()->route('show-form-register')->with('error','Email đã tồn tại');
        }
        $user = new User();
        $user->name = $request->name;
        
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('show-form-register')->with('success', "Đăng ký thành công");
    }
}
