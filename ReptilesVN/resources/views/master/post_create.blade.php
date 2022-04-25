@extends('master/index')
@section('title')
    Tạo mới bài viết
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="PostAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Thông tin mẫu vật</h3>
                <form name="frmAdd" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="khoahoc">Tên khoa học</label>
                        <input type="text" class="form-control" id="sv_ten_khoahoc" name="sv_ten_khoahoc"
                            ng-model="sv_ten_khoahoc" ng-required="true">
                        <small id="khoahoc" class="form-text text-muted" ng-show="frmAdd.sv_ten_khoahoc.$error.required">Hãy
                            nhập
                            thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="tiengviet">Tên tiếng việt</label>
                        <input type="text" class="form-control" id="sv_ten_tiengviet" name="sv_ten_tiengviet"
                            ng-model="sv_ten_tiengviet" ng-required="true">
                        <small id="tiengviet" class="form-text text-muted"
                            ng-show="frmAdd.sv_ten_tiengviet.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="diaphuong">Tên địa phương</label>
                        <input type="text" class="form-control" id="sv_ten_dia_phuong" name="sv_ten_dia_phuong"
                            ng-model="sv_ten_dia_phuong" ng-required="true">
                        <small id="diaphuong" class="form-text text-muted"
                            ng-show="frmAdd.sv_ten_dia_phuong.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="giatri">Giá trị sinh vật</label>
                        <textarea class="form-control" id="sv_giatri" name="sv_giatri" ng-model="sv_giatri" ng-required="true"
                            rows="5"></textarea>
                        <small id="giatri" class="form-text text-muted" ng-show="frmAdd.sv_giatri.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="ho">Thuộc họ</label>
                        <select name="h_id" id="h_id" ng-model="h_id" class="form-control">
                            <option ng-repeat="i in family" ng-value="i.h_id"><%i.h_ho%></option>
                        </select>
                        <small id="ho" class="form-text text-muted" ng-show="frmAdd.h_id.$error.required">Hãy chọn loại
                            họ</small>
                    </div>
                    <div class="form-group" ng-repeat="des in description">
                        <label for="<%des.mt_id%>"><%des.mt_mota%></label>
                        <textarea class="form-control" id="<%des.mt_id%>" name="<%des.mt_id%>" ng-model="textDes" rows="5"></textarea>
                        <small id="<%des.mt_id%>" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group">
                        <label for="matdo">Mật độ phân bố</label>
                        <input type="text" class="form-control" id="mv_mat_do_phan_bo" name="mv_mat_do_phan_bo"
                            ng-model="mv_mat_do_phan_bo" ng-required="true">
                        <small id="matdo" class="form-text text-muted"
                            ng-show="frmAdd.mv_mat_do_phan_bo.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="sinhcanh">Sinh cảnh</label>
                        <textarea class="form-control" id="mv_sinh_canh" name="mv_sinh_canh" ng-model="mv_sinh_canh" ng-required="true"
                            rows="5"></textarea>
                        <small id="sinhcanh" class="form-text text-muted" ng-show="frmAdd.mv_sinh_canh.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="diadiem">Địa điểm</label>
                        <textarea class="form-control" id="mv_dia_diem" name="mv_dia_diem" ng-model="mv_dia_diem" ng-required="true"
                            rows="5"></textarea>
                        <small id="diadiem" class="form-text text-muted" ng-show="frmAdd.mv_dia_diem.$error.required">Hãy
                            nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="toado1">Tọa độ 1</label>
                        <input type="text" class="form-control" id="mv_toado_1" name="mv_toado_1" ng-model="mv_toado_1">
                        <small id="toado1" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group">
                        <label for="toado2">Tọa độ 2</label>
                        <input type="text" class="form-control" id="mv_toado_2" name="mv_toado_2" ng-model="mv_toado_2">
                        <small id="toado2" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group">
                        <label for="toado3">Tọa độ 3</label>
                        <input type="text" class="form-control" id="mv_toado_3" name="mv_toado_3" ng-model="mv_toado_3">
                        <small id="toado3" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group">
                        <label for="toado4">Tọa độ 4</label>
                        <input type="text" class="form-control" id="mv_toado_4" name="mv_toado_4" ng-model="mv_toado_4">
                        <small id="toado4" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group">
                        <label for="toado5">Tọa độ 5</label>
                        <input type="text" class="form-control" id="mv_toado_5" name="mv_toado_5" ng-model="mv_toado_5">
                        <small id="toado5" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group">
                        <label for="tinhtrang">Tình trạng sinh vật</label>
                        <input type="text" class="form-control" id="mv_tinh_trang" name="mv_tinh_trang"
                            ng-model="mv_tinh_trang">
                        <small id="tinhtrang" class="form-text text-muted">Có thể để trống</small>
                    </div>
                    <div class="form-group mt-2">
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
        app.controller('PostAddController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'family_management/list/').then(function(response) {
                $scope.family = response.data;
                console.log(response.data);
            });

            $http.get(MainURL + 'description_management/list/').then(function(response) {
                $scope.description = response.data;
                console.log(response.data);
            });

            $scope.save = function() {
                var url1 = MainURL + 'creature/create';
                var data1 = {
                    'sv_ten_khoahoc': $scope.sv_ten_khoahoc,
                    'sv_ten_tiengviet': $scope.sv_ten_tiengviet,
                    'sv_ten_dia_phuong':$scope.sv_ten_dia_phuong,
                    'sv_giatri': $scope.sv_giatri,
                    'h_id': $scope.h_id
                };
                $http.post(url1, data1).then(function(response1) {
                    $scope.sv_id = response1.data;
                    var url2 = MainURL + 'creature_description/create';
                    $scope.description.forEach(element => {
                        var data2 = {
                            'mt_id': element.mt_id,
                            'mota': document.getElementById(element.mt_id).value,
                            'sv_id': $scope.sv_id

                        };
                        $http.post(url2, data2).then(function(response2) {

                        });
                    });
                    var data3 = {
                        'mv_mat_do_phan_bo':$scope.mv_mat_do_phan_bo,
                        'mv_sinh_canh' :$scope.mv_sinh_canh,
                        'mv_dia_diem':$scope.mv_dia_diem,
                        'mv_toado_1' :$scope.mv_toado_1,
                        'mv_toado_2':$scope.mv_toado_2,
                        'mv_toado_3' :$scope.mv_toado_3,
                        'mv_toado_4':$scope.mv_toado_4,
                        'mv_toado_5':$scope.mv_toado_5 ,
                        'mv_tinh_trang':$scope.mv_tinh_trang ,
                        'sv_id':$scope.sv_id
                    };
                    var url3 = MainURL + 'post/create';
                    $http.post(url3, data3).then(function(response3) {
                        window.location.replace(MainURL + 'post');
                    });
                });

            }
        });
    </script>
@endsection
