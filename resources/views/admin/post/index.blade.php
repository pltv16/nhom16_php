@extends('layouts.master')

@section('title', 'Bài viết')

@section('content')

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete-post') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xoá bài viết</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="post_id" name="post_delete_id">
                        <h5>Bạn có thật sự muốn xoá bài viết?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                        <button type="submit" class="btn btn-danger">Xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                                <td><img src="{{ asset('uploads/post/' . $item->image) }}" alt=""
                                        style="width: 150px; height:150px; object-fit:cover;"></td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>

                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-post/' . $item->id) }}" class="btn btn-primary">Chỉnh
                                        sửa</a>

                                </td>
                                <td>
                                    {{-- <a href="{{ url('admin/delete-post/'.$item->id) }}"class="btn btn-danger">Xoá</a> --}}
                                    <button type="button" class="btn btn-danger deletePostBtn"
                                        value="{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.deletePostBtn').click(function(e) {
                e.preventDefault();

                var post_id = $(this).val();
                $('#post_id').val(post_id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection
