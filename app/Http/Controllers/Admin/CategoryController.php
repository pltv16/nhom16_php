<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;



class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required']
            ],
            [
                'name.required'=>'Hãy nhập tên danh mục'
            ]
        );
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect('admin/category')->with('message', 'Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {   $request->validate(
        [
            'name' => ['required']
        ],
        [
            'name.required'=>'Hãy nhập tên danh mục'
        ]
    );
        $category = Category::find($id);
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;

        $category->update();

        return redirect('admin/category')->with('message', 'Cập nhật danh mục thành công');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
            $category->posts()->delete();
            $category->delete();
            return redirect()->back()->with('success','Xoá danh mục thành công');
        }
    public function trash()
    {
        $category = Category::onlyTrashed()->get();
        return view('admin.category.trash',compact('category'));
    }

    public function untrash($id)
    {
        $category =Category::withTrashed()-> find($id);
        $category->restore();
        $category->posts()->restore();
        return redirect()->back()->with('success','Khôi phục danh mục thành công');

    }

    public function forcedel($id)
    {
        $category =Category::withTrashed()-> find($id);
        $category->forceDelete();
        $category->posts()->forceDelete();
        return redirect()->back()->with('success','Xoá vĩnh viễn danh mục thành công');

    }
}
