@extends('layouts.master')

@section('title', 'Dash Board')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-10 mb-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                                        alt="chart success" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="{{ route('users') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Tài khoản
                            </span>
                            @php
                            $total = DB::table('users')->count();
                            echo '<h3 class="card-title mb-2"> ' . $total . '</h3>';
                            @endphp
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/wallet-info.png') }}"
                                        alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="{{ route('category') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span>Danh mục</span>
                            @php
                            $total = DB::table('categories')->where('deleted_at',null)->count();
                            echo '<h3 class="card-title mb-2"> ' . $total . '</h3>';
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/cc-primary.png') }}"
                                        alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="{{ route('post') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Bài viết</span>
                            @php
                            $total = DB::table('posts')->where('deleted_at',null)->count();
                            echo '<h3 class="card-title mb-2"> ' . $total . '</h3>';
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
