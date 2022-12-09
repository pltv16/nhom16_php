@extends('layouts.frontend')

@section('title', 'Tài khoản')

@section('content')

    <div>
        <a href="{{ route('f-profile') }}">
            <button type="submit" class="btn rounded-pill text-light px-4 light-300"
                style="margin: 10px; background-color: #4232c2;border-color: #ffff">Tài khoản</button>
        </a>
        <a href="#">
            <button type="submit" class="btn rounded-pill px-4 light-300"
                style="margin: 10px; background-color: #ffff;border-color:#4232c2 "
                style="color: #0000;font-family: 'Open Sans', sans-serif !important;
    font-weight: 300;">Quản lý bài
                viết</button>
        </a>
        <a href="{{ route('f-show-form-profile') }}">
            <button type="submit" class="btn rounded-pill text-light px-4 light-300 "
                style="margin: 10px; background-color:  #4232c2;border-color: #ffff">Cập nhật tài khoản</button>
        </a>
        <a href="#">
            <button type="submit" class="btn rounded-pill px-4 light-300"
                style="margin: 10px; background-color: #ffff;border-color:#4232c2 "
                style="color: #0000;font-family: 'Open Sans', sans-serif !important;
    font-weight: 300;">Đổi mật
                khẩu</button>
        </a>
    </div>
    <div class="py-3"></div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Tài khoản</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Thông tin tài khoản</h5>
                    <!-- Account -->
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form id="formAccountSettings" action="{{ route('f-update-profile') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('user/assets/img/avt.png') }}" alt="user-avatar" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar" />
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="firstName" class="form-label">Tên</label>
                                            <input class="form-control" type="text" id="firstName" name="name"
                                                value="{{ auth()->user()->name }}" autofocus />
                                        </div>
                                        <p class="text-danger"><span class="error-message">{{ $errors->first('name') }}</span></p>
                                        <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input class="form-control" type="text" id="email" name="email" disabled
                                                value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Address" value="{{ auth()->user()->address }}" />
                                        </div>
                                        <p class="text-danger"><span class="error-message">{{ $errors->first('address') }}</span></p>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="phoneNumber">Điện thoại</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">VN (+84)</span>
                                                <input type="text" id="phoneNumber" name="phone" class="form-control"
                                                    placeholder="202 555 0111" value="{{ auth()->user()->phone }}" />
                                            </div>
                                        </div>
                                        <p class="text-danger"><span class="error-message">{{ $errors->first('phone') }}</span></p>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                                        <button type="reset" class="btn btn-outline-secondary">Trở lại</button>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <hr class="my-0" />


                    <!-- /Account -->
                </div>

            </div>
        </div>
    @endsection
