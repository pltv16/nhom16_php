<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;

class FPasswordController extends Controller
{
    public function showFormPassword()
    {
        return view('frontend.profile.password');
    }

    public function changePassword(Request $request)
    {   
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ],
            [
                'current_password.required' =>'Hãy nhập mật khẩu cũ',
                'new_password.required' =>'Hãy nhập mật khẩu mới',
                'new_password.min' =>'Mật khẩu tối thiểu 8 kí tự',
                'new_confirm_password.same' =>'Xác nhận mật khẩu không trùng khớp',
            ]
        );
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ],
            [
                'current_password.required' =>'Hãy nhập mật khẩu cũ',
                'new_password.required' =>'Hãy nhập mật khẩu mới',
                'new_confirm_password.same' =>'Xác nhận mật khẩu không trùng khớp',
            ]
        );
        User::find(auth()->user()->id)->update(['password' => bcrypt($request->new_password)]);
        return redirect()->route('f-show-form-password')->with('success', 'Đổi mật khẩu thành công!');
    }
}
