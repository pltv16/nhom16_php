@extends('layouts.master')

@section('title','Bài viết')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        
        <div class="card-header">
            <h4>Bài viết
                <a href="{{ route('add-post') }}" class="btn btn-primary float-end">Thêm bài viết</a>
            </h4>
        </div>
        <div class="card-body">
            
             @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
              @endif
              <table id="myDataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Hình ảnh</td>
                        <td>Danh mục</td>
                        <td>Tiêu đề</td>
                        <td>Nội dung</td>
                        <td>Tác giả</td>
                        <td>Chỉnh sửa</td>
                        <td>Xoá</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{asset('uploads/post/'.$item->image )}}" alt=""
                            style="width: 150px; height:150px; object-fit:cover;"
                            ></td>
                        <td>{{ $item->category->name}}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <a href="{{ url('admin/edit-post/'.$item->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                          
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-post/'.$item->id) }}"class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
    </div>
        
</div>
@endsection