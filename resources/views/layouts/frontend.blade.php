<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tìm đồ thất lạc</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ asset('user/assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="{{ asset('user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font CSS -->
    <link href="{{ asset('user/assets/css/boxicon.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/templatemo.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    <!--
    
TemplateMo 561 Purple Buzz

https://templatemo.com/tm-561-purple-buzz

-->
</head>

<body>
    @include('layouts.layouts-user.frontend-navbar')
    <section class="service-wrapper py-3">
        <div class="service-tag bg-secondary" style="padding: 30px">
            <div class="col-md-12">
                <ul class="nav d-flex justify-content-center">
                    <li class="nav-item mx-lg-4">
                        <a class=" nav-link btn-outline-primary rounded-pill text-light px-4 light-300"
                            href="{{ route('timdothatlac') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class=" nav-link btn-outline-primary rounded-pill text-light px-4 light-300"
                            href="{{ route('f-add-post') }}">Đăng bài</a>
                    </li>
                    {{-- <li class="nav-item mx-lg-4">
                            <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".graphic">Danh mục</a>
                        </li> --}}
                    <li class="filter-btn nav-item mx-lg-4">
                        <a class=" nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#"
                            data-filter=".ui">Bài viết</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class=" nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#"
                            data-filter=".branding">Mẹo tìm đồ</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class=" nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#"
                            data-filter=".branding">Danh sách lừa đảo</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="container overflow-hidden py-5">

        @yield('content')
    </section>

    @include('layouts.layouts-user.frontend-footer')




    <!-- Bootstrap -->
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Load jQuery require for isotope -->
    <script src="{{ asset('user/assets/js/jquery.min.js') }}"></script>
    <!-- Isotope -->
    <script src="{{ asset('user/assets/js/isotope.pkgd.js') }}"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="{{ asset('user/assets/js/templatemo.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('user/assets/js/custom.js') }}"></script>

</body>

</html>


{{-- <@php
$category = App\Models\Category::all();
@endphp @foreach ($category as $item)
<li class="nav-item">
    <a class="nav-link" href="#" style="color:black">{{ $item->name }}</a>
</li>
@endforeach --}}
