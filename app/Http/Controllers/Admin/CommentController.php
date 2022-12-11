<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return view('admin.comment.index', compact('comment'));
    }
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect('admin/detail-post/'.$request->post_id)->with('success', 'Thêm bình luận thành công');
    }
}
