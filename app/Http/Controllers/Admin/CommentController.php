<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
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

        return redirect('admin/detail-manage-post/'.$request->post_id)->with('success', 'Thêm bình luận thành công');
    }

    public function edit($id)
    {
        $post=Post::find($id);
        $comment=Comment::find($id);
        return view('admin.comment.edit', compact('post', 'comment'));
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

        return redirect('admin/detail-manage-post/'.$comment->post_id)->with('success', 'Sửa bình luận thành công');
    }

    public function destroy($id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success','Xoá bình luận thành công');
    }
}
