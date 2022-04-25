@extends('master/index')
@section('title')
    Quản lý bộ
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="OrderController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('order_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Bộ</th>
                    <th>Thuộc lớp</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in order'>
                    <td><% i.b_id%></td>
                    <td><% i.b_bo%></td>
                    <td><%i.l_lop%></td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.b_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.b_id)">
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
                                <input type="text" class="form-control" id="b_id" name="b_id" ng-model="orderGet[0].b_id"
                                    ng-readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="bo">Tên bộ</label>
                                <input type="text" class="form-control" id="b_bo" name="b_bo"
                                    ng-model="orderGet[0].b_bo" ng-required="true">
                                <small id="bo" class="form-text text-muted"
                                    ng-show="frmEdit.b_bo.$error.required">Hãy nhập thông tin</small>
                            </div>
                            <div class="form-group">
                                <label for="lop">Tên lớp</label>
                                <select name="l_id" id="l_id" ng-model="l_id"
                                ng-required="true" class="form-control">
                                <option ng-value="i.l_id" ng-repeat=" i in class ">
                                    <% i.l_lop %>
                                </option>
                                </select>
                                <small id="lop" class="form-text text-muted"
                                    ng-show="frmAdd.l_id.$error.required">Hãy nhập chọn ngành</small>
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
        app.controller('OrderController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'order_management/list/').then(function(response) {
                $scope.order = response.data;
                console.log(response.data);
            });
            $http.get(MainURL + 'class_management/list').then(function(response) {
                $scope.class = response.data;
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật bộ";
                $('#edit').modal('show');
                $http.get(MainURL + 'order_management/edit/' + id).then(function(response) {
                    $scope.orderGet = response.data;
                    console.log(response.data);
                });
            };

            $scope.save = function() {
                var url = MainURL + 'order_management/edit/' + $scope.orderGet[0].b_id;
                var data = 
                {
                    'b_bo':$scope.orderGet[0].b_bo,
                    'l_id': $scope.l_id
                };
                $http.post(url,data).then(function(response){
                    alert(response.data);
                    if(response.data == "Cập nhật thành công")location.reload();
                });
            };
            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'order_management/del/' + id;
                    $http.post(url).then(function(response){
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
