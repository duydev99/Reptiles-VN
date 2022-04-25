<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#FAFFBB">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('master') }}">
            <img src="{{ asset('img/avatar.png') }}" alt="" width="45px" height="45px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#headerScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="headerScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                @if (Session::has('user') && Session::get('user')['type']==1)
                    <li class="nav-item m-1">
                        <a class="nav-link btn btn-light" style="background-color: khaki"
                            href="{{ route('post_management') }}">Duyệt bài đăng</a>
                    </li>
                    <li class="nav-item btn-group text-center m-1">
                        <a class="btn btn-light dropdown-toggle" style="background-color: khaki" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cấp bậc sinh vật
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('kingdom_management') }}">Quản lý giới</a></li>
                            <li><a class="dropdown-item" href="{{ route('phylum_management') }}">Quản lý ngành</a></li>
                            <li><a class="dropdown-item" href="{{ route('class_management') }}">Quản lý lớp</a></li>
                            <li><a class="dropdown-item" href="{{ route('order_management') }}">Quản lý bộ</a></li>
                            <li><a class="dropdown-item" href="{{ route('family_management') }}">Quản lý họ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item m-1">
                    <a class="nav-link btn btn-light" style="background-color: khaki" href="{{route('user_management')}}">Quản lý người dùng</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link btn btn-light" style="background-color: khaki" href="{{route('description_management')}}">Mô tả sinh vật</a>
                        </li>
                @else
                    <li class="nav-item m-1">
                        <a class="nav-link btn btn-light" style="background-color: khaki"
                            href="{{ route('post_create') }}">Đăng bài viết</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link btn btn-light" style="background-color: khaki"
                            href="{{ route('post_list') }}">Danh sách bài đăng</a>
                    </li>
                @endif
            </ul>
            {{-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light" style="background-color: khaki" type="submit">Search</button>
            </form> --}}
            @if (Session::has('user'))
                <div class="btn-group m-2 text-center">
                    <a href="" class="btn btn-light dropdown-toggle" style="background-color: khaki" href="#"
                        id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Session::get('user')['name'] }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                    </ul>
                </div>
            @else
            @endif

        </div>
    </div>
</nav>

@section('angularJS')
    @parent
    <script>
        app.controller('HeaderController', function($scope, $http, MainURL) {

        });
    </script>
@endsection
