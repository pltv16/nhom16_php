<?php

namespace App\Http\Controllers\Frontend;

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
}
