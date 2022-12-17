@extends('layouts.frontend')

@section('content')
    <section class="bg-light py-5">
        <div class="feature-work container my-4">    
            <div class="row d-flex d-flex align-items-center">
                <h6 class="feature-work-title h4 text-muted light-300">Loại tin: {{ $post->typepost == '1' ? 'Nhặt đồ' : 'Mất đồ'}}</h6>
                <h1 class="feature-work-heading h2 py-3 semi-bold-600">{{ $post->title }}</h1>

                <div class="col-lg-5">

                    <img  src="{{ asset('uploads/avatar/' . $post->user->image) }}" alt="user-avatar" class="d-block rounded"
                    height="100" width="100" id="uploadedAvatar">
                    <h3 class="feature-work-title h4 text-muted light-300">{{ $post->user->name }}</h3>
                    <p class="feature-work-body text-muted " style="font-size: 30px">
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
                <p class="feature-work-body text-muted light-300" style="font-size: 15px">Đã đăng lúc: {{ $post->created_at->format('h:i')}}</p>
                <p class="feature-work-body text-muted light-300" style="font-size: 15px">Ngày {{ $post->created_at->format('d')}} tháng {{ $post->created_at->format('m')}} năm {{ $post->created_at->format('Y')}}</p>

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
                        <p class="text-danger"><span class="error-message">{{ $errors->first('content') }}</span></p>
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

            @forelse ($post->comment as $item)
                <div class="row pb-4">
                    <div class="worksingle-comment-body col-md-8 m-auto">

                        <div class="d-flex">

                            <div>
                                <img class="rounded-circle" src="{{ asset('uploads/avatar/' . $post->user->image) }}"
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
                                @if (Auth::user()->id == $item->user->id)
                                <a href="{{ route('f-delete-comment', ['id' => $item->id]) }}"
                                    class="btn btn-primary btn-sm me-2">Xoá</a>
                                <a href="{{ route('f-edit-comment', ['id' => $item->id]) }}"
                                    class="btn btn-primary btn-sm me-2">Chỉnh sửa</a>
                            @endif
                            </div>
                          
                        </div>
                    </div>
                </div>
                @empty
                <h6  >Không có bình luận</h6>
                @endforelse
        </div>
        <!-- End Comment -->
       
        </div>
    </section>
@endsection
