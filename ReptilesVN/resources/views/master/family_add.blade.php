@extends('master/index')
@section('title')
    Tạo mới họ
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="FamilyAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="ho">Tên họ</label>
                        <input type="text" class="form-control" id="h_ho" name="h_ho"
                            ng-model="h_ho" ng-required="true">
                        <small id="bo" class="form-text text-muted"
                            ng-show="frmAdd.h_ho.$error.required">Hãy nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="bo">Bộ</label>
                        <select name="b_id" id="b_id" ng-model="b_id"
                        ng-required="true" class="form-control">
                        <option ng-value="i.b_id" ng-repeat=" i in order">
                            <% i.b_bo %>
                        </option>
                        </select>
                        <small id="bo" class="form-text text-muted"
                            ng-show="frmAdd.b_id.$error.required">Hãy nhập chọn bộ</small>
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
        app.controller('FamilyAddController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'order_management/list').then(function(response) {
                $scope.order = response.data;
            });

            $scope.save = function(){
                var url = MainURL + 'family_management/create';
                var data = 
                {
                    'h_ho':$scope.h_ho,
                    'b_id': $scope.b_id
                };
                $http.post(url,data).then(function(response) {
                    alert(response.data);
                    if(response.data == "Tạo mới thành công")location.reload();
                });
            }
        });
    </script>
@endsection
