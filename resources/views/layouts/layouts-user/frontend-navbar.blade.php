<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand h1" href="{{ route('timdothatlac') }}">
            <i class='bx bx-buildings bx-sm text-dark'></i>
            <span class="text-dark h4">Tìm đồ</span> <span class="text-primary h4">thất lạc</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="navbar-toggler-success">
            <div class="flex-fill mx-xl-5 mb-2">
                <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Tìm kiếm..."
                                aria-label="Tìm kiếm..." />
                        </div>
                    </div>
                    <!-- /Search -->

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{ route('login') }}">Đăng
                                    Nhập</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3"
                                    href="{{ route('register') }}">Đăng Ký</a>
                            </li>
                        @endif
                    @else
                    </ul>

                </div>
                <div class="navbar align-self-center d-flex">
                    {{-- <li class="nav-item dropdown" id="drop-down-list"> --}}
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="menu">


                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            Trang quản trị
                        </a>

                        <a class="dropdown-item" href="{{ route('f-profile') }}">
                            Tài khoản
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}">
                            Đăng xuất
                        </a>
                    </div>

                    {{-- </li> --}}
                </div>
            @endguest

        </div>
    </div>
</nav>
