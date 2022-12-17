@extends('layouts.master')

@section('title', 'Danh mục')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Thùng rác
                    <a href="{{ route('category') }}"><button class="btn btn-primary btn-sm float-end">Quay lại</button></a>
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
                            <td>Tên danh mục</td>
                            <td>Người thực hiện</td>
                            <td>Khôi phục</td>
                            <td>Xoá vĩnh viễn</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <a href="{{ url('admin/category-untrash/' . $item->id) }}" class="btn btn-success">Khôi phục</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/category-forcedel/' . $item->id) }}" class="btn btn-danger">Xoá vĩnh viễn</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

