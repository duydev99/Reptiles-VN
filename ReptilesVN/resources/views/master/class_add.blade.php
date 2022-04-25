@extends('master/index')
@section('title')
    Tạo mới lớp
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="ClassAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="lop">Tên lớp</label>
                        <input type="text" class="form-control" id="l_lop" name="l_lop"
                            ng-model="l_lop" ng-required="true">
                        <small id="lop" class="form-text text-muted"
                            ng-show="frmAdd.l_lop.$error.required">Hãy nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="nganh">Ngành</label>
                        <select name="ng_id" id="ng_id" ng-model="ng_id"
                        ng-required="true" class="form-control">
                        <option ng-value="i.ng_id" ng-repeat=" i in phylum ">
                            <% i.ng_nganh %>
                        </option>
                        </select>
                        <small id="nganh" class="form-text text-muted"
                            ng-show="frmAdd.ng_id.$error.required">Hãy nhập chọn ngành</small>
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
        app.controller('ClassAddController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'phylum_management/list').then(function(response) {
                $scope.phylum = response.data;
            });

            $scope.save = function(){
                var url = MainURL + 'class_management/create';
                var data = 
                {
                    'l_lop':$scope.l_lop,
                    'ng_id': $scope.ng_id
                };
                $http.post(url,data).then(function(response) {
                    alert(response.data);
                    if(response.data == "Tạo mới thành công")location.reload();
                });
            }
        });
    </script>
@endsection
