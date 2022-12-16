@extends('layouts.frontend')



@section('content')
    <div>
        <a href="{{ route('f-profile') }}">
            <button type="submit" class="btn rounded-pill text-light px-4 light-300"
                style="margin: 10px; background-color: #4232c2;border-color: #ffff">Tài khoản</button>
        </a>
        <a href="{{ route('f-post-manage') }}">
            <button type="submit" class="btn rounded-pill px-4 light-300"
                style="margin: 10px; background-color: #ffff;border-color:#4232c2 "
                style="color: #0000;font-family: 'Open Sans', sans-serif !important;font-weight: 300;">Quản lý bài
                viết</button>
        </a>
        <a href="{{ route('f-show-form-profile') }}">
            <button type="submit" class="btn rounded-pill text-light px-4 light-300 "
                style="margin: 10px; background-color:  #4232c2;border-color: #ffff">Cập nhật tài khoản</button>
        </a>
        <a href="{{ route('f-show-form-password') }}">
            <button type="submit" class="btn rounded-pill px-4 light-300"
                style="margin: 10px; background-color: #ffff;border-color:#4232c2 "
                style="color: #0000;font-family: 'Open Sans', sans-serif !important;font-weight: 300;">Đổi mật khẩu</button>
        </a>
    </div>
    <div class="py-3"></div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Mật khẩu</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Đổi mật khẩu</h5>


                    <form id="formAccountSettings" action="{{ route('f-change-password') }}" method="POST" novalidate
                        enctype="multipart/form-data">
                        @csrf

                        

                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="mb-3 form-password-toggle">
                                        @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password">Mật khẩu cũ</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control"
                                                    name="current_password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                                </div>
                                        </div>
                                        <p class="text-danger"><span class="error-message">{{ $errors->first('current_password') }}</span></p>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password">Mật khẩu mới</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control"
                                                    name="new_password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        <p class="text-danger"><span class="error-message">{{ $errors->first('new_password') }}</span></p>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password">Xác nhận mật khẩu</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control"
                                                    name="new_confirm_password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        <p class="text-danger"><span class="error-message">{{ $errors->first('new_confirm_password') }}</span></p>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                                            <button type="reset" class="btn btn-outline-secondary">Trở lại</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                </div>

            </div>
        </div>
    </div>
@endsection
