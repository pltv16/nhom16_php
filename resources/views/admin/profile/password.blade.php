@extends('layouts.master')

@section('title','Tài khoản')

@section('content')

<div>
  <a href="{{ route('profile') }}">
    <button type="submit" class="btn rounded-pill text-light px-4 light-300" style="margin: 10px; background-color: #4232c2;border-color: #ffff">Tài khoản</button>
  </a>
  <a href="#">
    <button type="submit" class="btn rounded-pill px-4 light-300" style="margin: 10px; background-color: #ffff;border-color:#4232c2 " style="color: #0000;font-family: 'Open Sans', sans-serif !important;
    font-weight: 300;">Quản lý bài viết</button>
  </a>
  <a href="{{ route('show-form-profile') }}">
    <button type="submit" class="btn rounded-pill text-light px-4 light-300 " style="margin: 10px; background-color:  #4232c2;border-color: #ffff">Cập nhật tài khoản</button>
  </a>
  <a href="{{ route('show-form-password') }}">
    <button type="submit" class="btn rounded-pill px-4 light-300" style="margin: 10px; background-color: #ffff;border-color:#4232c2 " style="color: #0000;font-family: 'Open Sans', sans-serif !important;
    font-weight: 300;">Đổi mật khẩu</button>
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
       
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form id="formAccountSettings" action="{{ route('change-password') }}" method="POST">
            @csrf
            @method('PUT')
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <div class="card-body">
              <div class="row">
                <div class="mb-3 form-password-toggle">

                    <label class="form-label" for="phoneNumber">Mật khẩu cũ</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="text"
                        id="phoneNumber"
                        name="oldPassword"
                        class="form-control"
                        placeholder="Nhập mật khẩu cũ"
                        
                      />
                    </div>
                  </div>
                  <div class="mb-3 form-password-toggle">

                    <label class="form-label" for="phoneNumber">Mật khẩu mới</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="text"
                        id="phoneNumber"
                        name="newPassword"
                        class="form-control"
                        placeholder="Nhập mật khẩu mới"
                        
                      />
                    </div>
                  </div>
                  <div class="mb-3 form-password-toggle">

                    <label class="form-label" for="phoneNumber">Xác nhận mật khẩu</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="text"
                        id="phoneNumber"
                        name="confirmPassword"
                        class="form-control"
                        placeholder="Nhập lại mật khẩu mới"
                        
                      />
                    </div>
                  </div>
              </div>
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
@endsection
