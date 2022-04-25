@extends('client/index')
@section('title')
    About Reptiles VN
@endsection

@section('client/body')
    <div class="col-md-12 mt-5">
        <!-- Body Start-->
        <div class="bodyContent ">
            <div class="title">
                <p class="paragraph">Introduction</p>
            </div>
            <div class="content">
                <p class="paragraph">
                    Hello! <br>

                    Reptitle VN is a website providing information about reptiles in Vietnam. You can see Reptitle VN same
                    as a dictionary or encyclopedia of reptiles.

                    Our team of authors, contributors and admins, I am a huge reptile lover and want to share my little
                    passion with everyone. <br>

                    We know that there are hundreds of reptiles in this world, so we always try to update information about
                    reptiles to be as complete as possible. However, omissions are unavoidable. So if you can't find
                    information about reptiles on this website, please contact us via email reptiltevn@gmail.com, we will
                    try to find
                    and compile information about cows. as close as possible. <br>

                    Thank you for visiting Reptitle VN.
                </p>

            </div>
        </div>
        <!-- Body End -->
    </div>
@endsection
{{-- @section('angularJS')
    @parent
    <script>
        app.controller('IndexController', function($scope, $http, MainURL) {
            $http.post(MainURL).then(function(response) {
                $scope.rsList = response.data;
                console.log(response.data.rsImg);
            });
            
            $scope.detail = function(id){
                $http.get(MainURL + 'post/detail/'+id).then(function(response) {
                    window.location.replace(MainURL + 'post/detail/'+id);
                });
            }
            $scope.search = function(){
                $http.get(MainURL + 'search/'+$scope.text).then(function(response) {
                    window.location.replace(MainURL + 'search/'+$scope.text);
                });
            }

            $scope.find = function(key){
                $http.get(MainURL + 'find/'+key).then(function(response) {
                    window.location.replace(MainURL + 'find/'+key);
                });
            }
        });
    </script>
@endsection --}}
