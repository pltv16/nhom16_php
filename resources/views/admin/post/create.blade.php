@extends('layouts.master')

@section('title', 'Bài viết')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Thêm bài viết
                    <a href="{{ route('post') }}" class="btn btn-danger float-end">Quay lại</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('add-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" />
                    </div>
                    <p class="text-danger"><span class="error-message">{{ $errors->first('title') }}</span></p>
                    <div class="mb-3">
                        <label for="">Nội dung</label>
                        <input type="text" name="content" class="form-control" />
                    </div>
                    <p class="text-danger"><span class="error-message">{{ $errors->first('content') }}</span></p>
                    <div class="mb-3">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="image" value="" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
