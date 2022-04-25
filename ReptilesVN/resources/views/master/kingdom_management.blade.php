@extends('master/index')
@section('title')
    Quản lý giới
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="KingDomController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('kingdom_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Giới</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in kingdom'>
                    <td><% i.g_id%></td>
                    <td><% i.g_gioi%></td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.g_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.g_id)">
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
                                <label for="id">Id</label>
                                <input type="text" class="form-control" id="g_id" name="g_id" ng-model="kd[0].g_id"
                                    ng-readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="gioi">Tên giới</label>
                                <input type="text" class="form-control" id="g_gioi" name="g_gioi"
                                    ng-model="kd[0].g_gioi" ng-required="true">
                                <small id="gioi" class="form-text text-muted"
                                    ng-show="frmEdit.g_gioi.$error.required">Hãy nhập thông tin</small>
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
        app.controller('KingDomController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'kingdom_management/list/').then(function(response) {
                $scope.kingdom = response.data;
                console.log(response.data);
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật giới";
                $('#edit').modal('show');
                $http.get(MainURL + 'kingdom_management/edit/' + id).then(function(response) {
                    $scope.kd = response.data;
                    console.log(response.data);
                });
            };
            $scope.save = function() {
                var url = MainURL + 'kingdom_management/edit/' + $scope.kd[0].g_id;
                var data = 
                {
                    'g_gioi':$scope.kd[0].g_gioi
                };
                $http.post(url,data).then(function(response){
                    alert(response.data);
                    if(response.data == "Cập nhật thành công")location.reload();
                });
            };
            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'kingdom_management/del/' + id;
                    $http.post(url).then(function(response){
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
