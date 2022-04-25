@extends('master/index')
@section('title')
    Quản lý ngành
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="PhylumController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('phylum_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Ngành</th>
                    <th>Thuộc giới</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in phylum'>
                    <td><% i.ng_id%></td>
                    <td><% i.ng_nganh%></td>
                    <td><%i.g_gioi%></td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.ng_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.ng_id)">
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
                                <input type="text" class="form-control" id="ng_id" name="ng_id" ng-model="pl[0].ng_id"
                                    ng-readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="nganh">Tên ngành</label>
                                <input type="text" class="form-control" id="ng_nganh" name="ng_nganh"
                                    ng-model="pl[0].ng_nganh" ng-required="true">
                                <small id="nganh" class="form-text text-muted"
                                    ng-show="frmEdit.ng_nganh.$error.required">Hãy nhập thông tin</small>
                            </div>
                            <div class="form-group">
                                <label for="gioi">Tên giới</label>
                                <select name="g_id" id="g_id" ng-model="g_id"
                                ng-required="true" class="form-control">
                                <option ng-value="i.g_id" ng-repeat=" i in kingdom ">
                                    <% i.g_gioi %>
                                </option>
                                </select>
                                <small id="gioi" class="form-text text-muted"
                                    ng-show="frmAdd.g_id.$error.required">Hãy nhập chọn giới</small>
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
        app.controller('PhylumController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'phylum_management/list/').then(function(response) {
                $scope.phylum = response.data;
                console.log(response.data);
            });
            $http.get(MainURL + 'kingdom_management/list').then(function(response) {
                $scope.kingdom = response.data;
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật ngành";
                $('#edit').modal('show');
                $http.get(MainURL + 'phylum_management/edit/' + id).then(function(response) {
                    $scope.pl = response.data;
                    console.log(response.data);
                });
            };
            $scope.save = function() {
                var url = MainURL + 'phylum_management/edit/' + $scope.pl[0].ng_id;
                var data = 
                {
                    'ng_nganh':$scope.pl[0].ng_nganh,
                    'g_id': $scope.g_id
                };
                $http.post(url,data).then(function(response){
                    alert(response.data);
                    if(response.data == "Cập nhật thành công")location.reload();
                });
            };
            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'phylum_management/del/' + id;
                    $http.post(url).then(function(response){
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
