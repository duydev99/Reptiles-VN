@extends('master/index')
@section('title')
    Quản lý họ
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="FamilyController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('family_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Họ</th>
                    <th>Thuộc bộ</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in family'>
                    <td><% i.h_id%></td>
                    <td><% i.h_ho%></td>
                    <td><%i.b_bo%></td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.h_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.h_id)">
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
                                <input type="text" class="form-control" id="h_id" name="h_id" ng-model="familyGet[0].h_id"
                                    ng-readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="ho">Tên họ</label>
                                <input type="text" class="form-control" id="h_ho" name="h_ho"
                                    ng-model="familyGet[0].h_ho" ng-required="true">
                                <small id="ho" class="form-text text-muted"
                                    ng-show="frmEdit.h_ho.$error.required">Hãy nhập thông tin</small>
                            </div>
                            <div class="form-group">
                                <label for="bo">Tên bộ</label>
                                <select name="b_id" id="b_id" ng-model="b_id"
                                ng-required="true" class="form-control">
                                <option ng-value="i.b_id" ng-repeat=" i in order ">
                                    <% i.b_bo %>
                                </option>
                                </select>
                                <small id="bo" class="form-text text-muted"
                                    ng-show="frmAdd.b_id.$error.required">Hãy nhập chọn bộ</small>
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
        app.controller('FamilyController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'family_management/list/').then(function(response) {
                $scope.family = response.data;
                console.log(response.data);
            });
            $http.get(MainURL + 'order_management/list').then(function(response) {
                $scope.order = response.data;
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật họ";
                $('#edit').modal('show');
                $http.get(MainURL + 'family_management/edit/' + id).then(function(response) {
                    $scope.familyGet = response.data;
                    console.log(response.data);
                });
            };

            $scope.save = function() {
                var url = MainURL + 'family_management/edit/' + $scope.familyGet[0].h_id;
                var data = 
                {
                    'h_ho':$scope.familyGet[0].h_ho,
                    'b_id': $scope.b_id
                };
                $http.post(url,data).then(function(response){
                    alert(response.data);
                    if(response.data == "Cập nhật thành công")location.reload();
                });
            };
            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'family_management/del/' + id;
                    $http.post(url).then(function(response){
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
