<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
       return view('admin.post.index',compact('post'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.post.create',compact('category'));;
    }

    public function store(Request $request)
    {
        $filename = null;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
        }
        Post::create([
            'cate_id' => $request->cate_id, 
            'title' => $request->title,
            'content' => $request->content,
            'created_by' => Auth::user()->id,
            'image' => $filename
        ]);
        return redirect('admin/post')->with('message','Thêm bài viết thành công');
    }

    public function edit($id)
    {
        $category = Category::all();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','category'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->cate_id = $request->cate_id;
        $post->title =$request->title;
        $post->content =$request->content;
        $post->created_by = Auth::user()->id;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }

        $post->update();

        return redirect('admin/post')->with('message','Cập nhật bài viết thành công'); 
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($id)
        {
            $post->delete();
            return redirect('admin/post')->with('message','Xoá bài viết thành công!');
    
        }
        else
        {
            return redirect('admin/post')->with('message','Bài viết không tồn tại');

        }
    }
   
}

