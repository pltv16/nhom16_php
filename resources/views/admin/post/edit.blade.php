@extends('layouts.master')

@section('title', 'Bài viết')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Cập nhật bài viết
                    <a href="{{ route('post') }}" class="btn btn-danger float-end">Quay lại</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control" required>
                            <option value="">--Chọn danh mục--</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Nội dung</label>
                        <input type="text" name="content" value="{{ $post->content }}" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="image" value="{{ $post->image }}" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
