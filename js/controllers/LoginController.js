(function() {
    'use strict';
    var loginApp = angular.module('loginApp', []);
    loginApp.controller("LoginController", ["$scope", "$timeout", "$window", "$q",
        function($scope, $window, $q, $timeout) {
            // console.log("testing");
            
            $scope.pageindex = function() {
                window.open("index.html#cadastro",'_parent');
            };
        }
    ]);
})();
