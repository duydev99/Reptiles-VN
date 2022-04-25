@extends('master/index')
@section('title')
    Quản lý lớp
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="ClassController">
        <a class="btn btn-light" style="background-color:khaki" href="{{ route('class_add') }}">Thêm</a>
        <table class="table hover table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Lớp</th>
                    <th>Thuộc ngành</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='i in class'>
                    <td><% i.l_id%></td>
                    <td><% i.l_lop%></td>
                    <td><%i.ng_nganh%></td>
                    <td>
                        <button class="btn btn-outline-primary" ng-click="edit(i.l_id)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" ng-click="del(i.l_id)">
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
                                <input type="text" class="form-control" id="l_id" name="l_id" ng-model="classGet[0].l_id"
                                    ng-readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="lop">Tên lớp</label>
                                <input type="text" class="form-control" id="txtLop" name="txtLop"
                                    ng-model="classGet[0].l_lop" ng-required="true">
                                <small id="lop" class="form-text text-muted"
                                    ng-show="frmEdit.txtLop.$error.required">Hãy nhập thông tin</small>
                            </div>
                            <div class="form-group">
                                <label for="nganh">Tên ngành</label>
                                <select name="ng_id" id="ng_id" ng-model="ng_id"
                                ng-required="true" class="form-control">
                                <option ng-value="i.ng_id" ng-repeat=" i in phylum ">
                                    <% i.ng_nganh %>
                                </option>
                                </select>
                                <small id="nganh" class="form-text text-muted"
                                    ng-show="frmAdd.ng_id.$error.required">Hãy nhập chọn ngành</small>
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
        app.controller('ClassController', function($scope, $http, MainURL) {
            $http.get(MainURL + 'class_management/list/').then(function(response) {
                $scope.class = response.data;
                console.log(response.data);
            });
            $http.get(MainURL + 'phylum_management/list').then(function(response) {
                $scope.phylum = response.data;
            });

            $scope.edit = function(id) {
                $scope.tile = "Cập nhật lớp";
                $('#edit').modal('show');
                $http.get(MainURL + 'class_management/edit/' + id).then(function(response) {
                    $scope.classGet = response.data;
                    console.log(response.data);
                });
            };

            $scope.save = function() {
                var url = MainURL + 'class_management/edit/' + $scope.classGet[0].l_id;
                var data = 
                {
                    'l_lop':$scope.classGet[0].l_lop,
                    'ng_id': $scope.ng_id
                };
                $http.post(url,data).then(function(response){
                    alert(response.data);
                    if(response.data == "Cập nhật thành công")location.reload();
                });
            };
            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'class_management/del/' + id;
                    $http.post(url).then(function(response){
                        alert(response.data);
                        location.reload();
                    });
                }
            };
        });
    </script>
@endsection
