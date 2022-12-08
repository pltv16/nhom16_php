@extends('layouts.master')

@section('title','Danh mục')

@section('content')

<div class="container-fluid px-4">
    
<div class="card mt-4">
    <div class="card-header">
        <h4 class="">Cập nhật danh mục                
            <a href="{{ url('admin/category') }}" class="btn btn-danger float-end">Quay lại</a>
        </h4>

    </div>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div> 
            @endforeach
            
        </div>
            
        @endif

        <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Tên danh mục</label>
                <input type="text" value="{{ $category->name }}" name="name" class="form-control">
            </div>
            
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
   
</div>

@endsection