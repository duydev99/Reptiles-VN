@extends('master/index')
@section('title')
    Tạo mới mô tả
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="DescriptionAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="infor">Thông tin sinh vật</label>
                        <input type="text" class="form-control" id="mt_mota" name="mt_mota"
                            ng-model="mt_mota" ng-required="true">
                        <small id="infor" class="form-text text-muted"
                            ng-show="frmAdd.mt_mota.$error.required">Hãy nhập thông tin</small>
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
        app.controller('DescriptionAddController', function($scope, $http, MainURL) {


            $scope.save = function(){
                var url = MainURL + 'description_management/create';
                var data = 
                {
                    'mt_mota':$scope.mt_mota
                };
                $http.post(url,data).then(function(response) {
                    alert(response.data);
                    if(response.data == "Tạo mới thành công")location.reload();
                });
            }
        });
    </script>
@endsection
