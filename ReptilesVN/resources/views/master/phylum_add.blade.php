@extends('master/index')
@section('title')
    Tạo mới ngành
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="PhylumAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nganh">Tên ngành</label>
                        <input type="text" class="form-control" id="ng_nganh" name="ng_nganh"
                            ng-model="ng_nganh" ng-required="true">
                        <small id="nganh" class="form-text text-muted"
                            ng-show="frmAdd.ng_nganh.$error.required">Hãy nhập thông tin</small>
                    </div>
                    <div class="form-group">
                        <label for="nganh">Giới</label>
                        <select name="g_id" id="g_id" ng-model="g_id"
                        ng-required="true" class="form-control">
                        <option ng-value="i.g_id" ng-repeat=" i in kingdom ">
                            <% i.g_gioi %>
                        </option>
                        </select>
                        <small id="nganh" class="form-text text-muted"
                            ng-show="frmAdd.g_id.$error.required">Hãy nhập chọn giới</small>
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
        app.controller('PhylumAddController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'kingdom_management/list').then(function(response) {
                $scope.kingdom = response.data;
            });

            $scope.save = function(){
                var url = MainURL + 'phylum_management/create';
                var data = 
                {
                    'ng_nganh':$scope.ng_nganh,
                    'g_id': $scope.g_id
                };
                $http.post(url,data).then(function(response) {
                    alert(response.data);
                    if(response.data == "Tạo mới thành công")location.reload();
                });
            }
        });
    </script>
@endsection
