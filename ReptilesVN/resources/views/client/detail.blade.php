@extends('client/index')
@section('title')
    Chi tiết bài viết
@endsection

@section('client/body')
    <div class="col-md-12 mt-5 bg-light" ng-controller="DetailController">
        <div class="row container-fluid">
            <div class="col-md-5" style="background-color: aquamarine">
                <div class="card m-2">
                    <img src="{{ asset('img/<%img.img_source%>') }}" width="100%" height="250px" 
                    class="card-img-top" ng-repeat="img in rsImg"alt="...">
                </div>
                <div class="card m-2">
                    <video width="100%" height="250" controls ng-repeat="video in rsVideo" 
                    width="100%" height="250px" class="card-img-top">
                        <source ng-src="{{asset('video/<%rsVideo[0].video_source%>')}}">
                      </video>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row m-3"><h3 style="color: firebrick">Thông tin mẫu vật</h3></div>
                <div class="row m-3" ng-repeat="i in rsPost">
                    <div class="col-md-4 text-end">Người đăng:</div>
                    <div class="col-md-8"><b><i><%i.nd_ho_ten%></i></b></div>
                    <div class="col-md-4 text-end">Tên khoa học:</div>
                    <div class="col-md-8"><%i.sv_ten_khoahoc%></div>
                    <div class="col-md-4 text-end">Tên tiếng việt:</div>
                    <div class="col-md-8"><%i.sv_ten_tiengviet%></div>
                    <div class="col-md-4 text-end">Tên địa phương:</div>
                    <div class="col-md-8"><%i.sv_ten_dia_phuong%></div>
                    <div class="col-md-4 text-end">Giá trị sinh vật:</div>
                    <div class="col-md-8"><%i.sv_giatri%></div>
                    <div class="col-md-4 text-end">Thuộc họ:</div>
                    <div class="col-md-8"><%rsHo[0].h_ho%></div>
                    <div class="col-md-4 text-end">Thuộc bộ:</div>
                    <div class="col-md-8"><%rsBo[0].b_bo%></div>
                    <div class="col-md-4 text-end">Thuộc lớp:</div>
                    <div class="col-md-8"><%rsLop[0].l_lop%></div>
                    <div class="col-md-4 text-end">Thuộc ngành:</div>
                    <div class="col-md-8"><%rsNganh[0].ng_nganh%></div>
                    <div class="col-md-4 text-end">Thuộc giới:</div>
                    <div class="col-md-8"><%rsGioi[0].g_gioi%></div>
                    <div class="col-md-4 text-end">Mật độ phân bố:</div>
                    <div class="col-md-8"><%i.mv_mat_do_phan_bo%></div>
                    <div class="col-md-4 text-end">Sinh cảnh:</div>
                    <div class="col-md-8"><%i.mv_sinh_canh%></div>
                    <div class="col-md-4 text-end">Địa điểm:</div>
                    <div class="col-md-8"><%i.mv_dia_diem%></div>
                    <div class="col-md-4 text-end">Tọa độ 1:</div>
                    <div class="col-md-8" ng-if="i.mv_toado_1 != null"><%i.mv_toado_1%></div>
                    <div class="col-md-8" ng-if="i.mv_toado_1 == null">Chưa cập nhật</div>
                    <div class="col-md-4 text-end">Tọa độ 2:</div>
                    <div class="col-md-8" ng-if="i.mv_toado_2 != null"><%i.mv_toado_2%></div>
                    <div class="col-md-8" ng-if="i.mv_toado_2 == null">Chưa cập nhật</div>
                    <div class="col-md-4 text-end">Tọa độ 3:</div>
                    <div class="col-md-8" ng-if="i.mv_toado_3 != null"><%i.mv_toado_3%></div>
                    <div class="col-md-8" ng-if="i.mv_toado_3 == null">Chưa cập nhật</div>
                    <div class="col-md-4 text-end">Tọa độ 4:</div>
                    <div class="col-md-8" ng-if="i.mv_toado_4 != null"><%i.mv_toado_4%></div>
                    <div class="col-md-8" ng-if="i.mv_toado_4 == null">Chưa cập nhật</div>
                    <div class="col-md-4 text-end">Tọa độ 5:</div>
                    <div class="col-md-8" ng-if="i.mv_toado_5 != null"><%i.mv_toado_5%></div>
                    <div class="col-md-8" ng-if="i.mv_toado_5 == null">Chưa cập nhật</div>
                    <div class="col-md-4 text-end">Tình trạng:</div>
                    <div class="col-md-8"><%i.mv_tinh_trang%></div>
                </div>
            </div>
        </div>
        <div class="row container-fluid">
            <div class="col-md-12 text-center m-1" ng-repeat="i in rsDes">
                <hr>
                <h4><%i.mt_mota%></h4>
                <p><%i.mota%></p>
                
            </div>
        </div>
    </div>
@endsection
@section('angularJS')
    @parent
    <script>
        app.controller('DetailController', function($scope, $http, MainURL, $location) {
            $http.post($location.absUrl()).then(function(response) {
                $scope.rsPost = response.data.rsPost;
                $scope.rsDes = response.data.rsDes;
                $scope.rsImg = response.data.rsImg;
                $scope.rsVideo = response.data.rsVideo;
                $scope.rsHo = response.data.rsHo;
                $scope.rsBo = response.data.rsBo;
                $scope.rsLop = response.data.rsLop;
                $scope.rsNganh = response.data.rsNganh;
                $scope.rsGioi = response.data.rsGioi;
                console.log(response.data);
            });

            $scope.detail = function(id) {
                $http.get(MainURL + 'post/detail/' + id).then(function(response) {
                    window.location.replace(MainURL + 'post/detail/' + id);
                });
            }
        });
    </script>
@endsection
