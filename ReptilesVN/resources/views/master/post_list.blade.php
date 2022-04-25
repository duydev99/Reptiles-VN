@extends('master/index')
@section('title')
    Danh sách bài đăng
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="PostListController">
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tên khoa học</th>
                    <th>Tên tiếng việt</th>
                    <th>Thời gian đăng</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                    <th>Hình ảnh</th>
                    <th>Video</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in list'>
                    <td><%i.mv_id%></td>
                    <td><% i.sv_ten_khoahoc%></td>
                    <td><% i.sv_ten_tiengviet%></td>
                    <td><% i.mv_thoi_gian%></td>
                    <td>
                        <span ng-if="i.mv_duyet ==0" class="text-danger">Chưa duyệt</span>
                        <span ng-if="i.mv_duyet ==1" class="text-success">Đã duyệt</span>
                    </td>
                    <td>
                        <button class="btn btn-light bg-info" ng-click="edit(i.mv_id)">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-light" style="background-color:rgb(248, 214, 61)" ng-click="img(i.mv_id)">
                            <i class="fa fa-image"></i> Upload
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-light" style="background-color:rgb(2, 236, 236)" ng-click="video(i.mv_id)">
                            <i class="fa fa-video"></i> Upload
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-light bg-danger" ng-click="del(i.mv_id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('PostListController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'post/list').then(function(response) {
                $scope.list = response.data;
                console.log($scope.list);
            });

            $scope.edit = function(id){
                $http.get(MainURL + 'post/edit/'+id).then(function(response) {
                    window.location.replace(MainURL + 'post/edit/'+id);
                });
            }

            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'post/del/'+id;
                    $http.post(url).then(function(response){
                        location.reload();
                    });
                }
            }

            $scope.img = function(id){
                $http.get(MainURL + 'image/'+id).then(function(response) {
                    window.location.replace(MainURL + 'image/'+id);
                });
            }

            $scope.video = function(id){
                $http.get(MainURL + 'video/'+id).then(function(response) {
                    window.location.replace(MainURL + 'video/'+id);
                });
            }
        });
    </script>
@endsection
