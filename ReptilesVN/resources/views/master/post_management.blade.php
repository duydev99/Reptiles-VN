@extends('master/index')
@section('title')
    Post Management
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="PostController">
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tên khoa học</th>
                    <th>Tên tiếng việt</th>
                    <th>Thời gian đăng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in posts'>
                    <td><% i.mv_id%></td>
                    <td><% i.sv_ten_khoahoc%></td>
                    <td><% i.sv_ten_tiengviet%></td>
                    <td><% i.mv_thoi_gian%></td>
                    <td>
                        <button ng-if="i.mv_duyet == 0 " class="btn btn-danger" ng-click="confirm(i.mv_id)">Chưa
                            duyệt</button>
                        <button ng-if="i.mv_duyet == 1 " class="btn btn-success" ng-click="confirm(i.mv_id)">Đã
                            duyệt</button>
                    </td>
                    <td></td>
                    <td> <button class="btn btn-light bg-danger" ng-click="del(i.mv_id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('PostController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'post_management/list').then(function(response) {
                $scope.posts = response.data;
                console.log(response.data);
            });

            $scope.confirm = function(id) {
                $http.post(MainURL + 'post_management/post/' + id).then(function(response) {
                    location.reload();
                });
            }

            $scope.del = function(id) {
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if (conf) {
                    var url = MainURL + 'post/del/' + id;
                    $http.post(url).then(function(response) {
                        location.reload();
                    });
                }
            }
        });
    </script>
@endsection
