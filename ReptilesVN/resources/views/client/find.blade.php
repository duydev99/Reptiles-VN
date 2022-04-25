@extends('client/index')
@section('title')
    Kết quả tìm kiếm
@endsection

@section('client/body')
    <div class="col-md-12 mt-5" ng-controller="SearchController">
        <div class="row">
            <div class="col-md-5 ">
                <div class="row p-3 border border-dark bg-light rounded" style="min-height: 80vh;">
                    <!-- search -->
                    <div class="row mt-3">
                        <form action="" method="get" name="frmSearch">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nhập tên tiếng việt" ng-model="text" ng-required="true" id="keyword" name="keyword">
                                <div class="input-group-append ">
                                    <button type="submit"ng-disabled="frmSearch.$invalid" ng-click="search()" class="input-group-text btn btn-light border rounded"><i
                                        class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- keyboard -->
                    <div class="row">
                        <div class="col">
                            <ul class="d-flex justify-content-start flex-wrap p-0">
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('A')">A</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('B')">B</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('C')">C</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('D')">D</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('E')">E</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('F')">F</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('G')">G</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('H')">H</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('I')">I</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('J')">J</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('K')">K</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('L')">L</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('M')">M</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('N')">N</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('O')">O</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('P')">P</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('Q')">Q</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('R')">R</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('S')">S</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('T')">T</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('U')">U</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('V')">V</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('W')">W</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('X')">X</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('Y')">Y</button>
                                    </form>
                                </li>
                                <li class="list-unstyled">
                                    <form action="" method="get">
                                        <button type="submit" class="btn_key border border-warning bg-brown  fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                        style="width: 40px; height: 40px;" ng-click="find('Z')">Z</button>
                                    </form>
                                </li>
                                <li class="btn_key border border-warning bg-brown list-unstyled fs-4 m-2 rounded btn text-light text-center fw-bold p-0"
                                    style="width: 40px; height: 40px;">...</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="background-color: white; border:1px solid">
                <div class="row text-center">
                    <div class="card col-md-4 m-2" style="background-color: rgb(240, 204, 204)" ng-repeat="i in rsList">
                        <a href="" class="m-2" ng-click="detail(i.mv_id)" style="text-decoration: none;color:black">
                            <img ng-src="{{ asset('img/<%i.img_source%>') }}" height="150px" class="card-img-top" alt="">
                            <div class="card-body">
                                <% i.sv_ten_tiengviet %>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('SearchController', function($scope, $http, MainURL,$location) {
            $http.post($location.absUrl()).then(function(response) {
                $scope.rsList = response.data;
                console.log(response.data);
            });

            $scope.detail = function(id){
                $http.get(MainURL + 'post/detail/'+id).then(function(response) {
                    window.location.replace(MainURL + 'post/detail/'+id);
                });
            }

            $scope.search = function(){
                $http.get(MainURL + 'search/'+$scope.text).then(function(response) {
                    window.location.replace(MainURL + 'search/'+$scope.text);
                });
            }
            $scope.find = function(key){
                console.log(key);
                $http.get(MainURL + 'find/'+key).then(function(response) {
                    window.location.replace(MainURL + 'find/'+key);
                });
            }
        });
    </script>
@endsection