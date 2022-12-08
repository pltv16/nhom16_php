@extends('layouts.frontend')

@section('content')

        <section class="bg-light py-5">
            <div class="feature-work container my-4">
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
                            <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-1-large.jpg">
                                <img class="img-fluid" src="{{asset('uploads/post/'.$post->image )}}"  alt="Card image cap" style="object-fit:cover;">
                            </a>
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="worksingle-comment-heading col-8 m-auto pb-3">
                    <h4 class="h5">Bình luận</h4>
                </div>
            </div>
            <div class="row pb-4">
                <div class="worksingle-comment-footer col-lg-8 m-auto">
                    <form class="col-md-12 m-auto" method="POST" action="#" role="form">
    
                        <div class="form-group">
                            <label class="pb-2 pt-sm-0 pt-4 light-300" for="inputmessage"></label>
                            <textarea class="form-control form-control-lg light-300" id="inputmessage" name="inputmessage" placeholder="Viết bình luận..." rows="1"></textarea>
                        </div>
    
                        <div class="form-row pt-2">
                            <div class="col-md-12 col-10 text-end">
                                <button type="submit" class="btn btn-secondary text-white px-md-4 px-2 py-md-3 py-1 radius-0 light-300">Thực hiện</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End Comment Form -->
    
            <div class="row pb-4">
                <div class="worksingle-comment-body col-md-8 m-auto">
                    <div class="d-flex">
                        <div>
                            <img class="rounded-circle" src="{{ asset('user/assets/img/team-05.jpg') }}" style="width: 50px;">
                        </div>
                        <div class="comment-body">
                            <div class="comment-header d-flex justify-content-between ms-3">
                                <div class="header text-start">
                                    <h5 class="h6">John Doe</h5>
                                    <p class="text-muted light-300">10 mins ago</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="card-body border ms-3 light-300">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Comment -->
    
        </section>
@endsection
