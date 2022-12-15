@extends('layouts.frontend')

@section('content')

<div class="container-fluid px-4">
    
<div class="card mt-4">
    {{-- <div class="card-header">
        <h4 class="">Cập nhật bình luận                
            <a href="{{ url('f-detail-manage-post/' .$post->id) }}" class="btn btn-danger float-end">Quay lại</a>
        </h4>

    </div> --}}
    <div class="card-body">

        <form action="{{ url('f-update-comment/'.$comment->id) }}" method="POST" enctype="multipart/form-data">
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