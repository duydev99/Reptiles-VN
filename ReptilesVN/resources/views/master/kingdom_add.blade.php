@extends('master/index')
@section('title')
    Tạo mới giới
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="KingDomAddController">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form name="frmAdd" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="gioi">Tên giới</label>
                        <input type="text" class="form-control" id="g_gioi" name="g_gioi"
                            ng-model="g_gioi" ng-required="true">
                        <small id="gioi" class="form-text text-muted"
                            ng-show="frmAdd.g_gioi.$error.required">Hãy nhập thông tin</small>
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
        app.controller('KingDomAddController', function($scope, $http, MainURL) {


            $scope.save = function(){
                var url = MainURL + 'kingdom_management/create';
                var data = 
                {
                    'g_gioi':$scope.g_gioi
                };
                $http.post(url,data).then(function(response) {
                    alert(response.data);
                    if(response.data == "Tạo mới thành công")location.reload();
                });
            }
        });
    </script>
@endsection
