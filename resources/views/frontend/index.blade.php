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
                                    <img class="related-img card-img-top" src="{{ asset('uploads/post/' . $item->image) }}"
                                        alt="Card image cap" style="object-fit:cover;">
                                    <div class="related-body card-body p-4">
                                        <h5 class="card-title h6 m-0 semi-bold-600 text-dark">{{ $item->title }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-primary light-300">Chi tiết</span>
                                            <div class="light-300">
                                                <i class='bx-fw bx bx-heart me-1'></i>

                                                <?php
                                                $con = mysqli_connect('localhost', 'root', '', 'ngocbao');
                                                $dash_comment_query = 'SELECT * from comments where post_id = 1';
                                                $dash_comment_query_run = mysqli_query($con, $dash_comment_query);
                                                
                                                if ($comment_total = mysqli_num_rows($dash_comment_query_run)) {
                                                    echo '<i class="bx-fw bx bx-chat    ms-1 me-1"></i> ' . $comment_total;
                                                } else {
                                                    echo '<h3 class="card-title mb-2"> No Data</h3>';
                                                }
                                                
                                                ?>
                                            </div>
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
