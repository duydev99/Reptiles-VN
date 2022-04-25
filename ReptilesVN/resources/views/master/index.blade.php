<!DOCTYPE html>
<html lang="en" ng-app="my-app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>
<body style="background-color: #FAFFBB">
    <div class="container-fluid">
        @include('master/header')
        <div class="row" style="min-height: calc(100vh - 40px);">
            <div  class="container">
                @section('master/body')
                @show
            </div>
        </div>
        @include('master/footer')
    </div>
    @section('angularJS')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app/angular/angular.min.js') }}"></script>
    <script src="{{ asset('app/app.js') }}"></script>
@show
</body>
</html>