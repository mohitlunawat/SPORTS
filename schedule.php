<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sports Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function add()
{
  window.location="tournament.php";
}

</script>
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
.button1 {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
</style>
</head>
<body>
<div class="container-fluid" style="height:662px;width:1365px;">
  <div class="container-fluid" style="height:40px;width:1365px;">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Sports</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li><a href="admin.php">Home</a></li>
        <li><a href="tdetails.php">Tournament Details</a></li>
        <li class="active"><a href="schedule.php">Create Tournament</a></li>
        <li><a href="final.php">Schedule Tournmaent</a></li>
        <li><a href="venue.php">Add Venues</a></li>
        <li><a href="venuedet.php">Venue Details</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  </div>
  </br>
<div class="container-fluid" ng-app="myapp" ng-controller="ctrl" style="height:612px;width:1365px">
<div class="tournament">
  <h2 style="text-align:center;color:grey;">LIST OF TOURNAMENTS:</h2></div>
  <div class="new">
    <br/><br/><ul>
    <li style="font-size:24px;" ng-repeat="x in names"><a  href="edit.php?tournname={{x}}">{{x}}</a></li></ul>
  </br>
</br>
<button type="button" class="button1"value="EDIT" onclick="add()"><span class="glyphicon glyphicon-save"></span>CREATE A NEW TOURNAMENT</button>
</div>
</div>
</body>
</html>
<script>
  var app = angular.module('myapp',[]);
    app.controller('ctrl',function($scope,$http)
{ 
 $http({method:'GET', url:'try2.php'}).then(function(response){
    $scope.names = response.data;
    });
});
 </script>






