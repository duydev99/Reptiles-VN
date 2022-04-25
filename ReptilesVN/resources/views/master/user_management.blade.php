@extends('master/index')
@section('title')
    Quản lý người dùng
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="UserController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('user_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Loại người dùng</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in user'>
                    <td><% i.nd_id%></td>
                    <td><% i.nd_ho_ten%></td>
                    <td><% i.nd_tai_khoan%></td>
                    <td><% i.nd_mat_khau%></td>
                    <td>
                        <span ng-if="i.nd_loai == 1">Quản trị</span>
                        <span ng-if="i.nd_loai==0">Thành viên</span>
                    </td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.nd_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.nd_id)">
                            <i class="fa fa-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Modal -->

        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><%tile%></h5>
                    </div>
                    <form name="frmEdit" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="hoten">Họ tên</label>
                                <input type="text" class="form-control" id="nd_ho_ten" name="nd_ho_ten" ng-model="us[0].nd_ho_ten"
                                    ng-required="true">
                                <small id="hoten" class="form-text text-muted" ng-show="frmAdd.nd_ho_ten.$error.required">Hãy
                                    nhập
                                    thông tin</small>
                            </div>
                            <div class="form-group">
                                <label for="taikhoan">Tài khoản</label>
                                <input type="text" class="form-control" id="nd_tai_khoan" name="nd_tai_khoan"
                                    ng-model="us[0].nd_tai_khoan" ng-required="true">
                                <small id="taikhoan" class="form-text text-muted"
                                    ng-show="frmAdd.nd_tai_khoan.$error.required">Hãy
                                    nhập thông tin</small>
                            </div>
                            <div class="form-group">
                                <label for="matkhau">Mật khẩu</label>
                                <input type="password" class="form-control" id="nd_mat_khau" name="nd_mat_khau"
                                    ng-model="nd_mat_khau">
                                <small id="matkhau" class="form-text text-muted">Có thể để trống</small>
                            </div>
                            <div class="form-group">
                                <label for="loai">Loại người dùng</label>
                                <select name="nd_loai" id="nd_loai" ng-model="nd_loai" class="form-control">
                                    <option value="0">Thành viên</option>
                                    <option value="1">Quản trị</option>
                                </select>
                                <small id="loai" class="form-text text-muted" ng-show="frmAdd.nd_loai.$error.required">Hãy chọn
                                    loại
                                    người dùng</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" ng-disabled="frmEdit.$invalid"
                                ng-click="save()">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('UserController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'user_management/list/').then(function(response) {
                $scope.user = response.data;
                console.log(response.data);
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật người dùng";
                $('#edit').modal('show');
                $http.get(MainURL + 'user_management/edit/' + id).then(function(response) {
                    $scope.us = response.data;
                    console.log(response.data);
                });
            };
            $scope.save = function() {
                var url = MainURL + 'user_management/edit/' + $scope.us[0].nd_id;
                var data = {
                    'nd_ho_ten':$scope.us[0].nd_ho_ten,
                    'nd_tai_khoan':$scope.us[0].nd_tai_khoan,
                    'nd_mat_khau':$scope.nd_mat_khau,
                    'nd_loai':parseInt($scope.nd_loai)
                };
                $http.post(url, data).then(function(response) {
                    alert(response.data);
                    if (response.data == "Cập nhật thành công") location.reload();
                });
            };
            $scope.del = function(id) {
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if (conf) {
                    var url = MainURL + 'user_management/del/' + id;
                    $http.post(url).then(function(response) {
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
