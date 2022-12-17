<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FPostController extends Controller
{
    public function detail($id)
    {
        $post = Post::find($id);
        return view('frontend.post.detail', compact('post'));
    }

    public function create()
    {
        $category = Category::all();
        return view('frontend.post.create', compact('category'));;
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
        return redirect('f-add-post')->with('message', 'Thêm bài viết thành công');
    }
}
