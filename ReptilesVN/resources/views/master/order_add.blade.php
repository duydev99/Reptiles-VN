@extends('master/index')
@section('title')
    Tạo mới bộ
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="OrderAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="bo">Tên bộ</label>
                        <input type="text" class="form-control" id="b_bo" name="b_bo"
                            ng-model="b_bo" ng-required="true">
                        <small id="bo" class="form-text text-muted"
                            ng-show="frmAdd.b_bo.$error.required">Hãy nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="lop">Lớp</label>
                        <select name="l_id" id="l_id" ng-model="l_id"
                        ng-required="true" class="form-control">
                        <option ng-value="i.l_id" ng-repeat=" i in class ">
                            <% i.l_lop %>
                        </option>
                        </select>
                        <small id="lop" class="form-text text-muted"
                            ng-show="frmAdd.l_id.$error.required">Hãy nhập chọn lớp</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" ng-disabled="frmAdd.$invalid" ng-click="save()">Lưu</button>
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
        app.controller('OrderAddController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'class_management/list').then(function(response) {
                $scope.class = response.data;
            });

            $scope.save = function(){
                var url = MainURL + 'order_management/create';
                var data = 
                {
                    'b_bo':$scope.b_bo,
                    'l_id': $scope.l_id
                };
                $http.post(url,data).then(function(response) {
                    alert(response.data);
                    if(response.data == "Tạo mới thành công")location.reload();
                });
            }
        });
    </script>
@endsection
