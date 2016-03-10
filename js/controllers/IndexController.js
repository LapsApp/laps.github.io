(function () {
    'use strict';
    var app = angular.module('App.Controllers');
    app.controller("IndexController", ["$scope", "$timeout", "$window", "$q", 
        function ($scope, $window, $q, $timeout, ) {
             
             $scope.precadastro = [];
                  
            $scope.addPreCadastro = function (e) {
                var d = new Date();
                var dtcriacao = (d.getDate() < 10 ? "0" : "") + d.getDate() + "/" + (d.getMonth() + 1 < 10 ? "0" : "") + (d.getMonth() + 1) + "/" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();



            };

          
        }
    ]);
})();
    