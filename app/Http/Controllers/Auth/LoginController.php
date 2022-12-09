<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ],[
            'email.required'=>'Hãy nhập email',
            'email.email'=>'Email chưa đúng định dạng(có kí tự @gmail)',
            'password.required'=>'Hãy nhập password',
        ]);
        if (Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ])) {
            return redirect()->route('timdothatlac');
        }

        return redirect()->route('show-form-login')->with('error', "Email hoặc mật khẩu không chính xác");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show-form-login');
    }

    public function authenticated()
    {
        if (Auth::user()->roles_as == '1') {
            return redirect()->route('admin/dashboard')->with('status', 'Chào mừng Quản Trị Viên');
        } else if (Auth::user()->roles_as == '0') {
            return redirect('/timdothatlac')->with('status', 'Đăng nhập thành công');
        }
    }
}
