<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FCommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect('f-detail-post/'.$request->post_id)->with('success', 'Thêm bình luận thành công');
    }
}
