<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    public function index()
    {
        $post = DB::table('posts')->where(['created_by' => Auth::user()->id, 'deleted_at' =>null])->get();
        return view('admin.manage.index',compact('post'));
    }

    public function detail($id)
    {
        $post = Post::find($id);
        return view('admin.manage.detail', compact('post'));
    }

   
}
