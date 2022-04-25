<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link type="stylesheet" href="{{ asset('build/login.css') }}">
</head>

<body style="background-color: #FAFFBB">
    <section class="vh-100 gradient-custom " ng-app="my-app" ng-controller="LoginController">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-dark" style="border-radius: 1rem; background-color: #FBFFC8;">
                        <div class="card-body py-3 " style="padding-left: 80px; padding-right: 80px;">

                            <div class="mb-md-4 mt-md-4 ">

                                <div class="fw-bold mb-2 text-uppercase text-center">
                                    <img class="imageLogo" style="border-radius: 1rem;"
                                        src="{{ asset('img/avatar.png') }}" alt="">
                                </div>
                                <form action="{{ route('submitLogin') }}" method="post" name="frmLogin">
                                    {{ csrf_field() }}
                                    <div class="row text-center">
                                        @if (Session::has('error'))
                                            <small id="emailHelp"
                                                class="form-text text-muted text-danger">{{ Session::get('error') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typeEmailX">Tài khoản</label>
                                        <input type="account" id="txtUsername" name="txtUsername" 
                                        class="form-control form-control-lg" ng-model="txtUsername"
                                        ng-required="true"/>
                                        <small id="Username" class="form-text text-muted"
                                        ng-show="frmLogin.txtUsername.$error.required">Hãy nhập tài khoản</small>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typePasswordX" >Mật khẩu</label>
                                        <input type="password" id="txtPassword" name="txtPassword"
                                            class="form-control form-control-lg" ng-model="txtPassword"
                                            ng-required="true"/>
                                            <small id="Passowrd" class="form-text text-muted"
                                            ng-show="frmLogin.txtPassword.$error.required">Hãy nhập mật khẩu</small>
                                    </div>

                                    <div class="container-fluid d-flex justify-content-between px-0 py-2">
                                        <a href="{{ route('client') }}" class="btn border-dark btn-lg "style="background-color: #F9FFA9;">Trang chủ </a>
                                        <button class="btn border-dark btn-lg border borer-dark" type="submit"
                                            style="background-color: #F9FFA9;" id="btnLogin" name="btnLogin"
                                            ng-disabled="frmLogin.$invalid">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container-fluid" ng-app="my-app" ng-controller="LoginController">
        <div class="row" style="min-height: calc(100vh - 40px);">
            <div class="col-md-4 col-4"></div>
            <div class="col-md-4 col-4 mt-5 mb-5" style="background-color:darkkhaki">
                <div class="row">
                    <div class="card" style="height:200px">
                        <a href="{{ route('login') }}" style="height:100%">
                            <img src="{{ asset('img/avatar.png') }}" class="card-img-top" alt="..." height="100%">
                        </a>
                        <div class="card-body">
                            <form action="{{ route('submitLogin') }}" method="post" name="frmLogin">
                                {{ csrf_field() }}
                                <div class="row text-center">
                                    @if (Session::has('error'))
                                        <small id="emailHelp"
                                            class="form-text text-muted text-danger">{{ Session::get('error') }}</small>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="lblUsername">Tài Khoản</label>
                                        <input type="text" id="txtUsername" name="txtUsername"
                                            class="form-control form-control-sm" ng-model="txtUsername"
                                            ng-required="true">
                                        <small id="Username" class="form-text text-muted"
                                            ng-show="frmLogin.txtUsername.$error.required">Hãy nhập tài khoản</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="lblPassword">Mật khẩu</label>
                                        <input type="password" id="txtPassword" name="txtPassword"
                                            class="form-control form-control-sm" ng-model="txtPassword"
                                            ng-required="true">
                                        <small id="Passowrd" class="form-text text-muted"
                                            ng-show="frmLogin.txtPassword.$error.required">Hãy nhập mật khẩu</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('client') }}" class="btn btn-outline-light"
                                            style="background-color:darkkhaki;width:100%">Trang chủ</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" id="btnLogin" name="btnLogin"
                                            ng-disabled="frmLogin.$invalid" class="btn btn-outline-light"
                                            style="background-color:darkkhaki;width:100%">Đăng nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-4"></div>
        </div>
    </div> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app/angular/angular.min.js') }}"></script>
    <script src="{{ asset('app/app.js') }}"></script>
    <script>
        app.controller('LoginController', function($scope, $http, MainURL) {

        });
    </script>
</body>

</html>
