@extends('layouts.master')

@section('title', 'Tài khoản')

@section('content')

    <div class="container-fluid px-4">

        <div class="card mt-4">

            <div class="card-header">
                <h4>Bình luận</h4>
            </div>
            <div class="card-body">

                <table id="myDataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Tài khoản</td>
                            <td>ID bài viết</td>
                            <td>Nội dung</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comment as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name}}</td>
                                <td>{{ $item->post_id }}</td>
                                <td>{{ $item->content }}</td>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
