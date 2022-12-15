<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FCommentController extends Controller
{
    // public function index()
    // {
    //     $comment = Comment::all();
    //     return view('frontend.comment.index', compact('comment'));
    // }
    public function store(Request $request)
    {   
        $request->validate([
            'content'=>['required'],
        ],
        ['content.required'=>'Hãy nhập nội dung bình luận']
        );
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect('f-detail-post/'.$request->post_id)->with('success', 'Thêm bình luận thành công');
    }

    public function destroy($id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success','Xoá bình luận thành công');
    }
}
