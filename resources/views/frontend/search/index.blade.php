@extends('layouts.frontend')

@section('content')
    <article class="container-fluid bg-light">
        <div class="container">
            <div class="worksingle-related-header row">
                <h1 class="h2 py-5">Bài viết</h1>
                <div class="col-md-12 text-left justify-content-center">
                    <div class="row gx-5">
                            @foreach ($post as $item)
                                <div class="col-sm-6 col-lg-4 mb-5">
                                    <a
                                        href="{{ url('f-detail-post/' . $item->id) }} "class="related-content card text-decoration-none overflow-hidden h-100">
                                        <img class="related-img card-img-top"
                                            src="{{ asset('uploads/post/' . $item->image) }}" alt="Card image cap"
                                            style="object-fit:cover;">
                                        <div class="related-body card-body p-4">
                                            <h5 class="card-title h6 m-0 semi-bold-600 text-dark">{{ $item->title }}</h5>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-primary light-300">Chi tiết</span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
