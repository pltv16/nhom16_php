@extends('layouts.master')

@section('title', 'Danh mục')

@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-category') }}" method="POST">
            @csrf

            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="category_id" name="category_delete_id">
            <h3>Bạn có thật sự muốn xoá danh mục?</h3>
            <h5>Xoá danh mục đồng nghĩa với viêc sẽ xoá luôn bài viết chứa danh mục này.</h5>
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
                <h4>Danh mục
                    <a href="{{ route('add-category') }}" class="btn btn-primary btn-sm float-end">Thêm danh mục</a>
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
                            <td>Tên danh mục</td>
                            <td>Người thực hiện</td>
                            <td>Chỉnh sửa</td>
                            <td>Xoá</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-category/'.$item->id) }}" class="btn btn-primary">Chỉnh sửa</a>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deleteCategoryBtn"
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
            $('.deleteCategoryBtn').click(function(e) {
                e.preventDefault();

                var category_id = $(this).val();
                $('#category_id').val(category_id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection