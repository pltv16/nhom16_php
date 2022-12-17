<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));;
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required'],
                'content' => ['required'],
            ],
            [
                'title.required' => 'Hãy nhập tên tiêu đề',
                'content.required' => 'Hãy nhập nội dung',
            ],
        );
        $filename = null;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
        }
        Post::create([
            'cate_id' => $request->cate_id,
            'typepost' => $request->typepost,
            'title' => $request->title,
            'content' => $request->content,
            'created_by' => Auth::user()->id,
            'image' => $filename
        ]);
        return redirect('admin/post')->with('message', 'Thêm bài viết thành công');
    }

    public function edit($id)
    {
        $category = Category::all();
        $post = Post::find($id);
        return view('admin.post.edit', compact('post', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [   
                'title' => ['required'],
                'content' => ['required'],
            ],
            [   
                'title.required' => 'Hãy nhập tên tiêu đề',
                'content.required' => 'Hãy nhập nội dung',
            ],
        );
        $post = Post::find($id);
        $post->cate_id = $request->cate_id;
        $post->typepost = $request->typepost;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_by = Auth::user()->id;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }

        $post->update();

        return redirect()->back()->with('success','Chỉnh sửa bài viết thành công');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
            $post->delete();
            return redirect()->back()->with('success','Xoá bài viết thành công');
    }

    public function trash()
    {
        $post = Post::onlyTrashed()->get();
        return view('admin.post.trash',compact('post'));
    }

    public function untrash($id)
    {
        $post =Post::withTrashed()-> find($id);
        $post->restore();
        return redirect()->back()->with('success','Khôi phục bài viết thành công');

    }

    public function forcedel($id)
    {
        $post =Post::withTrashed()-> find($id);
        $post->forceDelete();
        return redirect()->back()->with('success','Xoá vĩnh viễn bài viết thành công');

    }
   
}
