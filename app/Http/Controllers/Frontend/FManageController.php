<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FManageController extends Controller
{
    public function index()
    {
        $post = DB::table('posts')->where(['created_by' => Auth::user()->id, 'deleted_at' =>null])->get();
        return view('frontend.manage.index',compact('post'));
    }

    public function detail($id)
    {
        $post = Post::find($id);
        return view('frontend.manage.detail', compact('post'));
    }
}
