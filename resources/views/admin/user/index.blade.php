@extends('layouts.master')

@section('title','Tài khoản')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        
        <div class="card-header">
            <h4>Tài khoản người dùng</h4>
        </div>
        <div class="card-body">
            
             @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
              @endif
              <table id="myDataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Tên tài khoản</td>
                        <td>Email</td>
                        <td>Chức vụ</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->roles_as == '1' ? 'Admin' : 'User' }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>

                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
    </div>
        
</div>
@endsection