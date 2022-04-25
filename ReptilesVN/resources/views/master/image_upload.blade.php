@extends('master/index')
@section('title')
    Upload hình ảnh
@endsection

@section('master/body')
    <div class="col-md-12 mt-5" ng-controller="ImageController">
        <div class="row">
            <div class="col-md-6">
                <form name="frmUpload">
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" file-model="files" name="txtFile" required ng-required="true">
                        <button type="submit" class="btn btn-light bg-info" ng-click="upload()">Upload</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table hover table-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat='i in imgList' >
                            <td class="text-center"><%i.img_id%></td>
                            <td class="text-center"><img ng-src="{{ asset('img/<%i.img_source%>') }}" height="150px" width="150px" alt=""></td>
                            <td class="text-center">
                                <button class="btn btn-danger" ng-click="del(i.img_id)">Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('angularJS')
    @parent

    <script>
        app.directive('fileModel', ['$parse', function($parse) {
            return {
                restrict: 'A',
                link: function(scope, element, attrs) {
                    element.bind('change', function() {
                        $parse(attrs.fileModel).assign(scope, element[0].files)
                        scope.$apply();
                    });
                }
            };
        }]);
        app.controller('ImageController', function($scope, $http, MainURL, $location) {
            $http.post($location.absUrl()).then(function(response) {
                $scope.imgList = response.data.imgList;
                $scope.id = response.data.id;
                console.log(response.data);
            });

            $scope.del = function(id){
                var conf = confirm("Bạn chắc chắn muốn xóa?");
                if(conf){
                    var url = MainURL + 'image/del/'+id;
                    $http.post(url).then(function(response){
                        location.reload();
                    });
                }
            }

            $scope.upload = function() {
                var fd = new FormData();
                fd.append('img', $scope.files[0]);
                var url = MainURL + 'image/upload/' + $scope.id;
                $http.post(url, fd, {
                    withCredentials: true,
                    headers: {
                        'Content-Type': undefined
                    },
                    transformRequest: angular.identity
                }).then(function(r) {
                    console.log($scope.files[0]);
                    console.log(r);
                    console.log(r.data);
                    location.reload();
                });
            }
        });
    </script>
@endsection
