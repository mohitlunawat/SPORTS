<!DOCTYPE html>
<html>
<head>
  <script src="angular.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body ng-app='myapp' ng-controller='ctrl'>
  <select>
  <option ng-repeat="names in names">{{names}}</option>
</select>
</body>
</html>
<script>
var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http){
    $http({method:'GET', url:'try2.php'}).then(function(response){
    $scope.names = response.data;
    });
    });
    </script>