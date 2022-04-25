@extends('master/index')
@section('title')
    Quản lý mô tả
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="DescriptionController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('description_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Mô tả</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in description'>
                    <td><% i.mt_id%></td>
                    <td><% i.mt_mota%></td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.mt_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.mt_id)">
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
                                <input type="text" class="form-control" id="mt_id" name="mt_id" ng-model="des[0].mt_id"
                                    ng-readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="mt">Loại thông tin</label>
                                <input type="text" class="form-control" id="mt_mota" name="mt_mota"
                                    ng-model="des[0].mt_mota" ng-required="true">
                                <small id="mt" class="form-text text-muted"
                                    ng-show="frmEdit.mt_mota.$error.required">Hãy nhập thông tin</small>
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
        app.controller('DescriptionController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'description_management/list/').then(function(response) {
                $scope.description = response.data;
                console.log(response.data);
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật mô tả";
                $('#edit').modal('show');
                $http.get(MainURL + 'description_management/edit/' + id).then(function(response) {
                    $scope.des = response.data;
                    console.log(response.data);
                });
            };
            $scope.save = function() {
                var url = MainURL + 'description_management/edit/' + $scope.des[0].mt_id;
                var data = 
                {
                    'mt_mota':$scope.des[0].mt_mota
                };
                $http.post(url,data).then(function(response){
                    alert(response.data);
                    if(response.data == "Cập nhật thành công")location.reload();
                });
            };
            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'description_management/del/' + id;
                    $http.post(url).then(function(response){
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
