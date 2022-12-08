@extends('layouts.master')

@section('title','Tài khoản')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cài đặt tài khoản /</span> Tài khoản</h4>
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
            <form id="formAccountSettings" action="{{ route('profile') }}" method="POST">
                @csrf
                @method('PUT')
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="../admin/assets/img/avatars/1.png"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Tải ảnh đại diện</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                  />
                </label>
              
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Tên</label >
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="name"
                    value="{{ auth()->user()->name }}"
                    autofocus
                  />
                </div>
               
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="{{ auth()->user()->email }}"
                    placeholder="john.doe@example.com"
                  />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" 
                    class="form-control" 
                    id="address" 
                    name="address" 
                    placeholder="Address" 
                    value="{{ auth()->user()->address }}"/>
                  </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Điện thoại</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">VN (+84)</span>
                    <input
                      type="text"
                      id="phoneNumber"
                      name="phone"
                      class="form-control"
                      placeholder="202 555 0111"
                      value="{{ auth()->user()->phone }}"
                    />
                  </div>
                </div>
                
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                <button type="reset" class="btn btn-outline-secondary">Trở lại</button>
              </div>
              @if (session('success'))
                {{ session('success') }}
              @endif
            </form>
            
          </div>
          
          <!-- /Account -->
        </div>
        
      </div>
    </div>
  </div>

@endsection
