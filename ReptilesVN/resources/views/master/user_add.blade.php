@extends('master/index')
@section('title')
    Tạo mới người dùng
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="UserAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" class="form-control" id="nd_ho_ten" name="nd_ho_ten" ng-model="nd_ho_ten"
                            ng-required="true">
                        <small id="hoten" class="form-text text-muted" ng-show="frmAdd.nd_ho_ten.$error.required">Hãy nhập
                            thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="taikhoan">Tài khoản</label>
                        <input type="text" class="form-control" id="nd_tai_khoan" name="nd_tai_khoan"
                            ng-model="nd_tai_khoan" ng-required="true">
                        <small id="taikhoan" class="form-text text-muted" ng-show="frmAdd.nd_tai_khoan.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="matkhau">Mật khẩu</label>
                        <input type="password" class="form-control" id="nd_mat_khau" name="nd_mat_khau"
                            ng-model="nd_mat_khau" ng-required="true">
                        <small id="matkhau" class="form-text text-muted" ng-show="frmAdd.nd_mat_khau.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="loai">Loại người dùng</label>
                        <select name="nd_loai" id="nd_loai" ng-model="nd_loai" class="form-control">
                            <option value="0">Thành viên</option>
                            <option value="1">Quản trị</option>
                        </select>
                        <small id="loai" class="form-text text-muted" ng-show="frmAdd.nd_loai.$error.required">Hãy chọn loại
                            người dùng</small>
                    </div>
                    <div class="form-group mt-1">
                        <button type="submit" class="btn btn-primary" ng-disabled="frmAdd.$invalid"
                            ng-click="save()">Lưu</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('UserAddController', function($scope, $http, MainURL) {


            $scope.save = function() {
                var url = MainURL + 'user_management/create';
                console.log($scope.nd_loai);
                console.log($scope.nd_tai_khoan);
                console.log($scope.nd_mat_khau);
                console.log($scope.nd_ho_ten);
                var data = {
                    'nd_ho_ten':$scope.nd_ho_ten,
                    'nd_tai_khoan':$scope.nd_tai_khoan,
                    'nd_mat_khau':$scope.nd_mat_khau,
                    'nd_loai':parseInt($scope.nd_loai)
                };
                $http.post(url, data).then(function(response) {
                    alert(response.data);
                    location.reload();
                });
            }
        });
    </script>
@endsection
