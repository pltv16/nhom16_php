@extends('layouts.frontend')

@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('f-delete-post') }}" method="POST">
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

    <section class="bg-light py-5">
        <div class="feature-work container my-4">
            

            <a href="{{ url('f-edit-post/' . $post->id) }}" class="btn btn-primary">Chỉnh sửa</a>
            
            <button type="button" class="btn btn-danger deletePostBtn"
            value="{{ $post->id }}">Delete</button>

            <div class="row d-flex d-flex align-items-center">
                <div class="col-lg-5">
                    <h3 class="feature-work-title h4 text-muted light-300">{{ $post->user->name }}</h3>
                    <h1 class="feature-work-heading h2 py-3 semi-bold-600">{{ $post->title }}</h1>
                    <p class="feature-work-body text-muted light-300">
                        {{ $post->content }}
                    </p>
                </div>
                <div class="col-lg-6 offset-lg-1 align-left">
                    <div class="row">
                        <a class="col" data-type="image" data-fslightbox="gallery"
                            href="./assets/img/feature-work-1-large.jpg">
                            <img class="img-fluid" src="{{ asset('uploads/post/' . $post->image) }}" alt="Card image cap"
                                style="object-fit:cover;">
                        </a>

                    </div>
                </div>
            </div>

        </div>
        {{-- comment --}}
        <div>
            <div class="row justify-content-center">
                <div class="worksingle-comment-heading col-8 m-auto pb-3">
                    <h4 class="h5">Bình luận</h4>
                </div>
            </div>
            <div class="row pb-4">

                <div class="worksingle-comment-footer col-lg-8 m-auto">
                    <form class="col-md-12 m-auto" method="POST" action="{{ url('f-comment') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="form-group">
                            <textarea class="form-control" name="content"></textarea>
                            <input type=hidden name=post_id value="{{ $post->id }}" />
                        </div>

                        <div class="form-row pt-2">
                            <div class="col-md-12 col-10 text-end">
                                <button type="submit"
                                    class="btn btn-secondary text-white px-md-4 px-2 py-md-3 py-1 radius-0 light-300">Thực
                                    hiện</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End Comment Form -->

                <div class="row pb-4">
                    @forelse ($post->comment as $item)

                    <div class="worksingle-comment-body col-md-8 m-auto">

                        <div class="d-flex">

                            <div>
                                <img class="rounded-circle" src="{{ asset('user/assets/img/team-05.jpg') }}"
                                        style="width: 50px;">
                                </div>
                                <div class="comment-body">


                                <div class="comment-header d-flex justify-content-between ms-3">

                                    <div class="header text-start">
                                        <h5 class="h6">{{ $item->user->name }}</h5>

                                        <p class="text-muted light-300">{{ $item->created_at->format('d-m-Y h-m') }}</p>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="card-body border ms-3 light-300">
                                        {{ $item->content }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    @empty
                    <h6>Không có bình luận</h6>
                    @endforelse
            
                </div>
        </div>
        
        </div>
        
        </div>
        <!-- End Comment -->
    </section>  
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
