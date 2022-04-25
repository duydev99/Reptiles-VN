<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#FAFFBB">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('client')}}">
        <img src="{{asset('img/avatar.png')}}" alt="" width="75px" height="75px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#headerScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="headerScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item m-1">
            <a class="nav-link btn btn-light" style="background-color: khaki" href="{{route('about')}}">About</a>
          </li>
          <li class="nav-item m-1">
            <a class="nav-link btn btn-light" style="background-color: khaki"  href="{{route('login')}}">Đăng nhập</a>
          </li>
        </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form> --}}
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
