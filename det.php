<?php
session_start();
if(isset($_GET['tournname']))
  {
    $_SESSION['tournname'] = $_GET['tournname'];
  }
  else
  {
    echo "not set";
  }
  $name=$_SESSION['tournname'];
  echo $name;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sports Scheduler</title>
  <script src="angular.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .tournament{
box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 5px 10px 0 rgba(0, 0, 0, 0.19);
height:100px;
padding-top:25px;
margin-bottom:15px;
color:#BDBDBD;
}
.new{
  margin-left: 500px;
}
  </style>
  <script>
  function add()
  {
    window.location="addteam.php";
  }
  </script>
</head>
<body>
<div class="container-fuild" style="height:662px;width:1365px;">
  <div class="container-fluid" style="height:40px;width:1365px;">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Sports</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <li><a href="admin.php">Home</a></li>
        <li class="active"><a href="tdetails.php">Tournament Details</a></li>
        <li><a href="schedule.php">Create Tournament</a></li>
        <li><a href="final.php">Schedule Tournament</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  </div>
<div class="container-fluid" ng-app="myapp" ng-controller="ctrl" style="height:612px;width:1365px">
  <div class="tournament">
  <h2 style="text-align:center;color:grey;">TOURNAMENT NAME: <?php  error_reporting(0); echo strtoupper($_SESSION['tournname']); ?><br><br></h2></div>
  <h3 style="text-align:center;color:grey;">TEAMS</h3>
  <div class="new">
<br/><br/><ul>
<li style="font-size:24px;" ng-repeat="names in names track by $index"><a  href="list.php?teamname={{names}}">{{names}}</a></li></ul>
</div>
</div>
</div>
</body>
</html>
<script>
  var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http)
{ 
 $http({method:'GET', url:'fetchteam.php'}).then(function(response){
    $scope.names = response.data;
    });
});
 </script>