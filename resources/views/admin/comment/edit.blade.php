@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    
<div class="card mt-4">
   
    <div class="card-body">

        <form action="{{ url('admin/update-comment/'.$comment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Nội dung</label>
                <input type="text" value="{{ $comment->content }}" name="content" class="form-control">
            </div>
            @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
   
</div>

@endsection