<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $post = DB::table('posts')->where('deleted_at',null)->orderBy('created_at', 'DESC')
        ->get();
        return view('frontend.index',compact('post'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $post = Post::where('title', 'like',"%$search%")->get();
        return view('frontend.search.index',compact('post'));
    }
}
