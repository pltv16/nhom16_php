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
    public function edit($id)
    {
        $post=Post::find($id);
        $comment=Comment::find($id);
        return view('frontend.comment.edit', compact('post', 'comment'));
    }
    public function update(Request $request, $id)
    {   
        $request->validate([
            'content'=>['required'],
        ],
        ['content.required'=>'Hãy nhập nội dung bình luận']
        );
        $comment = Comment::find($id);
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->update();

        return redirect('f-detail-manage-post/'.$comment->post_id)->with('success', 'Sửa bình luận thành công');
    }

    public function destroy($id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success','Xoá bình luận thành công');
    }
}
