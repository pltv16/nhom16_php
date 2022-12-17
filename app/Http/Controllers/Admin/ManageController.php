<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    public function index()
    {
        $post = DB::table('posts')->where(['created_by' => Auth::user()->id, 'deleted_at' =>null])
        ->orderBy('created_at', 'DESC')->get();        
        return view('admin.manage.index',compact('post'));
    }

    public function detail($id)
    {
        $post = Post::find($id);
        return view('admin.manage.detail', compact('post'));
    }

    public function editmanage($id)
    {
        $category = Category::all();
        $post = Post::find($id);
        return view('admin.manage.edit', compact('post', 'category'));
    }

    public function updatemanage(Request $request, $id)
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

   public function trash()
   {
    $post = Post::onlyTrashed()->where(['created_by' => Auth::user()->id])->get();
    return view('admin.manage.trash',compact('post'));
   }

   public function destroymanage($id)
   {
       $post = Post::find($id);
           $post->delete();
           return redirect()->route('post-manage',compact('post'))->with('success','Xoá bài viết thành công');
   }
}
