@extends('index')
@section('title')
    Reptiles VN
@endsection

@section('body')
    <div class="col-md-12 mt-5" ng-controller="IndexController">

    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('IndexController', function($scope, $http, MainURL) {

        });
    </script>
@endsection