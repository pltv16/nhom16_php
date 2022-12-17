@extends('layouts.master')

@section('title', 'Bài viết')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Thùng rác
                    <a href="{{ route('post-manage') }}"><button class="btn btn-primary btn-sm float-end">Quay lại</button></a>
                </h4>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table id="myDataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Hình ảnh</td>
                            <td>Danh mục</td>
                            <td>Loại bài viết</td>
                            <td>Tiêu đề</td>
                            <td>Nội dung</td>
                            <td>Tác giả</td>
                            <td>Khôi phục</td>
                            <td>Xoá vĩnh viễn</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img src="{{ asset('uploads/post/' . $item->image) }}" alt=""
                                        style="width: 150px; height:150px; object-fit:cover;"></td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->typepost}}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>

                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <a href="{{ url('admin/post-untrash/' . $item->id) }}" class="btn btn-success">Khôi phục</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/post-forcedel/' . $item->id) }}" class="btn btn-danger">Xoá vĩnh viễn</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection