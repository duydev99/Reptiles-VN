var app = angular.module('my-app', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol("<%");
    $interpolateProvider.endSymbol("%>");
}).constant("MainURL", "http://localhost/ReptilesVN/public/");